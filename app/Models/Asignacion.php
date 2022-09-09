<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'cooperante_id' => 'integer',
        'proyecto_id' => 'integer',
        'fechaAsignacion' => 'datetime',
    ];

    public function cooperante()
    {
        return $this->belongsTo(Cooperante::class);
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
