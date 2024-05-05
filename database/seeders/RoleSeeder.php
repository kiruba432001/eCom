<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const DATA = [
        ['id' => 1, 'role' => 'ADMIN'],
        ['id' => 2, 'role' => 'USER'],
    ];
    public function run(): void
    {
        Role::insert(self::DATA);
    }
}
