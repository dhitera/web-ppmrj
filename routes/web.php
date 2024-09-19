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


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // User List
    Route::get('/admin-list', [AdminController::class, 'adminList'])->name('admin.adminList');
    // Structure
    Route::get('/structure', [StructureController::class, 'adminShow'])->name('admin.structure');
    Route::get('/structure/{id}/edit', [StructureController::class, 'edit'])->name('structure.edit');
    Route::post('/structure/{id}/update', [StructureController::class, 'update'])->name('structure.update');
    // Activity
    Route::get('/activity', [ActivityController::class, 'adminShow'])->name('admin.activity');
    Route::get('/activity/add', [ActivityController::class, 'add'])->name('activity.add');
    Route::get('/activity/{id}/edit', [ActivityController::class, 'edit'])->name('activity.edit');
    Route::post('/activity', [ActivityController::class, 'store'])->name('activity.store');
    Route::post('/activity/{id}/update', [ActivityController::class, 'update'])->name('activity.update');
    Route::delete('/activity/delete/{id}', [ActivityController::class, 'delete'])->name('activity.delete');
});
