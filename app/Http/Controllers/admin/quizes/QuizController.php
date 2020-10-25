<?php

namespace App\Http\Controllers\admin\quizes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Cartoon;
use App\Models\Level;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\Storage;

class QuizController extends Controller
{


    
    public function __construct()
{
    $this->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     

        $quizes =Quiz::withCount('questions')->get();
        
        //$quizQuizes = Book::withCount('questions')->get();
        //$cartoonQuizes = Cartoon::withCount('questions')->get();

        return view('admin.quizes.index',[ 'quizes'=>$quizes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$books=Book::all();

        $quizes =Quiz::all();
      

        return view('admin.quizes.create',['quizes'=>$quizes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        $quiz=Quiz::find($id);

        return view('admin.quizes.show', ['quiz'=>$quiz]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // $questions=Book::find($bookID)->questions;

       // foreach($questions as $question){

      //  $question_options=$question->question_options;  
      //  foreach($question_options as $option)
      //  {

      //      $option->delete();
     //   }
      //  $question->delete();

     //   }
     
     
     $quiz=Quiz::find($id)->delete();
     
 


       return  redirect()->back()->with('success', ' All the quiz questions have deleted !');
    }








    public function destroyCartoonQuiz($cartoonID)
    {
        $questions=Cartoon::find($cartoonID)->questions;

        foreach($questions as $question){

        $question_options=$question->question_options;  
        foreach($question_options as $option)
        {

            $option->delete();
        }
        $question->delete();

        }


       return  redirect()->back()->with('success', ' All the quiz questions have deleted !');
    }



}
