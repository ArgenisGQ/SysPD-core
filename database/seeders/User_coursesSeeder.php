<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_coursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_courses')->insert([
            'name'        => "Curso01",
            'code'        => "AAAA-0001",
            'section'     => "AA01A0A",
            'idcard'      => "00000"
        ]);
        DB::table('user_courses')->insert([
            'name'        => "Curso01",
            'code'        => "AAAA-0001",
            'section'     => "AA02A0A",
            'idcard'      => "00000"
        ]);
        DB::table('user_courses')->insert([
            'name'        => "Curso02",
            'code'        => "AAAA-0001",
            'section'     => "AA01A0A",
            'idcard'      => "00000"
        ]);
        DB::table('user_courses')->insert([
            'name'        => "Curso02",
            'code'        => "AAAA-0001",
            'section'     => "AA02A0A",
            'idcard'      => "00000"
        ]);
    }
}
