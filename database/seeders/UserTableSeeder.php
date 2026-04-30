<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Nitin Sharma',
                'email' => 'nitin@lightspeed.com',
                'password' => bcrypt('12345678'),
            ],[
                'name' => 'Vansh Sharma',
                'email' => 'vash@lightspeed.com',
                'password' => bcrypt('12345678'),
            ],[
                'name' => 'Rahul Sharma',
                'email' => 'rahul@lightspeed.com',
                'password' => bcrypt('12345678'),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
