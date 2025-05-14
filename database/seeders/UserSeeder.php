<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['super_admin', 'manager', 'director', 'hrd', 'staff'];
        $divisions = [1, 2, 3, 4, 5]; // Assuming these IDs exist

        // Create roles
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
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
