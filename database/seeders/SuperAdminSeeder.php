<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\SuperAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('guard', 'superadmin')->first();
        SuperAdmin::create([
            'role_id' => $role->id,
            'name' => 'Super Admin',
            'email' => 'admin@log.in',
            'password' => Hash::make('12345678'),
        ]);
    }
}
