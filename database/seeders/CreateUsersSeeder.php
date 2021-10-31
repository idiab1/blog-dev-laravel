<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => "Admin",
                'email' => "admin@test.com",
                'is_admin' => 1,
                'password' => Hash::make("123456789"),
            ],
            [
                'name' => "User",
                'email' => "user@test.com",
                'is_admin' => 0,
                'password' => Hash::make("123456789"),
            ]
        ];

        foreach($users as $key => $user){
            User::create($user);
        }

    }
}
