<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'cooperator_id',
        'project_id',
        'date',
        'amount'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function cooperator(){
        return $this->belongsTo(Cooperator::class);
    }
}
