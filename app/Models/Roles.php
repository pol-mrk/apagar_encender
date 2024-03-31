<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'tbl_roles';

    public function usuarios(){
        return $this->hasMany(Usuarios::class);
    }
}
