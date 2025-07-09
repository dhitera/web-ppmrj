<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function dashboard()
    {
        $user = User::with('roles')->find(Auth::id());
        return view('Admin/dashboard', [
            "title" => "Dashboard",
            "user" => $user
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
