@extends('layouts.admin')



@section('path')
<div class="title">
    <h4>Question Option</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://twis.test">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Question Options</a></li>
    <li class="breadcrumb-item active" aria-current="page">id</li>
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

<form method="post" action="{{route('question-options.update',['question_option'=>$question_option->id])}}" >
    @csrf
    @method('PUT')


        

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="question_id">Question</label>
        <div class="col-sm-12 col-md-10">
        <select class="selectQuiz form-control" style="width:100%" name="question_id" id="question_id">
            @foreach((\App\Models\Question::all() ?? [] ) as $question)
            <option value="{{$question->id}}"
                @if($question_option->question_id == old('question_id', $question->id))
                selected="selected"
                @endif
            >{{$question->question_text}}</option>

            @endforeach
        </select>
    </div>
</div>
        

                            <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="option">Option</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="option" id="option" value="{{old('option',$question_option->option)}}"
                        required="required"
                >
            @if($errors->has('option'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('option')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="correct">Correct</label>
        <div class="col-sm-12 col-md-10">
            <select name="correct" id="" class="form-control">

                @if($question_option->correct)
                <option value="1" selected>Yes</option>
                <option value="0">No</option>
                   @else
                <option value="0" selected>No</option>
                <option value="1">Yes</option>
                    
                @endif
            </select>
               
            @if($errors->has('correct'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('correct')}}</strong></span>
        @endif
    </div>
</div>
                        
  


   



    
   

    <div class="offset-6">
        <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
    </div>

</form>  




@endsection












