<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Level;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $courses = Course::with('level')
            ->orderBy('id', 'desc')
            ->get();

        $levels = Level::with('courses.materials')->get();

        // ================================
        // LAST ACTIVITY
        // ================================
        $lastActivity = \App\Models\UserMaterialActivity::with('material.course.level')
            ->where('user_id', $userId)
            ->latest('activity_time')
            ->first();

        $continueCourse = $lastActivity?->material?->course;

        // ================================
        // LEVEL PROGRESS
        // ================================
        $completedMaterialIds = \App\Models\UserMaterialActivity::where('user_id', $userId)
            ->where('activity_type', 'complete')
            ->pluck('material_id')
            ->toArray();

        $levelProgress = [];

        foreach ($levels as $level) {

            $materials = $level->courses->flatMap->materials;

            $total = $materials->count();

            $completed = $materials
                ->whereIn('id', $completedMaterialIds)
                ->count();

            $levelProgress[$level->id] = $total > 0
                ? round(($completed / $total) * 100)
                : 0;
        }

        // ================================
        // TOTAL TIME (ALL TIME)
        // ================================
        $totalMinutesAllTime = DB::table('user_material_activities')
            ->join('course_materials', 'user_material_activities.material_id', '=', 'course_materials.id')
            ->where('user_material_activities.user_id', $userId)
            ->where('user_material_activities.activity_type', 'complete')
            ->sum('course_materials.time');

        $totalHoursAllTime = round($totalMinutesAllTime / 60, 1);

        // ================================
        // TOTAL TIME THIS WEEK
        // ================================
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $totalMinutesThisWeek = DB::table('user_material_activities')
            ->join('course_materials', 'user_material_activities.material_id', '=', 'course_materials.id')
            ->where('user_material_activities.user_id', $userId)
            ->where('user_material_activities.activity_type', 'complete')
            ->whereBetween('user_material_activities.activity_time', [$startOfWeek, $endOfWeek])
            ->sum('course_materials.time');

        $totalHoursThisWeek = round($totalMinutesThisWeek / 60, 1);

        $totalHours = floor($totalMinutesAllTime / 60);
        $totalRemainingMinutes = $totalMinutesAllTime % 60;

        // ================================
        // COURSES + TOTAL TIME MATERIAL
        // ================================
        $courses = Course::with('level')
            ->withSum('materials as total_minutes', 'time')
            ->orderBy('id', 'desc')
            ->get();

        // convert menit ke jam
        foreach ($courses as $course) {
            $course->total_hours = round(($course->total_minutes ?? 0) / 60, 1);
        }

        return view('dashboard', compact(
            'levels',
            'levelProgress',
            'courses',
            'continueCourse',
            'totalHoursAllTime',
            'totalHoursThisWeek',
            'totalHours',
            'totalRemainingMinutes'
        ));
    }

    public function show(Course $course)
    {
        $course->load([
            'level',
            'materials' => function ($q) {
                $q->with([
                    'userActivity' => function ($qa) {
                        $qa->where('user_id', auth()->id());
                    },
                ])->orderBy('order_number');
            },
            'quizzes.questions.options', // ✅ penting
        ]);

        return view('pages.course.detail', compact('course'));
    }
}
