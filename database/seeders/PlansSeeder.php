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
            'comp_esp'      => "Competencia Especifica",
            'crit_desemp'   => "Criterio de Desempeño",
            'est_eva'       => "Estrategia de Evaluacion",
            'inst_eva'      => "Instrumento de Evaluacion",
            'tip_eva'       => "Tipo de Evaluacion",
            'evid_eva'      => "Evidencia de Evaluacion",
            'retro'         => "Retroalimentacion",
            'lapso'         => "lapso/Entrega",
            /* 'unit_id'       => "1", */
            'ponderacion'   => "10",
            'planning_id'   => "1"
        ]);
        DB::table('plans')->insert([
            'unit'          => "1",
            'comp_esp'      => "Competencia Especifica",
            'crit_desemp'   => "Criterio de Desempeño",
            'est_eva'       => "Estrategia de Evaluacion",
            'inst_eva'      => "Instrumento de Evaluacion",
            'tip_eva'       => "Tipo de Evaluacion",
            'evid_eva'      => "Evidencia de Evaluacion",
            'retro'         => "Retroalimentacion",
            'lapso'         => "lapso/Entrega",
            /* 'unit_id'       => "2", */
            'ponderacion'   => "10",
            'planning_id'   => "1"
        ]);
        DB::table('plans')->insert([
            'unit'          => "1",
            'comp_esp'      => "Competencia Especifica",
            'crit_desemp'   => "Criterio de Desempeño",
            'est_eva'       => "Estrategia de Evaluacion",
            'inst_eva'      => "Instrumento de Evaluacion",
            'tip_eva'       => "Tipo de Evaluacion",
            'evid_eva'      => "Evidencia de Evaluacion",
            'retro'         => "Retroalimentacion",
            'lapso'         => "lapso/Entrega",
            /* 'unit_id'       => "3", */
            'ponderacion'   => "10",
            'planning_id'   => "1"
        ]);


    }
}
