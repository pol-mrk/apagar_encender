<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_subcategorias extends Model
{
    use HasFactory;
    public function categorias() {
        return $this->belongsTo(Categorias::class);
    }
    public function incidencias() {
        return $this->belongsTo(tbl_incidencias::class);
    }
}
