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
            'section'   => "AA01A0A",
            'user_id'   => "1",
            'synoptic_id' => "1",
            'h_clases'    => "no aplica",
            'h_tutoria'   => "no aplica",
            'h_total'     => "no aplica",
            /* 'planning_id' => "1" */
        ]);
        DB::table('courses')->insert([
            'name'      => "Curso01",
            'code'      => "AAAA-0001",
            'section'   => "AA02A0A",
            'user_id'   => "1",
            'synoptic_id' => "1",
            'h_clases'    => "no aplica",
            'h_tutoria'   => "no aplica",
            'h_total'     => "no aplica",
            /* 'planning_id' => "2" */
        ]);
        DB::table('courses')->insert([
            'name'      => "Curso02",
            'code'      => "AAAA-0002",
            'section'   => "AA01A0A",
            'user_id'   => "1",
            'synoptic_id' => "2",
            'h_clases'    => "no aplica",
            'h_tutoria'   => "no aplica",
            'h_total'     => "no aplica",
            /* 'planning_id' => "3" */
        ]);
        DB::table('courses')->insert([
            'name'      => "Curso02",
            'code'      => "AAAA-0002",
            'section'   => "AA02A0A",
            'user_id'   => "1",
            'synoptic_id' => "2",
            'h_clases'    => "no aplica",
            'h_tutoria'   => "no aplica",
            'h_total'     => "no aplica",
            /* 'planning_id' => "4" */
        ]);
    }
}
