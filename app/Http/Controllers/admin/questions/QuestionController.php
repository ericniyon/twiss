<?php

namespace App\Http\Controllers\admin\questions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Level;
use App\Models\BookCategory;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuestionOption;
use App\Models\BookType;
use App\Http\Requests\QuestionPostRequest;

use Illuminate\Support\Facades\Storage;
Use Alert;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
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
        $questions = Question::all();
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
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

        return redirect()->back()->with('toast_success', ' Question created !')
        ->with('quizName',$quizName ) 
        ->with('quizID', $quizID )
         ;
    





        
        
       


      

      

           
        
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Question $question)
    {
        return view('admin.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit(Request $request, Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    public function update(QuestionPostRequest $request, Question $question)
    {
        $data = $request->validated();
        $question->fill($data);
        $question->save();
        return redirect()->route('questions.index')->with('toast_success', 'Question updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
