<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    protected $table = 'tbl_categorias';
    public function subcategorias() {

        return $this->hasMany(Subcategorias::class);
    }
}
