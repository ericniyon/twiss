@extends('layouts.admin')





@section('path')
<div class="title">
    <h4>Question Option show</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/" >Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('question-options.index')}}" >Question options</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$question_option->id}}</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container">

    <div class="card mb-4">

          <center>  <h4> Question Option Show </h4> </center>


    <div class="card-body">
                                                        <div class="form-group">
            <label class="col-form-label" for="value">Option:</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$question_option->option}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Correct:</label>
            
            @if($question_option->correct)
            <label class="badge badge-success">Yes</label>
            @else
            <label class="badge badge-danger">No</label>
                
            @endif

            
        </div>
                                                    </div>

    </div>

    <div class="card mb-4">

                        
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection