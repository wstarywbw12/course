<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseMaterialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/activity', function () {
    return view('pages.activity.index');
})->name('activity.index');

Route::get('/detail-course', function () {
    return view('pages.course.detail');
})->name('detail.course');


Route::get('/levels', [LevelController::class, 'index'])->name('levels.index');
Route::get('/courses', [CourseController::class, 'index'])->name('couses.index');


Route::middleware(['auth'])->group(function () {

     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/levels', [LevelController::class, 'index'])->name('levels.index');
    Route::post('/levels', [LevelController::class, 'store'])->name('levels.store');
    Route::put('/levels/{level}', [LevelController::class, 'update'])->name('levels.update');
    Route::delete('/levels/{level}', [LevelController::class, 'destroy'])->name('levels.destroy');

    Route::resource('courses', CourseController::class)->except(['create', 'edit']);

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
