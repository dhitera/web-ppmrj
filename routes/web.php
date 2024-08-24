<?php

use Illuminate\Support\Facades\Route;

// ketika akses / maka menjalankan fungsi view
Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
});
Route::get('/structure', function () {
    return view('structure', [
        "title" => "Structure"
    ]);
});
Route::get('/activity', function () {
    return view('activity', [
        "title" => "Activity"
    ]);
});
Route::get('/registration', function () {
    return view('registration', [
        "title" => "Registration"
    ]);
});
Route::get('/announcement', function () {
    return view('announcement', [
        "title" => "Announcement"
    ]);
});

Route::get('/tester', function () {
    return view('tester', [
        "title" => "Home"
    ]);
});
