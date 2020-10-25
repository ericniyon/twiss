<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class Quiz extends Model
{
    use HasFactory;

    
    use CascadesDeletes;
    
    
    protected $cascadeDeletes = ['questions'];
    protected $fillable = [ 'quizable_id', 'quizable_type', 'name', ];
    public function quizable()
    {
        return $this->morphTo();
    }


    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
