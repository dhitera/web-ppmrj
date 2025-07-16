<?php

use App\Models\Activity;
use App\Models\Structure;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SettingsController;
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
    // Check if registration page is enabled
    $settingsService = app(App\Services\SettingsService::class);
    if (!$settingsService->getBool('enable_registration_page', true)) {
        return redirect()->route('registration.closed');
    }

    // Properly resolve and call the controller
    $controller = app(RegistrationController::class);
    return $controller->index();
})->name('registration');

Route::get('/registration-closed', [RegistrationController::class, 'closed'])->name('registration.closed');

Route::get('/announcement', function () {
    // Check if announcement page is enabled
    $settingsService = app(App\Services\SettingsService::class);
    if (!$settingsService->getBool('enable_announcement_page', true)) {
        return redirect()->route('announcement.closed');
    }

    // Properly resolve and call the controller
    $controller = app(AnnouncementController::class);
    return $controller->index();
})->name('announcement.index');

Route::get('/closed', [AnnouncementController::class, 'closed'])->name('announcement.closed');

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

    Route::middleware('permission:manage announcements')->group(function () {
        Route::get('/announcement', [AnnouncementController::class, 'adminShow'])->name('admin.announcement');
        Route::get('/announcement/add-santri', [AnnouncementController::class, 'createSantri'])->name('announcement.addSantri');
        Route::get('/announcement/add-info', [AnnouncementController::class, 'createInfo'])->name('announcement.addInfo');
        Route::post('/announcement/storeSantri', [AnnouncementController::class, 'storeSantri'])->name('announcement.storeSantri');
        Route::post('/announcement/storeInfo', [AnnouncementController::class, 'storeInfo'])->name('announcement.storeInfo');

        Route::get('/announcement/{id}/editSantri', [AnnouncementController::class, 'editSantri'])->name('announcement.editSantri');
        Route::get('/announcement/{id}/editInfo', [AnnouncementController::class, 'editInfo'])->name('announcement.editInfo');
        Route::post('/announcement/{id}/updateSantri', [AnnouncementController::class, 'updateSantri'])->name('announcement.updateSantri');
        Route::post('/announcement/{id}/updateInfo', [AnnouncementController::class, 'updateInfo'])->name('announcement.updateInfo');
        Route::delete('/announcement/delete-santri/{id}', [AnnouncementController::class, 'destroySantri'])->name('announcement.deleteSantri');
        Route::delete('/announcement/delete-info/{id}', [AnnouncementController::class, 'destroyInfo'])->name('announcement.deleteInfo');

        // Settings routes
        Route::post('/settings/toggle', [SettingsController::class, 'toggle'])->name('admin.settings.toggle');
    });

    Route::middleware('permission:manage registration')->group(function () {
        Route::get('/registration', [RegistrationController::class, 'adminShow'])->name('admin.registration');
        Route::get('/registration/edit', [RegistrationController::class, 'edit'])->name('registration.edit');
        Route::post('/registration/update', [RegistrationController::class, 'update'])->name('registration.update');
    });
});
