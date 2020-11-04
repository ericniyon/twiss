<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class QuestionOption extends Model
{
    use HasFactory;
    use CascadesDeletes;
    protected $fillable = [ 'question_id', 'option','correct' ];
    protected $cascadeDeletes = ['answers'];
    

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }
}
