<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creating a sample user
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'roles' => 1, // admin
            'password' => Hash::make('password'), 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'user@gmail.com',
            'roles' => 2, // user
            'password' => Hash::make('password'), 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
    }
}
