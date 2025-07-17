<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

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

    public function userAdd()
    {
        $user = Auth::user();
        $roles = Role::all();

        return view('Admin/userList/add', [
            "title" => "Tambah User",
            "user" => $user,
            "roles" => $roles
        ]);
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['nullable', 'exists:roles,name']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->filled('role')) {
            $user->assignRole($request->role);
        }

        return redirect()->route('admin.userList')->with('success', 'User berhasil ditambahkan!');
    }

    public function userEdit($id)
    {
        $authUser = Auth::user();
        $user = User::with('roles')->findOrFail($id);
        $roles = Role::all();

        return view('Admin/userList/edit', [
            "title" => "Edit User",
            "user" => $authUser,
            "editUser" => $user,
            "roles" => $roles
        ]);
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'role' => ['nullable', 'exists:roles,name']
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        // Remove all existing roles and assign the new one
        $user->syncRoles([]);
        if ($request->filled('role')) {
            $user->assignRole($request->role);
        }

        return redirect()->route('admin.userList')->with('success', 'User berhasil diupdate!');
    }

    public function userDelete($id)
    {
        $user = User::findOrFail($id);

        // Prevent deleting self
        if ($user->id === Auth::id()) {
            return redirect()->route('admin.userList')->with('error', 'Anda tidak dapat menghapus akun sendiri!');
        }

        $user->delete();

        return redirect()->route('admin.userList')->with('success', 'User berhasil dihapus!');
    }
}
