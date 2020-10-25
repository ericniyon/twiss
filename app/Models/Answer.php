<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;


    protected $fillable = [ 'question_option_id', 'quizable_type', 'name', ];

    public function questin_option()
    {
        return $this->belongsTo('App\Models\QuestionOption');
    }
}
