<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseMaterialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');

Route::get('/detail-course', function () {
    return view('pages.course.detail');
})->name('detail.course');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dasboard/courses/{course}', [DashboardController::class, 'show'])
        ->name('courses.detail');

    Route::post('/materials/{material}/complete', function (\App\Models\CourseMaterial $material) {
        \App\Models\UserMaterialActivity::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'material_id' => $material->id,
                'activity_type' => 'complete',
            ],
            [
                'activity_time' => now(),
            ]
        );

        return response()->json([
            'success' => true,
        ]);
    });

    Route::post('/quiz/{quiz}/submit', [QuizController::class, 'submit'])
        ->name('quiz.submit');

    Route::post('/upload-image', [UploadController::class, 'store'])
        ->name('upload.image');

    Route::post('/courses/{course}/notes', [NoteController::class, 'store'])
        ->name('notes.store');

    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])
        ->name('notes.destroy');

});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/levels', [LevelController::class, 'index'])->name('levels.index');
    Route::post('/levels', [LevelController::class, 'store'])->name('levels.store');
    Route::put('/levels/{level}', [LevelController::class, 'update'])->name('levels.update');
    Route::delete('/levels/{level}', [LevelController::class, 'destroy'])->name('levels.destroy');

    Route::resource('courses', CourseController::class)->except(['create']);

    // quiz
    Route::get('/courses/{course}/quizzes', [QuizController::class, 'index'])
        ->name('quiz.index');

    Route::post('/courses/{course}/quizzes', [QuizController::class, 'store'])
        ->name('quiz.store');

    Route::put('/quizzes/{quiz}', [QuizController::class, 'update'])
        ->name('quiz.update');

    Route::delete('/quizzes/{quiz}', [QuizController::class, 'destroy'])
        ->name('quiz.destroy');

    // materi
    Route::post('courses/{course}/materials', [CourseMaterialController::class, 'store'])
        ->name('materials.store');

    Route::put('materials/{material}', [CourseMaterialController::class, 'update'])
        ->name('materials.update');

    Route::delete('materials/{material}', [CourseMaterialController::class, 'destroy'])
        ->name('materials.destroy');

    Route::prefix('quiz')->group(function () {
        Route::get('{quiz}/questions', [QuizQuestionController::class, 'index'])
            ->name('quiz.questions.index');

        Route::post('{quiz}/questions', [QuizQuestionController::class, 'store'])
            ->name('quiz.questions.store');

        Route::put('questions/{question}', [QuizQuestionController::class, 'update'])
            ->name('quiz.questions.update');

        Route::delete('questions/{question}', [QuizQuestionController::class, 'destroy'])
            ->name('quiz.questions.destroy');
    });
});

require __DIR__.'/auth.php';
