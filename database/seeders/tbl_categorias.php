<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tbl_categorias extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table("tbl_categorias")->insert([
            [
                'nombre_cat' => 'Software',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_cat' => 'Hardware',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
