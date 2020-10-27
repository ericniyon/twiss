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
    protected $fillable = [ 'quiz_id', 'question_text' ];
    public function question_options()
    {

        

        return $this->HasMany('App\Models\QuestionOption');
    }


    public function quiz()
    {

        

        return $this->belongsTo('App\Models\Quiz');
    }
}
