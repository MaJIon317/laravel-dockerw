<?php

namespace Database\Seeders;

use App\Models\AdminRole;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_role_id = AdminRole::factory()->create([
            'name' => 'Administrator',
            'permission' => []
        ]);

        Admin::factory()->create([
            'admin_role_id' => $admin_role_id,
            'name' => 'Administrator',
            'email' => 'administrator@mail.com',
            'password'=> '123456',
        ]);

        $admin_role_id = AdminRole::factory()->create([
            'name' => 'Developers',
            'permission' => []
        ]);

        Admin::factory()->create([
            'admin_role_id' => $admin_role_id,
            'name' => 'Developer',
            'email' => 'developer@mail.com',
            'password'=> 'developer123345',
        ]);
    }
}
