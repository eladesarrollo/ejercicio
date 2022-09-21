<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperante extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'email',
        'direccion'
    ];
    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class);
    }
}
