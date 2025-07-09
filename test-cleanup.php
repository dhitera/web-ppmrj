<?php

// Test file to verify database cleanup worked
require_once 'vendor/autoload.php';

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// Load Laravel app
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== DATABASE CLEANUP VERIFICATION ===\n\n";

// Test users still exist and work
$users = User::all();
echo "Total users: " . $users->count() . "\n\n";

foreach ($users as $user) {
    echo "User: {$user->name} ({$user->email})\n";

    // Test that role column is gone (should not exist in database)
    $userAttributes = $user->getAttributes();
    if (array_key_exists('role', $userAttributes)) {
        echo "❌ ERROR: Role column still exists\n";
    } else {
        echo "✅ SUCCESS: Role column successfully removed from database\n";
    }

    // Test new roles relationship works
    echo "Roles: " . $user->getRoleNames()->implode(', ') . "\n";
    echo "Permissions: " . $user->getAllPermissions()->pluck('name')->implode(', ') . "\n";
    echo "Can manage users: " . ($user->can('manage users') ? 'Yes' : 'No') . "\n";
    echo "Can manage activities: " . ($user->can('manage activities') ? 'Yes' : 'No') . "\n";
    echo "\n";
}

echo "=== CLEANUP VERIFICATION COMPLETED ===\n";
