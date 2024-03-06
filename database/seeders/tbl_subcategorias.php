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
                'nombre_sub_cat' => 'teclado',
                'id_categoria' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
