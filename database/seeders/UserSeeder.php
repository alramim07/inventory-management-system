<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::updateOrCreate(
            ['username' => 'sakib'],
            [
                'first_name' => 'Sakib',
                'last_name' => 'Islam',
                'email' => 'sakib@gmail.com',
                'password' => \Hash::make('password'),
                'business_id' => 1,
                'user_type' => 'user',
                'status' => 'active',
            ]
        );

        // Assign Admin role for business 1
        $user->assignRole('Admin#1');

        // Ensure user can access all locations
        $user->givePermissionTo('access_all_locations');
    }
}
