<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'id' => 1,
                'name' => 'admin ecommerce',
                'email' => 'eco_admin@gmail.com',
                'phone' => '07033317010',
                'usertype' => '1',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'phone' => '07022217010',
                'usertype' => '0',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ];

        User::insert($user);
    }
}