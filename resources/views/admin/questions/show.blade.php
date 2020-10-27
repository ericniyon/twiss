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
@endsection
@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h4> Question Show </h4>
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
        <h4>Question Options</h4>
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
                    @foreach($question->question_options as $questionOption)
                    <tr>
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