<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'name'      => "Curso01",
            'code'      => "AAAA-0001",
            'section'   => "AA01A0A"
        ]);
        DB::table('courses')->insert([
            'name'      => "Curso01",
            'code'      => "AAAA-0001",
            'section'   => "AA02A0A"
        ]);
        DB::table('courses')->insert([
            'name'      => "Curso02",
            'code'      => "AAAA-0001",
            'section'   => "AA01A0A"
        ]);
        DB::table('courses')->insert([
            'name'      => "Curso02",
            'code'      => "AAAA-0001",
            'section'   => "AA02A0A"
        ]);
    }
}
