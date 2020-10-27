@extends('layouts.admin')



@section('path')
<div class="title">
    <h4>Question</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://twis.test">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Question</li>
    </ol>
</nav>


@endsection



@section('content')



@if(session('status'))
    <div style="border-left:5px solid green" class="alert alert-success">
        <center> <i class="icon-copy text-success fa fa-check-circle" aria-hidden="true"></i>  {{ session('status') }} .</center>
    </div>
@endif


<a style="margin-bottom:20px" href="{{route('questions.create')}}" class="btn btn-success"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>New</a>
   <table class="data-table table stripe hover nowrap">
   
    @if(count($questions))
    <thead>
        <tr>
                        
                                    <th>Question Text</th>
            
                        
                        
                        
                     
          
            
           <td>Action</td>
            
            
            
        </tr>
    </thead>
    @endif
    <tbody>

    @forelse($questions as $question)
    <tr>
                    <td>{{$question->question_text}}</td>
                                


    
    <td>
        <div class="dropdown">
            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="dw dw-more"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                
            <a class="dropdown-item" href="{{route('questions.edit',['question'=>$question] )}}"><i class="dw dw-edit2"></i> Edit</a>

            <a class="dropdown-item"  href="{{route('questions.show',['question'=>$question] )}}"><i class="dw dw-eye"></i> Show</a>
            <a class="dropdown-item"  href="javascript:void(0)" onclick="event.preventDefault();
            document.getElementById('delete-question-{{$question->id}}').submit();"> <i class="dw dw-eye"></i> Delete</a>

<form id="delete-question-{{$question->id}}" action="{{route('questions.destroy',['question'=>$question])}}" method="POST" style="display: none;">
@csrf
@method('DELETE')
</form>
               
                
            </div>
        </div>
    </td>

    
    
    @empty
    <p>No Questions</p>
</tr>
    @endforelse
       

    <tbody>    

    </table>     




@endsection
