<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tbl_subcategorias extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table("tbl_subcategorias")->insert([
            [
                'nombre_sub_cat' => 'Aplicació gestió administrativa',
                'id_categoria' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_sub_cat' => 'Accés remot',
                'id_categoria' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_sub_cat' => 'Aplicació de videoconferència',
                'id_categoria' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_sub_cat' => 'Imatge de projector defectuosa',
                'id_categoria' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_sub_cat' => 'Problema amb el teclat',
                'id_categoria' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_sub_cat' => 'El ratolí no funciona',
                'id_categoria' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_sub_cat' => "Monitor no s'encén",
                'id_categoria' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_sub_cat' => 'Imatge de projector defectuosa',
                'id_categoria' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
