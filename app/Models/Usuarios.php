<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    public function rol(){
        return $this->belongsTo(Roles::class);
    }
    public function sedes() {
        return $this->belongsTo(Sedes::class);
    }
}
