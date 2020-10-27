@extends('layouts.admin')





@section('path')
<div class="title">
    <h4>Question create</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://twis.test" >Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Question</li>
    </ol>
</nav>

@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> Question Show </h1>
        </div>

    <div class="card-body">
                                        <div class="form-group">
            <label class="col-form-label" for="value">Question Text</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$question->question_text}}">
        </div>
                                                                    </div>

    </div>

    <div class="card mb-4">

                        <div class="card-header">
        <h2>Question Options</h2>
        </div>
        <div class="card-body">
            <div>
                <a href="{{route('question-options.create')}}">New</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                                                                                                                                                                        <th> Option</th>
                                                                                                                                                                                                                    </tr>
                </thead>
                <tbody>
                    @foreach($question->question_options as $question_option)
                    <tr>
                        <td>
                        <a href="{{route('question-options.show',['questionOption'=>$questionOption] )}}">Show</a>
                        <a href="{{route('question-options.edit',['questionOption'=>$questionOption] )}}">Edit</a>
                        <a href="javascript:void(0)" onclick="event.preventDefault();
                        document.getElementById('delete-question-option-{{$questionOption->id}}').submit();">
                            Delete
                        </a>
                        <form id="delete-question-option-{{$questionOption->id}}" action="{{route('question-options.destroy',['questionOption'=>$questionOption])}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        </td>
                                                                                                                                                                        <td> {{ $questionOption->option}}</td>
                                                                                                                                                                                                                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
                                
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection