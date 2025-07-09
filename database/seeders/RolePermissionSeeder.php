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
            'view activities',
            'view structure',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo([
            'view admin dashboard',
            'manage activities',
            'manage structure',
            'manage users',
            'view activities',
            'view structure',
        ]);

        $kreatifRole = Role::firstOrCreate(['name' => 'kreatif']);
        $kreatifRole->givePermissionTo([
            'view admin dashboard',
            'manage activities',
            'view activities',
            'view structure',
        ]);        // Migrate existing users based on email (no role column dependency)
        $users = User::all();
        foreach ($users as $user) {
            // Remove existing roles first
            $user->roles()->detach();

            // Assign roles based on email since role column no longer exists
            if ($user->email === 'admin@gmail.com') {
                $user->assignRole('admin');
            } else {
                // Default role for all other users
                $user->assignRole('kreatif');
            }
        }

        $this->command->info('Roles and permissions created successfully!');
        $this->command->info('Admin users: ' . User::role('admin')->count());
        $this->command->info('Kreatif users: ' . User::role('kreatif')->count());
    }
}
