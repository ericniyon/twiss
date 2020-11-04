@extends('layouts.admin')

@section('path')
<div class="title">
    <h4>Show quiz</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('quizes.index')}}">Quizes</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$quiz->id}}</li>
    </ol>
</nav>


@endsection

@section('content')

@if($quiz->questions)

<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
<table class="table">
      <thead>
            <th>Question</th> 
            <th>Number of options</th>
            <th>Action</th>
      </thead>

      <tbody>
      
           
            
      @foreach ($quiz->questions as  $question )
      <tr>  
      <td> {{$question->question_text}}</td>
      <td>{{$question->question_options->count()}}</td>
      <td><a href="{{route('questions.show', $question->id)}}">view</a>|<a href="{{route('questions.edit', $question->id)}}">edit</a> </td>                 
    </tr> 
           
      @endforeach  
            
  
      </tbody>
</table>

</div>
@endif


@endsection