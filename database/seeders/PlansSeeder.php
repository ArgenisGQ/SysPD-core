<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            'unit'          => "1",
            /* 'comp_esp'      => "Competencia Especifica",
            'crit_desemp'   => "Criterio de Desempeño", */
            'name_est_eva'  => "NOMBRE Estrategia de Eva 1-1",
            'est_eva'       => "Estrategia de Evaluacion",
            'inst_eva'      => "Instrumento de Evaluacion",
            'tip_eva'       => "Tipo de Evaluacion",
            'evid_eva'      => "Evidencia de Evaluacion",
            'retro'         => "Retroalimentacion",
            'lapso'         => "lapso/Entrega",
            'semana'        => "1",
            'weeks_id'      => "1",
            /* 'unit_id'       => "1", */
            'ponderacion'   => "10",
            'planning_id'   => "1",
            'plan_unit_id'  => "1"
        ]);
        DB::table('plans')->insert([
            'unit'          => "1",
            /* 'comp_esp'      => "Competencia Especifica",
            'crit_desemp'   => "Criterio de Desempeño", */
            'name_est_eva'  => "NOMBRE Estrategia de Eva 1-2",
            'est_eva'       => "Estrategia de Evaluacion",
            'inst_eva'      => "Instrumento de Evaluacion",
            'tip_eva'       => "Tipo de Evaluacion",
            'evid_eva'      => "Evidencia de Evaluacion",
            'retro'         => "Retroalimentacion",
            'lapso'         => "lapso/Entrega",
            'semana'        => "1",
            'weeks_id'      => "1",
            /* 'unit_id'       => "2", */
            'ponderacion'   => "10",
            'planning_id'   => "1",
            'plan_unit_id'  => "1"
        ]);
        DB::table('plans')->insert([
            'unit'          => "1",
            /* 'comp_esp'      => "Competencia Especifica",
            'crit_desemp'   => "Criterio de Desempeño", */
            'name_est_eva'  => "NOMBRE Estrategia de Eva 1-3",
            'est_eva'       => "Estrategia de Evaluacion",
            'inst_eva'      => "Instrumento de Evaluacion",
            'tip_eva'       => "Tipo de Evaluacion",
            'evid_eva'      => "Evidencia de Evaluacion",
            'retro'         => "Retroalimentacion",
            'lapso'         => "lapso/Entrega",
            'semana'        => "2",
            'weeks_id'      => "2",
            /* 'unit_id'       => "3", */
            'ponderacion'   => "10",
            'planning_id'   => "1",
            'plan_unit_id'  => "1"
        ]);

        DB::table('plans')->insert([
            'unit'          => "2",
            /* 'comp_esp'      => "Competencia Especifica",
            'crit_desemp'   => "Criterio de Desempeño", */
            'name_est_eva'  => "NOMBRE Estrategia de Eva 2",
            'est_eva'       => "Estrategia de Evaluacion 2",
            'inst_eva'      => "Instrumento de Evaluacion 2",
            'tip_eva'       => "Tipo de Evaluacion 2",
            'evid_eva'      => "Evidencia de Evaluacion 2",
            'retro'         => "Retroalimentacion 2",
            'lapso'         => "lapso/Entrega 2",
            'semana'        => "3",
            'weeks_id'      => "3",
            /* 'unit_id'       => "1", */
            'ponderacion'   => "10",
            'planning_id'   => "1",
            'plan_unit_id' => "2"
        ]);
        DB::table('plans')->insert([
            'unit'          => "3",
            /* 'comp_esp'      => "Competencia Especifica",
            'crit_desemp'   => "Criterio de Desempeño", */
            'name_est_eva'  => "NOMBRE Estrategia de Eva 3",
            'est_eva'       => "Estrategia de Evaluacion 3",
            'inst_eva'      => "Instrumento de Evaluacion 3",
            'tip_eva'       => "Tipo de Evaluacion 3",
            'evid_eva'      => "Evidencia de Evaluacion 3",
            'retro'         => "Retroalimentacion 3",
            'lapso'         => "lapso/Entrega 3",
            'semana'        => "4",
            'weeks_id'      => "4",
            /* 'unit_id'       => "2", */
            'ponderacion'   => "10",
            'planning_id'   => "1",
            'plan_unit_id'  => "3"
        ]);
        DB::table('plans')->insert([
            'unit'          => "4",
            /* 'comp_esp'      => "Competencia Especifica",
            'crit_desemp'   => "Criterio de Desempeño", */
            'name_est_eva'  => "NOMBRE Estrategia de Eva 4",
            'est_eva'       => "Estrategia de Evaluacion 4",
            'inst_eva'      => "Instrumento de Evaluacion 4",
            'tip_eva'       => "Tipo de Evaluacion 4",
            'evid_eva'      => "Evidencia de Evaluacion 4",
            'retro'         => "Retroalimentacion 4",
            'lapso'         => "lapso/Entrega 4",
            'semana'        => "4",
            'weeks_id'      => "4",
            /* 'unit_id'       => "3", */
            'ponderacion'   => "10",
            'planning_id'   => "1",
            'plan_unit_id'  => "4"
        ]);


    }
}
