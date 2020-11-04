@extends('layouts.admin')



@section('path')
<div class="title">
    <h4>Edit question</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://twis.test">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Questions</a></li>
    <li class="breadcrumb-item"><a href="{{ route('questions.show',$question->id) }}">{{$question->id}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>


@endsection



@section('content')


@if($errors->any())
<div class="alert alert-light border-left danger">
<ul>
    @foreach($errors->all() as $error)
    <li class="text-danger">{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif

<form method="post" action="{{route('questions.update',['question'=>$question->id])}}" >
    @csrf
    @method('PUT')


                

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="quiz_id">Quiz</label>
        <div class="col-sm-12 col-md-10">
        <select class="selectQuiz form-control" style="width:100%" name="quiz_id" id="quiz_id">
            @foreach((\App\Models\Quiz::all() ?? [] ) as $quiz)
            <option value="{{$quiz->id}}"
                @if($question->quiz_id == old('quiz_id', $quiz->id))
                selected="selected"
                @endif
            >{{$quiz->name}}</option>

            @endforeach
        </select>
    </div>
</div>
        

                    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="question_text">Question Text</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="question_text" id="question_text" value="{{old('question_text',$question->question_text)}}"
                        required="required"
                >
            @if($errors->has('question_text'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('question_text')}}</strong></span>
        @endif
    </div>
</div>
                                
  


   



    
   

    <div class="offset-6">
        <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
    </div>

</form>  




@endsection












