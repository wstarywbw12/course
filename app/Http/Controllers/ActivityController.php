<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActivityController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

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
            ->with(['level', 'materials'])
            ->get();

        // ================================
        // TOTAL JAM & MODUL PER COURSE
        // ================================
        foreach ($courses as $course) {

            $course->total_minutes = DB::table('user_material_activities')
                ->join('course_materials', 'user_material_activities.material_id', '=', 'course_materials.id')
                ->where('user_material_activities.user_id', $userId)
                ->where('course_materials.course_id', $course->id)
                ->where('user_material_activities.activity_type', 'complete')
                ->sum('course_materials.time');

            $course->total_hours = round($course->total_minutes / 60);

            $course->total_modules = $course->materials->count();
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
