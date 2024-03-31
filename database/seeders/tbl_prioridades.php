<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tbl_prioridades extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table("tbl_prioridades")->insert([
            [
                'nombre_prioridad' => 'Prioritario',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_prioridad' => 'Muy importante',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_prioridad' => 'Importante',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_prioridad' => 'Poco importante',
                'created_at' => $now,
                'updated_at' => $now,
            ],[
                'nombre_prioridad' => 'Nada importante',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
