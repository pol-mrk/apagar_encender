<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_incidencias extends Model
{
    use HasFactory;
    public function subcategorias() {
        return $this->belongsTo(tbl_subcategorias::class);
    }
    public function estados() {
        return $this->belongsTo(Estados::class, 'id_estado');
    }
    public function usuarios() {
        return $this->belongsTo(Usuarios::class, 'tecnico');
    }
}