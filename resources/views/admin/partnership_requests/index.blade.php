@extends('layouts.admin')



@section('path')
<div class="title">
    <h4>Partnership Request</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://twis.test">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Partnership Request</li>
    </ol>
</nav>


@endsection



@section('content')



@if(session('status'))
    <div style="border-left:5px solid green" class="alert alert-success">
        <center> <i class="icon-copy text-success fa fa-check-circle" aria-hidden="true"></i>  {{ session('status') }} .</center>
    </div>
@endif


<a style="margin-bottom:20px" href="{{route('partnership-requests.create')}}" class="btn btn-success"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>New</a>
   <table class="data-table table stripe hover nowrap">
   
    @if(count($partnership_requests))
    <thead>
        <tr>
                        
                                    <th>Name</th>
            
                                    <th>Interest</th>
            
                                    <th>Tel</th>
            
                                    <th>Email</th>
            
                                    <th>Accepted</th>
            
                        
                        
                     
          
            
           <td>Action</td>
            
            
            
        </tr>
    </thead>
    @endif
    <tbody>

    @forelse($partnership_requests as $partnership_request)
    <tr>
                    <td>{{$partnership_request->name}}</td>
                <td>{{$partnership_request->interest}}</td>
                <td>{{$partnership_request->tel}}</td>
                <td>{{$partnership_request->email}}</td>
                <td>
                    @if($partnership_request->accepted)
                        <label for="" class="badge badge-success">Yes</label>

                        @else
                        <label for="" class="badge badge-danger">No</label>
                    @endif
                    
                </td>
                        


    
    <td>
        <div class="dropdown">
            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="dw dw-more"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                
            <a class="dropdown-item" href="{{route('partnership-requests.edit',['partnership_request'=>$partnership_request] )}}"><i class="dw dw-edit2"></i> Edit</a>

            <a class="dropdown-item"  href="{{route('partnership-requests.show',['partnership_request'=>$partnership_request] )}}"><i class="dw dw-eye"></i> Show</a>
            <a class="dropdown-item"  href="javascript:void(0)" onclick="event.preventDefault();
            document.getElementById('delete-partnership-request-{{$partnership_request->id}}').submit();"> <i class="dw dw-eye"></i> Delete</a>

<form id="delete-partnership-request-{{$partnership_request->id}}" action="{{route('partnership-requests.destroy',['partnership_request'=>$partnership_request])}}" method="POST" style="display: none;">
@csrf
@method('DELETE')
</form>
               
                
            </div>
        </div>
    </td>

    
    
    @empty
    <p>No Partnership Requests</p>
</tr>
    @endforelse
       

    <tbody>    

    </table>     




@endsection
