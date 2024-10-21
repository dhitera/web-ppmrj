<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('Admin/dashboard', [
            "title" => "Dashboard",
            "user" => $user
        ]);
    }

    public function userList()
    {
        $user = Auth::user();
        $data = User::all();
        return view('Admin/userList/index', [
            "title" => "Admin",
            "user" => $user,
            "userData" => $data
        ]);
    }
}
