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
    function index(){

      $q=Question::all();

     
      
      
     return view('quizes.index',['q'=>$q]);
    }


    function test(){

      $q=Book::find(10)->quiz->questions;

     
      
      
     return view('quizes.test',['q'=>$q]);
    }


    function takeBookQuiz(Request $request , $bookID){

  
      $bookID=$bookID;
      $request->session()->forget('questionCount');
        //$q=Book::find($bookID)->quiz->questions;
        // $questionCount=Book::find($bookID)->quiz->questions->count();
  
      //  $request->session()->put('questionCount', $questionCount);
  //echo $request->session()->get('questionCount');
  
  
  if($request->session()->has('questionCount'))
  {
  
    if($request->session()->get('questionCount')==0 || $request->session()->get('questionCount')<0 ){
    
   
  
     $nextQuestion=  $request->session()->get('questionCount');
     $q=Book::find($bookID)->quiz->questions->get(0);
     $request->session()->forget('questionCount');
   echo   $answerCollection = $request->session()->get('answerCollection');
     return redirect()->route('quiz.takeBookQuiz',$bookID)
     ->with("success","Book ended");
    }
     
   else{
  
  
    
  
     $nextQuestion=  $request->session()->get('questionCount');
     $q=Book::find($bookID)->quiz->questions->get($nextQuestion);
   }
           
  }  
  
  else{
  
    
  
   $questionCount=Book::find($bookID)->quiz->questions->count();
  $questionCount= $questionCount-1;
    
  $request->session()->put('questionCount', $questionCount);
  $firstQuestion=$questionCount;
  $q=Book::find($bookID)->quiz->questions->get($firstQuestion);
  
   // $request->session()->put('questionCount', $questionCount);
   //echo "nnnn";
   //$answerCollection = collect(['question_id', 'is_collect' ,'option_id']);

   //$request->session()->put('answerCollection',   $answerCollection);

   
  }
     
      return view('quizes.answers',['q'=>$q, 'bookID'=>$bookID ]);
        
   
        
       //return view('quizes.takeBookQuiz',['q'=>$q, 'bookID'=>$bookID ]);



     
    }


    function nextQuestion(Request $request){

      $validator = Validator::make($request->all(),[
        //$request->validate([
            'answer'=>'required',
            
            
   
           ]);

           if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
             }
      $count= $request->session()->get('questionCount')-1;
   
      $request->session()->put('questionCount', $count);

     
    
     

      if($request->session()->has('answerCollection')){
        $answerCollection = $request->session()->get('answerCollection');
       //$combined= $answerCollection->combine([$requestion->question_id,0, $request->answer]);
       $concatenated = $answerCollection->concat([$request->question_id,0, $request->answer]);
       
       $request->session()->put('answerCollection', $concatenated);
      }


      else{
        $answerCollection = collect(['question_id', 'is_collect' ,'option_id']);

        
        
        $combined= $answerCollection->combine([$request->question_id,0, $request->answer]);
        $request->session()->put('answerCollection', $combined);
        //$request->session()->put('answerCollection',   $answerCollection);
      }


      $answerCollection = $request->session()->get('answerCollection');
      //$answerCollection->all();
      $answerCollection=$answerCollection->toArray();
    //foreach ($answerCollection as $a)

    //{

     // echo $a;
  //  }


      return redirect()->back();


    }
    function Quizcomplited(Request $request){

      $request->session()->forget('questionCount');
      $request->session()->forget('answerCollection');

    }


    
}
