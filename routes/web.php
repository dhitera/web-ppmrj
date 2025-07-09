<?php

use App\Models\Activity;
use App\Models\Structure;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\StructureController;

// ketika akses / maka menjalankan fungsi view
Route::get('/', function () {
    $data = Activity::latest()->paginate(4);
    return view('home', [
        "title" => "Home",
        "activity" => $data
    ]);
})->name('home');

Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
})->name('about');

Route::get('/structure', [StructureController::class, 'show'])->name('structure');

Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');

Route::get('/registration', function () {
    return view('registration', [
        "title" => "Registration"
    ]);
})->name('registration');
Route::get('/announcement', function () {
    return view('announcement', [
        "title" => "Announcement"
    ]);
})->name('announcement');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::prefix('admin')->middleware(['auth', 'permission:view admin dashboard'])->group(function () {

    // Dashboard - accessible to all admin users (admin & kreatif)
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // User Management - admin only
    Route::middleware('permission:manage users')->group(function () {
        Route::get('/user-list', [AdminController::class, 'userList'])->name('admin.userList');
    });

    // Structure Management - admin only
    Route::middleware('permission:manage structure')->group(function () {
        Route::get('/structure', [StructureController::class, 'adminShow'])->name('admin.structure');
        Route::get('/structure/{id}/edit', [StructureController::class, 'edit'])->name('structure.edit');
        Route::post('/structure/{id}/update', [StructureController::class, 'update'])->name('structure.update');
        Route::get('/test-pdf', [StructureController::class, 'viewpdf'])->name('test.pdf');
    });

    // Activity Management - admin and kreatif can access
    Route::middleware('permission:manage activities')->group(function () {
        Route::get('/activity', [ActivityController::class, 'adminShow'])->name('admin.activity');
        Route::get('/activity/add', [ActivityController::class, 'add'])->name('activity.add');
        Route::get('/activity/{id}/edit', [ActivityController::class, 'edit'])->name('activity.edit');
        Route::post('/activity', [ActivityController::class, 'store'])->name('activity.store');
        Route::post('/activity/{id}/update', [ActivityController::class, 'update'])->name('activity.update');
        Route::delete('/activity/delete/{id}', [ActivityController::class, 'delete'])->name('activity.delete');
    });
});
