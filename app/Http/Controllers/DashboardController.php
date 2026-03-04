<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Level;
use App\Models\UserQuizResult;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

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
        // AMBIL SEMUA MATERIAL YANG SUDAH COMPLETE
        // ================================
        $completedMaterialIds = \App\Models\UserMaterialActivity::where('user_id', $userId)
            ->where('activity_type', 'complete')
            ->pluck('material_id')
            ->toArray();

        // ================================
        // LEVEL PROGRESS
        // ================================
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

        $totalHours = floor($totalMinutesAllTime / 60);
        $totalRemainingMinutes = $totalMinutesAllTime % 60;

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

        // ================================
        // COURSES + PROGRESS
        // ================================
        $courses = Course::with('level', 'materials')
            ->withSum('materials as total_minutes', 'time')
            ->orderBy('id', 'desc')
            ->get();

        foreach ($courses as $course) {

            // convert ke jam
            $course->total_hours = round(($course->total_minutes ?? 0) / 60, 1);

            $materialIds = $course->materials->pluck('id');

            $totalMaterials = $materialIds->count();

            $completedCount = collect($completedMaterialIds)
                ->intersect($materialIds)
                ->count();

            $course->is_completed = $totalMaterials > 0 && $completedCount == $totalMaterials;
        }

        return view('dashboard', compact(
            'levels',
            'levelProgress',
            'courses',
            'continueCourse',
            'totalHoursThisWeek',
            'totalHours',
            'totalRemainingMinutes'
        ));
    }

    public function show(Course $course)
    {
        $userId = Auth::id();

        $course->load([
            'level',
            'materials' => function ($q) use ($userId) {
                $q->with([
                    'userActivity' => function ($qa) use ($userId) {
                        $qa->where('user_id', $userId)
                            ->where('activity_type', 'complete');
                    },
                ])->orderBy('order_number');
            },
            'quizzes.questions.options',
        ]);

        // ==========================
        // HITUNG PROGRESS COURSE
        // ==========================

        $totalMaterials = $course->materials->count();

        $completedMaterials = $course->materials
            ->filter(function ($material) {
                return $material->userActivity !== null;
            })
            ->count();

        $progress = $totalMaterials > 0
            ? round(($completedMaterials / $totalMaterials) * 100)
            : 0;

        $notes = $course->notes()
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        $quizResults = \App\Models\UserQuizResult::where('user_id', $userId)
            ->pluck('quiz_id')
            ->toArray();

        $quizAnswers = \App\Models\UserQuizAnswer::where('user_id', $userId)
            ->get()
            ->groupBy('quiz_question_id');

        $quizScores = [];

        foreach ($course->quizzes as $quiz) {
            $result = UserQuizResult::where('user_id', Auth::id())
                ->where('quiz_id', $quiz->id)
                ->first();

            if ($result) {
                $quizScores[$quiz->id] = $result->score;
            }
        }

        return view('pages.course.detail', compact(
            'course',
            'progress',
            'notes',
            'quizResults',
            'quizAnswers',
            'quizScores'
        ));
    }
}
