<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseMaterialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\ResultQuizController;
use App\Http\Controllers\SettingAboutController;
use App\Http\Controllers\SettingBerandaController;
use App\Http\Controllers\SettingFeatureController;
use App\Http\Controllers\SettingMaterialController;
use App\Http\Controllers\SettingProfileController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialiteController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


// Halaman notifikasi verifikasi
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Proses klik link verifikasi dari email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Kirim ulang email verifikasi
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

Route::get('/',  [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');

Route::get('/detail-course', function () {
    return view('pages.course.detail');
})->name('detail.course');

Route::middleware(['auth', 'verified'])->group(function () {

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

    Route::prefix('setting-profile')->name('setting.profile.')->group(function () {
        Route::get('/', [SettingProfileController::class,  'index'])->name('index');
        Route::post('/update', [SettingProfileController::class, 'update'])->name('update');
    });

});

Route::middleware(['auth', 'role:admin'])->group(function () {
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

    Route::get('/results-quiz', [ResultQuizController::class, 'index'])->name('results-quiz.index');

    Route::get('/setting-beranda', [SettingBerandaController::class, 'index'])->name('setting.beranda');
    Route::put('/setting/beranda', [SettingBerandaController::class, 'update'])->name('setting.beranda.update');

    Route::prefix('setting-about')->name('setting.about.')->group(function () {
        Route::get('/', [SettingAboutController::class, 'index'])->name('index');
        Route::post('/store', [SettingAboutController::class, 'store'])->name('store');
        Route::put('/update/{id}', [SettingAboutController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [SettingAboutController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('setting-material')->name('setting.material.')->group(function () {
        Route::get('/', [SettingMaterialController::class, 'index'])->name('index');
        Route::post('/store', [SettingMaterialController::class, 'store'])->name('store');
        Route::put('/update/{id}', [SettingMaterialController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [SettingMaterialController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('setting-feature')->name('setting.feature.')->group(function () {
        Route::get('/', [SettingFeatureController::class, 'index'])->name('index');
        Route::post('/store', [SettingFeatureController::class, 'store'])->name('store');
        Route::put('/update/{id}', [SettingFeatureController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [SettingFeatureController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('levels')->name('levels.')->group(function () {
        Route::get('/', [LevelController::class, 'index'])->name('index');
        Route::post('/store', [LevelController::class, 'store'])->name('store');
        Route::put('/update/{id}', [LevelController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [LevelController::class, 'destroy'])->name('destroy');
    });

});

require __DIR__.'/auth.php';
