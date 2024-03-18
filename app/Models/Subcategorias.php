<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategorias extends Model
{
    use HasFactory;

    protected $table = 'tbl_subcategorias';

    public function categorias() {
        return $this->belongsTo(Categorias::class);
    }
    public function incidencias() {
        return $this->belongsTo(Incidencias::class);
    }
}
