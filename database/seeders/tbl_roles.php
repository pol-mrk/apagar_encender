<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tbl_roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table("tbl_roles")->insert([
            [
                'nombre_rol' => 'Administrador',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_rol' => 'Gestor d’equip',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_rol' => 'Tècnic',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_rol' => 'Client',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
