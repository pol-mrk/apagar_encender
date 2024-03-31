<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prioridades extends Model
{
    use HasFactory;

    protected $table = 'tbl_prioridades';

    public function incidencias() {
        return $this->hasMany(Incidencias::class);
    }
}
