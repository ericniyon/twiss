<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class Question extends Model
{
    use HasFactory;
    use CascadesDeletes;
    
    
    protected $cascadeDeletes = ['question_options'];
    public function question_options()
    {

        

        return $this->HasMany('App\Models\QuestionOption');
    }
}
