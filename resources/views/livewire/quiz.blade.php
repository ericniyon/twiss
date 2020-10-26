<div>
    <section class="content4 cid-sdRFwSVnh8" id="content4-2j">

        <div class="card">
            <div class="card-body">
        @if (session()->has('message'))

        <div class="alert alert-success">

            {{ session('message') }}

        </div>

    @endif

    

    @error('answer') <span class="text-danger">{{ $message }}</span>@enderror


    @if($complited)
    <button wire:click.prevent="startAgain" class="btn btn-success">Subiramo</button>

    <button wire:click.prevent="showAnswers" class="btn btn-success">Show answers</button>
    @else

    @if($showAnswers)
 
@foreach($myAnswers as $key => $answer)

<div>

@php

$allAnswers=\App\Models\QuestionOption::where('question_id' , $answer->question->id)->get();
$isCorrect=\App\Models\QuestionOption::where('question_id' , $answer->question->id)
                                      ->where('correct',1)->get('id');
@endphp
<h4>{{$answer->question->question_text}}</h4>



@foreach($allAnswers as $key => $a)


    @if($a->id==$answer->question_option_id )


@if($a->correct)
<div style="background: rgba(29, 197, 93, 0.048)" class="alert ">
    <i class="material-icons" style="color:green">done</i><strong class="text-dark">{{$a->option}}</strong>
</div>
@else
<div class="alert alert">
    <i class="material-icons" style="color:red">clear</i><strong class="text-dark">{{$a->option}}</strong>
</div>
@endif

@else

<div  @if($a->correct) style="background: rgba(29, 197, 93, 0.048)"  @endif class="alert ">
    
    @if($a->correct)
    <i class="material-icons" style="color:green">done</i> <strong class="text-dark">{{$a->option}}</strong> 

    @else
    <strong class="text-dark">{{$a->option}}</strong> 
    @endif
    
    </div> 

    



@endif
   
   
@endforeach


  
@endforeach

    @else


        <form wire:submit.prevent="store">
    
       
   {{$question->question_text}}
        <div class="container">
    
            <input wire:model="questionID" value="{{$question->id}}" type="text">
            @foreach ($question->question_options as $op)



            <div class="alert-alert-light">
              
            
            <input wire:model="answer" type="radio" id="{{$op->id}}" name="{{$op->question->id}}" value="{{$op->id}}">
            <label class="texr-dark" for="{{$op->id}}">{{$op->option}}</label><br>
            </div>
            
            
            
                
            
            
            @endforeach
            <button  class="btn btn-success">Next question</button>
    </div>
</div>




    
       
    



  
    
    
   
<form>

    @endif
    @endif
</div>
    </section>
</div>
