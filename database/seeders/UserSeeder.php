<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('guard', 'web')->first();

        if (! $role) {
            $this->command->warn('No role found with guard "web". Please run RoleSeeder first.');

            return;
        }

        User::create([
            'role_id' => $role->id,
            'company_id' => 1,
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@log.in',
            'password' => Hash::make('12345678'),
            'status' => true,
        ]);
    }
}
