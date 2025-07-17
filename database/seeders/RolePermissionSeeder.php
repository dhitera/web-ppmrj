<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'view admin dashboard',
            'manage activities',
            'manage structure',
            'manage users',
            'manage home page',
            'manage about page',
            'manage announcements',
            'manage registration',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $adminRole->givePermissionTo([
            'view admin dashboard',
            'manage activities',
            'manage structure',
            'manage users',
            'manage announcements',
            'manage registration',
            'manage home page',
            'manage about page',
        ]);

        $itRole = Role::firstOrCreate(['name' => 'Divisi IT']);
        $itRole->givePermissionTo([
            'view admin dashboard',
            'manage activities',
            'manage home page',
            'manage about page',
            'manage structure',
            'manage announcements',
            'manage registration',
        ]);

        $panitiaOm = Role::firstOrCreate(['name' => 'Panitia']);
        $panitiaOm->givePermissionTo([
            'view admin dashboard',
            'manage announcements',
            'manage registration',
        ]);
        // Migrate existing users based on email (no role column dependency)
        $users = User::all();
        foreach ($users as $user) {
            // Remove existing roles first
            $user->roles()->detach();

            // Assign roles based on email since role column no longer exists
            if ($user->email === 'admin@gmail.com') {
                $user->assignRole('Admin');
            } elseif ($user->email === 'panitia@gmail.com') {
                $user->assignRole('Panitia');
            } else {
                // Default role for all other users
                $user->assignRole('Divisi IT');
            }
        }

        $this->command->info('Roles and permissions created successfully!');
        $this->command->info('Admin users: ' . User::role('Admin')->count());
        $this->command->info('Divisi IT users: ' . User::role('Divisi IT')->count());
        $this->command->info('Panitia: ' . User::role('Panitia')->count());
    }
}
