<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(SettingsService $settingsService)
    {
        $user = User::with('roles')->find(Auth::id());
        $settings = $settingsService->all();

        return view('Admin/dashboard', [
            "title" => "Dashboard",
            "user" => $user,
            "settings" => $settings
        ]);
    }

    public function userList()
    {
        $user = Auth::user();
        $data = User::with('roles')->get();
        return view('Admin/userList/index', [
            "title" => "Admin",
            "user" => $user,
            "userData" => $data
        ]);
    }
}
