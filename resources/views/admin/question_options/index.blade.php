@extends('layouts.admin')



@section('path')
<div class="title">
    <h4>Question Options</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Question Options</li>
    </ol>
</nav>


@endsection



@section('content')



@if(session('status'))
    <div style="border-left:5px solid green" class="alert alert-success">
        <center> <i class="icon-copy text-success fa fa-check-circle" aria-hidden="true"></i>  {{ session('status') }} .</center>
    </div>
@endif



   <table class="data-table table stripe hover nowrap">
   
    @if(count($question_options))
    <thead>
        <tr>
                        
                        
                                    <th>Option</th>
            
                                    <th>Correct</th>
            
                        
                        
                     
          
            
           <td>Action</td>
            
            
            
        </tr>
    </thead>
    @endif
    <tbody>

    @forelse($question_options as $question_option)
    <tr>
                            <td>{{$question_option->option}}</td>
                <td> @if($question_option->correct)
                    <label class="badge badge-success">Yes</label>
                    @else
                    <label class="badge badge-danger">No</label>
                        
                    @endif</td>
                        


    
    <td>
        <div class="dropdown">
            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="dw dw-more"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                
            <a class="dropdown-item" href="{{route('question-options.edit',['question_option'=>$question_option] )}}"><i class="dw dw-edit2"></i> Edit</a>

            <a class="dropdown-item"  href="{{route('question-options.show',['question_option'=>$question_option] )}}"><i class="dw dw-eye"></i> Show</a>
            <a class="dropdown-item"  href="javascript:void(0)" onclick="event.preventDefault();
            document.getElementById('delete-question-option-{{$question_option->id}}').submit();"> <i class="dw dw-eye"></i> Delete</a>

<form id="delete-question-option-{{$question_option->id}}" action="{{route('question-options.destroy',['question_option'=>$question_option])}}" method="POST" style="display: none;">
@csrf
@method('DELETE')
</form>
               
                
            </div>
        </div>
    </td>

    
    
    @empty
    <p>No Question Options</p>
</tr>
    @endforelse
       

    <tbody>    

    </table>     




@endsection
