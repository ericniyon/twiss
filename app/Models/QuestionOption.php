<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class QuestionOption extends Model
{
    use HasFactory;
    use CascadesDeletes;
    protected $cascadeDeletes = ['answers'];
    

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }
}
