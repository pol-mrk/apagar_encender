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
                'nombre_user' => 'Julio',
                'apellidos_user' => 'Cesar',
                'correo_user' => 'julio@gmail.com',
                'fecha_ini_user' => $now,
                'fecha_fin_user' => '2024-06-14 13:00:00',
                'pwd_user' => 'asdASD123',
                'id_rol' => 4,
                'id_sede' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_user' => 'PolMarc',
                'apellidos_user' => 'Montero',
                'correo_user' => 'polmarc@gmail.com',
                'fecha_ini_user' => $now,
                'fecha_fin_user' => '2024-08-24 14:00:00',
                'pwd_user' => 'asdASD123',
                'id_rol' => 2,
                'id_sede' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_user' => 'Ian',
                'apellidos_user' => 'Romero',
                'correo_user' => 'ianromero@gmail.com',
                'fecha_ini_user' => $now,
                'fecha_fin_user' => '2024-10-04 15:00:00',
                'pwd_user' => 'asdASD123',
                'id_rol' => 3,
                'id_sede' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_user' => 'Sergio',
                'apellidos_user' => 'Callejas',
                'correo_user' => 'sergiocallejas@gmail.com',
                'fecha_ini_user' => $now,
                'fecha_fin_user' => '2024-11-30 16:00:00',
                'pwd_user' => 'asdASD123',
                'id_rol' => 1,
                'id_sede' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
