@extends('layouts.master')

@section( 'content')

<section class="content4 cid-sdRFwSVnh8" id="content4-2j">
    
    
    <div class="container">

<h1> {{$q->question_text}} </h1>


<form action="{{route('quiz.nextQuestion',$bookID)}}" method="post">
    @csrf
<input type="text" name="question_id" value="{{$q->id}}">
@foreach ($q->question_options as $op)



<div class="alert-alert-light">
  

<input type="radio" id="{{$op->id}}" name="answer" value="{{$op->id}}">
<label class="texr-dark" for="{{$op->id}}">{{$op->option}}</label><br>
</div>



    


@endforeach


<button type="submit" value="nextButton"  class="btn btn-primary">Igikurikiraho</button>

</form>
</div>
</section>

@endsection


