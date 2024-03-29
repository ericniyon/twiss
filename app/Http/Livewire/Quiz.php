<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Level;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Answer;
use Illuminate\Support\Str;


class Quiz extends Component
{

    public $myAnswers;
    public $quiz;
    public $bookID;
    public $questions;
    public $userID;
    public $countUser;
    public $nextQuestion="";
    public $allQuestions=0;
    public $questionID;
    public $answer;
    public $complited=false;
    public $showAnswers=false;
public $question_id="";
public $previous;
public $question;
public $score=0;
public $count = 0;
public $checkCorrect = false;

    public function mount($bookID)
{
    $this->bookID = $bookID;
    $random_string =rand(1,100000);
    $is_unique = false;
    
    while (!$is_unique) {
        $result = Answer::where('user_id', $this->userID)->count();
        if($result == 0) {  // if you don't get a result, then you're good
            $is_unique = true;}
        else    {                 // if you DO get a result, keep trying
            $random_string = Str::random(10);}
    }


    $this->userID= $random_string ;
    
}


public function UserID(){
   
    $random_string =rand(1,100000);
    $is_unique = false;
    
    while (!$is_unique) {
        $result = Answer::where('user_id', $this->userID)->count();
        if($result == 0) {  // if you don't get a result, then you're good
            $is_unique = true;}
        else    {                 // if you DO get a result, keep trying
            $random_string = Str::random(10);}
    }


    $this->userID= $random_string ;


} 
    


    
   






public function store()

{

    $validatedDate = $this->validate([

        'answer' => 'required',
        



       

    ]);

    //$this->UserID();

    if(!$this->answer==""){


    $checkAnswer= Answer::where('user_id',$this->userID)
    ->where('quiz_id', $this->quizID() )
    ->where('question_id',$this->questionID)->count();

    if($checkAnswer>0){

        $answer= Answer::where('user_id',1)
        ->where('quiz_id', $this->quizID() )
        ->where('question_id',$this->questionID)->take(1);

        
    
    $answer->update([

        'question_option_id' => $this->answer,

        

    ]);

   
    }

    else{

    $answer= new Answer;


    $answer->question_id=$this->questionID;
    $answer->question_option_id=$this->answer;
    $answer->quiz_id=$this->quizID();
    $answer->is_correct=1;
    $answer->user_id=$this->userID;
    $answer->save();
    }
  

    

    $this->increment();

    if(QuestionOption::find($this->answer)->correct){
    $this->score++;
       // session()->flash('message', 'Corrrect.'. $this->questionID .'count:'. $this->count);
    }


    
$this->resetAnswer();

}


else{

    session()->flash('message', 'Subiza ikibazo!');
}


    


}

public function resetAnswer(){

    $this->answer="";
}

public function  quizID(){
return Book::find($this->bookID)->quiz->id;
}



public function startAgain(){

    $this->count=0;
    $this->complited=false;
    $this->showAnswers=false;
}

public function increment()
{
    if( $this->count != $this->countQuestions()-1 ){
    $this->count++;}

    else{
        $this->count=0;
        $this->complited=true;
       
    }
}







public function countQuestions(){

    $this->allQuestions=Book::find($this->bookID)->quiz->questions->count();
    return $this->allQuestions;



}


public function showAnswers(){

   $this->showAnswers=true;

   $this->complited=false;
$this->myAnswers= Answer::where('user_id',$this->userID)
->where('quiz_id', $this->quizID())->get();
}




    public function render()
    {

        //session()->put('currentQuestion',$this->count);
        $this->question=Book::find($this->bookID)->quiz->questions->get($this->count);
        $this->questionID=$this->question->id;
       // ->toArray();

      
        return view('livewire.quiz', ['myAnswers'=>$this->myAnswers,'book'=>Book::find($this->bookID)]);
    }



    
}
