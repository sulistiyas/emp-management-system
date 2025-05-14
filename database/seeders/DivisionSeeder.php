<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = [
            ['name' => 'HRD', 'description' => 'Human Resource Development'],
            ['name' => 'Finance', 'description' => 'Finance Department'],
            ['name' => 'IT', 'description' => 'Information Technology'],
            ['name' => 'Marketing', 'description' => 'Marketing Department'],
            ['name' => 'Sales', 'description' => 'Sales Department'],
        ];

        foreach ($divisions as $division) {
            Division::firstOrCreate($division);
        }
    }
}
