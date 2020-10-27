@extends('layouts.admin')

@section('path')
<div class="title">
   <h4>New Question</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
   <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="http://twis.test">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">New Question</li>
   </ol>
</nav>
@endsection


@section('content')

@if($errors->any())
    @include('admin.partials.errors')
@endif


<form action="{{route('questions.store')}}" method="POST" novalidate>
   @csrf
  
                                                    <div class="form-group row">
                 <label class="col-sm-12 col-md-2 col-form-label" for="quiz_id">Quiz</label>
                 <div class="col-sm-12 col-md-10">
                 <select class="selectQuiz form-control" style="width:100%" name="quiz_id" id="quiz_id">
                     @foreach((\App\Models\Quiz::all() ?? [] ) as $quiz)
                     <option value="{{$quiz->id}}">
                         {{$quiz->name}}</option>
                     @endforeach
                 </select>
             </div>
            </div>
                          


                                                                 <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="question_text">Question Text</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('question_text') is-invalid @enderror  String"  type="text"  name="question_text" id="question_text" value="{{old('question_text')}}"                  maxlength="255"
                                                   required="required"
                                  >
                                  @if($errors->has('question_text'))
                 <p class="text-danger">{{$errors->first('question_text')}}</p>
                 @endif
             </div>
            </div>
                                                                                                        


      

 <div class="offset-6">
               <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
 </div>
            </form>

         </div>            
@endsection