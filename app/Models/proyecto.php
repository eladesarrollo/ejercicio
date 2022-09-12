<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyecto extends Model
{
    use HasFactory;
    
    public function proyectos(){
        
        return $this->hasMany('App\Models\proyecto');
    }
}
