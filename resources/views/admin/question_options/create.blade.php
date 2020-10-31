@extends('layouts.admin')

@section('path')
<div class="title">
   <h4>New Question Option</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
   <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="http://twis.test">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">New Question Option</li>
   </ol>
</nav>
@endsection


@section('content')

@if($errors->any())
    @include('admin.partials.errors')
@endif


<form action="{{route('question-options.store')}}" method="POST" novalidate>
   @csrf
  
                          <div class="form-group row">
                 <label class="col-sm-12 col-md-2 col-form-label" for="question_id">Question</label>
                 <div class="col-sm-12 col-md-10">
                 <select class="js-example-basic-single form-control" style="width:100%" name="question_id" id="question_id">
                     @foreach((\App\Models\Question::all() ?? [] ) as $question)
                     <option value="{{$question->id}}">
                         {{$question->question_text}}</option>
                     @endforeach
                 </select>
             </div>
            </div>
                          


                                                                                           <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="option">Option</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('option') is-invalid @enderror  String"  type="text"  name="option" id="option" value="{{old('option')}}"                  maxlength="255"
                                                   required="required"
                                  >
                                  @if($errors->has('option'))
                 <p class="text-danger">{{$errors->first('option')}}</p>
                 @endif
             </div>
            </div>
                                                    <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="correct">Correct</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('correct') is-invalid @enderror  Boolean"  type="text"  name="correct" id="correct" value="{{old('correct')}}"                                   required="required"
                                  >
                                  @if($errors->has('correct'))
                 <p class="text-danger">{{$errors->first('correct')}}</p>
                 @endif
             </div>
            </div>
                                                                              


      

 <div class="offset-6">
               <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
 </div>
            </form>

         </div>            
@endsection