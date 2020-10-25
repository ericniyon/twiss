<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }
    public function cartoons()
    {
        return $this->hasMany('App\Models\Cartoon');
    }
}
