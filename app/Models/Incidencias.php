<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencias extends Model
{
    protected $table = 'tbl_incidencias';
    use HasFactory;
    public function subcategorias() {
        return $this->belongsTo(Subcategorias::class);
    }
    public function estados() {
        return $this->belongsTo(Estados::class);
    }

    public function prioridades() {
        return $this->belongsTo(Prioridades::class,'id_prioridades');
    }

    public function usuarios() {
        return $this->belongsTo(Usuarios::class);
    }
}
