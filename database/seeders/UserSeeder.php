<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['super_admin', 'manager', 'director', 'hrd', 'staff'];
        $divisions = [1, 2, 3, 4, 5]; // Assuming these IDs exist

        // Define permissions
        $permissions = [
            'view role',
            'view any role',
            'view dashboard',
            'view user',
            'view any user',
            'view division',
            'view any division',
            'view any permission',
            'manage staff',
            'manage users',
            'manage system',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        foreach ($roles as $roleName) {
            $role = Role::firstOrCreate(['name' => $roleName]);

            // Assign permissions per role
            match ($roleName) {
                'super_admin' => $role->givePermissionTo($permissions),
                'manager'     => $role->givePermissionTo(['view dashboard', 'manage staff', 'manage users']),
                'director'    => $role->givePermissionTo(['view dashboard', 'manage staff', 'manage users']),
                'hrd'         => $role->givePermissionTo(['view dashboard', 'manage staff']),
                'staff'       => $role->givePermissionTo(['view dashboard']),
            };
        }

        // Create users and assign roles and divisions
        foreach ($roles as $index => $role) {
            User::create([
                'id_division' => $divisions[$index] ?? 1, // fallback to 1
                'name' => ucfirst($role) . ' User',
                'email' => strtolower($role) . '@example.com',
                'password' => Hash::make('password'),
                
            ])->assignRole($role);
        }

        
        
        // User::create([
        //     'id_division' => 1,
        //     'name' => 'Super Admin',
        //     'email' => 'super_admin@example.com',
        //     'password' => Hash::make('password'),
        // ]);
        // User::create([
        //     'id_division' => 2,
        //     'name' => 'Manager',
        //     'email' => 'manager@example.com',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
