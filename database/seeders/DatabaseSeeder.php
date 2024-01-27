<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => "Christopher Joseph Rizo Zeledón",
                'dni' => 'Y7700979H',
                'email' => 'rizo.cristopher@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('Chris12345'),
                'phone' => null,
                'is_admin' => 1,
                'remember_token' => null,
                'created_at' => '2024-01-22 16:11:41',
                'updated_at' => '2024-01-22 16:11:41',
            ],
            [
                'id' => 2,
                'name' => "Emma Salvador Vera",
                'dni' => '32623551Y',
                'email' => 'emma@techie.com',
                'email_verified_at' => null,
                'password' => Hash::make('Emma12345'),
                'phone' => null,
                'is_admin' => 0,
                'remember_token' => null,
                'created_at' => '2024-01-23 14:27:15',
                'updated_at' => '2024-01-23 14:27:15',
            ],
            [
                'id' => 3,
                'name' => "Mateo Reyes Cobo",
                'dni' => '93891037T',
                'email' => 'mateo@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('Mateo12345'),
                'phone' => null,
                'is_admin' => 0,
                'remember_token' => null,
                'created_at' => '2024-01-24 12:58:22',
                'updated_at' => '2024-01-24 12:58:22',
            ],
        ];
        DB::table('users')->insert($users);
    }
}
