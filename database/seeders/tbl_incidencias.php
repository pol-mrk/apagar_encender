<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tbl_incidencias extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table("tbl_incidencias")->insert([
            [
                'titulo_inc' => 'Problema de conexión',
                'desc_inc' => 'El ratón bluetooth no se conecta.',
                'fecha_inc' => $now,
                'foto_inc' => './img/incidencia.jpg',
                'id_user' => 3,
                'id_subcat' => 6,
                'id_estado' => 1,
                'tecnico' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo_inc' => 'No veo la pantalla',
                'desc_inc' => 'Le estoy dando todo el rato al botón de encender, y no se enciende.',
                'fecha_inc' => $now,
                'foto_inc' => './img/incidencia2.jpg',
                'id_user' => 3,
                'id_subcat' => 7,
                'id_estado' => 2,
                'tecnico' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo_inc' => 'La pantalla se ve lila con rayas negras',
                'desc_inc' => 'Hace dos días que cada vez que enciendo la pantalla sale así. Ya no se que hacer.',
                'fecha_inc' => $now,
                'foto_inc' => './img/incidencia3.jpg',
                'id_user' => 3,
                'id_subcat' => 8,
                'id_estado' => 3,
                'tecnico' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo_inc' => 'El Google Meet no va.',
                'desc_inc' => 'No se me abre el Google Meet y me dice que mi cuenta no existe.',
                'fecha_inc' => $now,
                'foto_inc' => './img/incidencia4.jpg',
                'id_user' => 3,
                'id_subcat' => 3,
                'id_estado' => 5,
                'tecnico' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}