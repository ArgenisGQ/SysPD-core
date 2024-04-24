<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plannings')->insert([
            'curricularunit'      => "UNIDAD Curso01",
            'code'                => "AAAA-0001",
            'section'             => "AA01A0A",
            'period'              => "2023-1",
            'modalidad'           => "1",
            'user_id'             => "1",
            'course_id'           => "1",
            /* 'plan_id'             => "1" */
        ]);
        DB::table('plannings')->insert([
            'curricularunit'      => "UNIDAD Curso01",
            'code'                => "AAAA-0001",
            'section'             => "AA02A0A",
            'period'              => "2023-1",
            'modalidad'           => "0",
            'user_id'             => "1",
            'course_id'           => "1",
            /* 'plan_id'             => "2" */
        ]);
        DB::table('plannings')->insert([
            'curricularunit'      => "UNIDAD Curso02",
            'code'                => "AAAA-0002",
            'section'             => "AA01A0A",
            'period'              => "2023-1",
            'modalidad'           => "1",
            'user_id'             => "1",
            'course_id'           => "2",
            /* 'plan_id'             => "1" */
        ]);
        DB::table('plannings')->insert([
            'curricularunit'      => "UNIDAD Curso02",
            'code'                => "AAAA-0002",
            'section'             => "AA02A0A",
            'period'              => "2023-1",
            'modalidad'           => "2",
            'user_id'             => "1",
            'course_id'           => "2",
            /* 'plan_id'             => "1" */
        ]);
    }
}
