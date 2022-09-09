<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperante extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cooperantes()
    {
        return $this->hasMany(Cooperante::class);
    }
}
