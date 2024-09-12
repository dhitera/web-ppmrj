<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\StructureController;
use App\Models\Structure;

// ketika akses / maka menjalankan fungsi view
Route::get('/', function () {
    return view('home', [
        "title" => "Home"
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
});
