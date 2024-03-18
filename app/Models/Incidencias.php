<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencias extends Model
{
    use HasFactory;
    public function subcategorias() {
        return $this->belongsTo(Subcategorias::class);
    }
    public function estados() {
        return $this->belongsTo(Estados::class);
    }
    public function usuarios() {
        return $this->belongsTo(Usuarios::class);
    }
}
