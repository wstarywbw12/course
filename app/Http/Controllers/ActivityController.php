<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // ================================
        // LAST ACTIVITY (CONTINUE)
        // ================================
        $lastActivity = \App\Models\UserMaterialActivity::with('material.course.level')
            ->where('user_id', $userId)
            ->latest('activity_time')
            ->first();

        $continueCourse = $lastActivity?->material?->course;

        // ================================
        // COURSE YANG PERNAH DIPELAJARI
        // ================================
        $courses = \App\Models\Course::whereHas('materials.activities', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })
            ->with('level')
            ->withCount('materials as total_modules')
            ->withSum('materials as total_minutes', 'time')
            ->get();

        // convert menit ke jam
        foreach ($courses as $course) {
            $minutes = $course->total_minutes ?? 0;
            $course->total_hours = round($minutes / 60, 1);
        }

        // ================================
        // TANGGAL YANG ADA ACTIVITY COMPLETE
        // ================================
        $activityDates = \App\Models\UserMaterialActivity::where('user_id', $userId)
            ->where('activity_type', 'complete')
            ->pluck('activity_time')
            ->map(function ($date) {
                return Carbon::parse($date)->format('Y-m-d');
            })
            ->unique()
            ->values();

        return view('pages.activity.index', compact(
            'continueCourse',
            'courses',
            'activityDates'
        ));
    }
}
