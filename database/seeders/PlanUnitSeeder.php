<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plan_units')->insert([
            'unit'          => "1",
            'comp_esp'      => "Competencia Especifica",
            'crit_desemp'   => "Criterio de Desempeño",
            /* 'unit_id'       => "1", */
            /* 'ponderacion'   => "10", */
            /* 'plan_id'       => "1" */
        ]);

        DB::table('plan_units')->insert([
            'unit'          => "2",
            'comp_esp'      => "Competencia Especifica 2",
            'crit_desemp'   => "Criterio de Desempeño 2",
            /* 'unit_id'       => "1", */
            /* 'ponderacion'   => "10", */
            /* 'plan_id'       => "1" */
        ]);

        DB::table('plan_units')->insert([
            'unit'          => "3",
            'comp_esp'      => "Competencia Especifica 3",
            'crit_desemp'   => "Criterio de Desempeño 3",
            /* 'unit_id'       => "1", */
            /* 'ponderacion'   => "10", */
            /* 'plan_id'       => "1" */
        ]);

        DB::table('plan_units')->insert([
            'unit'          => "4",
            'comp_esp'      => "Competencia Especifica 4",
            'crit_desemp'   => "Criterio de Desempeño 4",
            /* 'unit_id'       => "1", */
            /* 'ponderacion'   => "10", */
            /* 'plan_id'       => "1" */
        ]);

    }
}
