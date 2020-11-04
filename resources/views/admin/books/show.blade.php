




@extends('layouts.admin')



@section('path')
<div class="title">
    <h4>Show book</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('books.index')}}">Books</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$book->id}}</li>
    </ol>
</nav>


@endsection



@section('content')


    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
   @endif


<a href="{{route('books.index')}}" class="btn btn-primary">Back to list</a>
   

<div class="alert alert-light">
   <center> <h3>Book</h3></center> 


<table class="table">
    <tr>
        <td colspan="2">Title: </td>
        <td>{{$book->title}}</td>
    </tr>

    <tr>
        <td colspan="2">Author:</td>
        <td>{{$book->author}}</td>
    </tr>

    <tr>
        <td colspan="2">Level:</td>
        <td>{{$book->level->name}}</td>
    </tr>

    <tr>
        <td colspan="2">Category:</td>
        <td>{{$book->book_category->name}}</td>
    </tr>

    <tr>
        <td colspan="2">Type:</td>
        <td>{{$book->book_type->name}}</td>
    </tr>
    <tr>
        <td colspan="2">featured:</td>
        <td> 

            @if($book->feautured)
        
               <span class="badge badge-success">YES</span>

            @else
            <span class="badge badge-warning">NO</span>
            @endif
           
        
        </td>
    </tr>


    <tr>
        <td colspan="2">Content:</td>
    <td> <a  href="{{asset('storage/books/contents/'.$book->content)}}"> {{$book->content}}</a></td>
    </tr>

    <tr>
        <td colspan="2">Cover:</td>
        <td> <a  href="{{asset('storage/books/covers/'.$book->cover)}}"> <img style="height:300px; width:300px"  src="{{asset('storage/books/covers/'.$book->cover)}}" alt=""></a></td>
    </tr>

 
</table>

</div>   


<div class="alert alert-light">
    <center> <h3>Quiz</h3></center> 
    <table class="table">
<thead>
    <th>Quiz name</th> 

    <th>Number of questions</th>
    <th>Action</th>
</thead>

<tbody>

    <tr>
    <td>{{$book->quiz->name}}</td>
    <td>{{$book->quiz->questions->count()}}</td>
    <td><a href="{{route('quizes.show',$book->quiz->id)}}">view</a></td>
    </tr>
</tbody>
       
    </table>
</div>


   
           

    





@endsection












