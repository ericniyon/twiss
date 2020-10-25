<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class Book extends Model
{
    use HasFactory;
    use CascadesDeletes;
 
    protected $cascadeDeletes = ['quiz'];
    protected $fillable = ['title', 'cover', 'book_type_id', 'book_category_id', 'cover', 'content', 'author'];
    
    public function quiz()
    {
        return $this->morphOne('App\Models\Quiz', 'quizable');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

    public function book_type()
    {
        return $this->belongsTo('App\Models\BookType');
    }


    public function book_category()
    {
        return $this->belongsTo('App\Models\BookCategory');
    }



    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
