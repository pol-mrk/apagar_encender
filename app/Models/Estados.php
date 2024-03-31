<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;

    protected $table = 'tbl_estados';

    public function incidencias() {
        return $this->hasMany(Incidencias::class);
    }
}
