<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tbl_estados extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table("tbl_estados")->insert([
            [
                'nombre_estado' => 'Sense assignar',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_estado' => 'Assignada',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_estado' => 'En treball',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_estado' => 'Resolta',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_estado' => 'Tancada',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
