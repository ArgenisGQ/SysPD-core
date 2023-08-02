<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'username'    => "admin",
            'name'        => "admin",
            'email'       => "admin@uny.edu.ve",
            'password'    => Hash::make('admin')
        ]);
        DB::table('users')->insert([
            'username'    => "user",
            'name'        => "user",
            'email'       => "user@uny.edu.ve",
            'password'    => Hash::make('user')
        ]);
    }
}
