<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Define permissions
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);

        // Assign permissions to roles
        $adminRole->givePermissionTo(['create posts', 'edit posts', 'delete posts']);
        $userRole->givePermissionTo('create posts');

        $user = new User;
        $user->name = 'Admin User';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('123123123');
        $user->email_verified_at = now();
        $user->save();
        $user->assignRole('admin');

        $user = new User;
        $user->name = 'User';
        $user->email = 'user@gmail.com';
        $user->password = Hash::make('123123123');
        $user->email_verified_at = now();
        $user->save();
        $user->assignRole('user');
    }
}
