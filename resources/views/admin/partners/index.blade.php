@extends('layouts.admin')



@section('path')
<div class="title">
    <h4>Partner</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://twis.test">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Partner</li>
    </ol>
</nav>


@endsection



@section('content')



@if(session('status'))
    <div style="border-left:5px solid green" class="alert alert-success">
        <center> <i class="icon-copy text-success fa fa-check-circle" aria-hidden="true"></i>  {{ session('status') }} .</center>
    </div>
@endif


<a style="margin-bottom:20px" href="{{route('partners.create')}}" class="btn btn-success"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>New</a>
   <table class="data-table table stripe hover nowrap">
   
    @if(count($partners))
    <thead>
        <tr>
                        
                                    <th>Name</th>
            
                                 
            
                                    <th>Contract</th>
            
                                    <th>Tel</th>
            
                                    <th>Email</th>
            
                                    <th>Web Link</th>
            
                        
                        
                     
          
            
           <td>Action</td>
            
            
            
        </tr>
    </thead>
    @endif
    <tbody>

    @forelse($partners as $partner)
    <tr>
                    <td>{{$partner->name}}</td>
              
                <td>{{$partner->contract}}</td>
                <td>{{$partner->tel}}</td>
                <td>{{$partner->email}}</td>
                <td>{{$partner->web_link}}</td>
                        


    
    <td>
        <div class="dropdown">
            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="dw dw-more"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                
            <a class="dropdown-item" href="{{route('partners.edit',['partner'=>$partner] )}}"><i class="dw dw-edit2"></i> Edit</a>

            <a class="dropdown-item"  href="{{route('partners.show',['partner'=>$partner] )}}"><i class="dw dw-eye"></i> Show</a>
            <a class="dropdown-item"  href="javascript:void(0)" onclick="event.preventDefault();
            document.getElementById('delete-partner-{{$partner->id}}').submit();"> <i class="dw dw-eye"></i> Delete</a>

<form id="delete-partner-{{$partner->id}}" action="{{route('partners.destroy',['partner'=>$partner])}}" method="POST" style="display: none;">
@csrf
@method('DELETE')
</form>
               
                
            </div>
        </div>
    </td>

    
    
    @empty
    <p>No Partners</p>
</tr>
    @endforelse
       

    <tbody>    

    </table>     




@endsection
