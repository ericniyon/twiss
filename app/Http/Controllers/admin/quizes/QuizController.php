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
    public function addQuestion($quizID)
    {
        //$books=Book::all();

        $quiz =Quiz::find($quizID);
      

        return view('admin.quizes.addQuestion',['quiz'=>$quiz,'quizID'=>$quizID]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addQuestionStore(Request $request)
    {
     
        $request->validate([

            'question'=>'required',

            'options'=>'required',
            'correct'=>'required',
        ]);

        $quiz=$request->input('quiz');
        $questionText = $request->input('question');
        $optionArray = $request->input('options');
        $correctOptions = $request->input('correct');

        
        $question = new Question();

        
            $question->quiz_id = $quiz;
            $question->question_text = $questionText;
            $question->save();

        $questionToAdd = Question::latest()->first();;
        $questionID = $questionToAdd->id;
    
        foreach ($optionArray as $index => $opt) {
            $option = new QuestionOption();
            $option->question_id = $questionID;
            $option->option = $opt;
            foreach ($correctOptions as $correctOption) {
                if($correctOption == $index+1) {
                    $option->correct = 1;
                }
            }
    
            $option->save();
        }
        $quizName=Quiz::find($quiz)->name;
        $quizID=Quiz::find($quiz)->id;

        return redirect()->back()->with('toast_success', ' Question created !');
        
        
         
    





        
        
       


      

      

           
        
        
    
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
     
     
     $quiz=Quiz::find($id)->delete();
     
 


       return  redirect()->back()->with('success', ' All the quiz questions have deleted !');
    }








 



}
