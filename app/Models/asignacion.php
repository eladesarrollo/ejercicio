<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class asignacion extends Model
{
    use HasFactory;

    public function cooperante(){
        
        return $this->belongsTo('App\Models\Cooperante');
    }
    public function proyecto(){
        
        return $this->belongsTo('App\Models\Proyecto');
    }

}

