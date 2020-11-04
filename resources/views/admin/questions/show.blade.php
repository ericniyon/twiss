@extends('layouts.admin')





@section('path')
<div class="title">
    <h4>Question show</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin" >Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('questions.index')}}" >Questions</a></li>
   
   
        <li class="breadcrumb-item active" aria-current="page">{{$question->id}}</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container">

    <div class="card mb-4">

         <center>   <h4> Question Show </h4> </center>
        

    <div class="card-body">
              
        
        <div class="form-group">
            <label class="col-form-label" for="value">Question Text:</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$question->question_text}}">
        </div>
                                                                    </div>

    </div>

    <div class="card mb-4">

                    
        <center><h4>Question Options</h4></center>
        
        <div class="card-body">
            

            <table class="table">
                <thead>
                    <tr>
                       
                        <th>Option</th>
                        <th>Corect</th>
                                                                                                                                                                        <th> Option</th>
                                                                                                                                                                                                                    </tr>
                </thead>
                <tbody>
                    @foreach($question->question_options as $questionOption)
                    <tr>
                        <td> {{ $questionOption->option}}</td>
                        <td>@if($questionOption->correct)

                            <label for="" class="badge-success badge"> Yes</label>

                            @else
                            <label for="" class="badge-danger badge"> No</label>
                            
                        @endif
                    </td>
                        <td>
                        <a href="{{route('question-options.show',$questionOption->id )}}">Show</a>
                        <a href="{{route('question-options.edit',$questionOption->id )}}">Edit</a>
                        <a href="javascript:void(0)" onclick="event.preventDefault();
                        document.getElementById('delete-question-option-{{$questionOption->id}}').submit();">
                            Delete
                        </a>
                        <form id="delete-question-option-{{$questionOption->id}}" action="{{route('question-options.destroy',$questionOption->id)}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        </td>
                                                                                                                                                                       
                                                                                                                                                                                                                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
                                
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection