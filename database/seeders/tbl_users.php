<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tbl_users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table("tbl_users")->insert([
            [
                'nombre_user' => 'julio',
                'apellidos_user' => 'cesar',
                'correo_user' => 'julio@gmail.com',
                'fecha_user' => $now,
                'pwd_user' => 'asdASD123',
                'id_rol' => 1,
                'id_sede' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_user' => 'marc',
                'apellidos_user' => 'montes',
                'correo_user' => 'marc@gmail.com',
                'fecha_user' => $now,
                'pwd_user' => 'asdASD123',
                'id_rol' => 4,
                'id_sede' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
