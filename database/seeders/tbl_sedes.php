<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tbl_sedes extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $now = Carbon::now();
        DB::table("tbl_sedes")->insert([
            [
                'nombre' => 'Barcelona',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Berlín',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Montreal',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
