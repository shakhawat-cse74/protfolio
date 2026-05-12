<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PersonalInfoController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;

Route::get('/', [PortfolioController::class, 'index']);

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('personal-info', PersonalInfoController::class)->only(['index', 'store']);
    Route::resource('skills', SkillController::class)->only(['index', 'store', 'destroy']);
    Route::resource('projects', ProjectController::class)->only(['index', 'store', 'destroy']);
    Route::resource('experiences', ExperienceController::class)->only(['index', 'store', 'destroy']);
    Route::resource('services', ServiceController::class)->only(['index', 'store', 'destroy']);
    Route::resource('settings', SettingController::class)->only(['index', 'store']);
});

require __DIR__.'/auth.php';
