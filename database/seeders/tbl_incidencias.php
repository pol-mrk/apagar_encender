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
                'titulo_inc' => 'raton',
                'desc_inc' => 'raton no funciona',
                'fecha_inc' => $now,
                'id_user' => 2,
                'id_subcat' => 1,
                'id_estado' => 1,
                'tecnico' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
