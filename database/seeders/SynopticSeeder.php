<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SynopticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('synoptics')->insert([
            'name'                => "UNIDAD Curso01",
            'code'                => "AAAA-0001",
            'purpose'             => "Proposito del curso",
            'priority'            => " no aplica ",
            'total_hours'         => "10",
            't'                   => " no aplica ",
            'l_t'                 => " no aplica ",
            'i_sc_p'              => " no aplica ",
            's'                   => " no aplica ",
            'a'                   => " no aplica ",
            'hde'                 => " no aplica ",
            'comp_esp'            => "Competencia Especifica",
            'crit_desemp'         => "Criterio de Desempeño",
            'extruc_conten'       => "Estructura de las Unidades de Aprendizaje - Contenido",
        ]);
        DB::table('synoptics')->insert([
            'name'                => "UNIDAD Curso02",
            'code'                => "AAAA-0002",
            'purpose'             => "Proposito del curso",
            'priority'            => " no aplica ",
            'total_hours'         => "10",
            't'                   => " no aplica ",
            'l_t'                 => " no aplica ",
            'i_sc_p'              => " no aplica ",
            's'                   => " no aplica ",
            'a'                   => " no aplica ",
            'hde'                 => " no aplica ",
            'comp_esp'            => "Competencia Especifica",
            'crit_desemp'         => "Criterio de Desempeño",
            'extruc_conten'       => "Estructura de las Unidades de Aprendizaje - Contenido",
        ]);


    }
}
