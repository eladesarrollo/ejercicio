<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;
    protected $fillable = ['proyecto_id', 'cooperante_id', 'fecha', 'monto'];

    public function cooperante()
    {
        return $this->belongsTo(Cooperante::class);
    }
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
