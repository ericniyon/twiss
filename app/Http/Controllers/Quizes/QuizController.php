<?php

namespace App\Http\Controllers\Quizes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Level;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Cartoon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
  function takeBookQuiz(Request $request , $bookID){
    $bookID=$bookID;
    
     
     
    return view('quizes.start',['bookID'=>$bookID ]);
        
   }


   


    
}
