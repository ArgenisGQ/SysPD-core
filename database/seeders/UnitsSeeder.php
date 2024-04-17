<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            'contenido'         => "01 Estructura de las unidades de aprendizaje - Contenido",
            'comp_esp'          => "Competencia Especifica",
            'crit_desemp'       => "Criterios de Desempeño",
            'est_didac'         => "Estrategias Didacicas",
            'eval'              => "Evaluacion/Realimentacion",
            'rec_apren'         => "Recursos de Aprendizaje",
            'biblio'            => "Bibliografia",
            'plan_id'           => "1"
        ]);
        DB::table('units')->insert([
            'contenido'         => "02 Estructura de las unidades de aprendizaje - Contenido",
            'comp_esp'          => "Competencia Especifica",
            'crit_desemp'       => "Criterios de Desempeño",
            'est_didac'         => "Estrategias Didacicas",
            'eval'              => "Evaluacion/Realimentacion",
            'rec_apren'         => "Recursos de Aprendizaje",
            'biblio'            => "Bibliografia",
            'plan_id'           => "1"
        ]);
        DB::table('units')->insert([
            'contenido'         => "03 Estructura de las unidades de aprendizaje - Contenido",
            'comp_esp'          => "Competencia Especifica",
            'crit_desemp'       => "Criterios de Desempeño",
            'est_didac'         => "Estrategias Didacicas",
            'eval'              => "Evaluacion/Realimentacion",
            'rec_apren'         => "Recursos de Aprendizaje",
            'biblio'            => "Bibliografia",
            'plan_id'           => "1"
        ]);


    }
}
