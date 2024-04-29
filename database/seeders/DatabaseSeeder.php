<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(tbl_roles::class);
        $this->call(tbl_estados::class);
        $this->call(tbl_sedes::class);
        $this->call(tbl_categorias::class);
        $this->call(tbl_subcategorias::class);
        $this->call(tbl_users::class);
        $this->call(tbl_prioridades::class);
        $this->call(tbl_incidencias::class);
    }
}
