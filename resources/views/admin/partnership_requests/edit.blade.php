@extends('layouts.admin')



@section('path')
<div class="title">
    <h4>Partnership Request edit</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Partnership Requests</a></li>

    <li class="breadcrumb-item"><a href="{{ route('partnership-requests.show', $partnership_request->id)}}">{{$partnership_request->id}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">edit</li>
    </ol>
</nav>


@endsection



@section('content')


@if($errors->any())
<div class="alert alert-light border-left danger">
<ul>
    @foreach($errors->all() as $error)
    <li class="text-danger">{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif

<form method="post" action="{{route('partnership-requests.update',['partnership_request'=>$partnership_request->id])}}" >
    @csrf
    @method('PUT')


    

                    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="name">Name</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="name" id="name" value="{{old('name',$partnership_request->name)}}"
                        required="required"
                >
            @if($errors->has('name'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('name')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="interest">Interest</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="interest" id="interest" value="{{old('interest',$partnership_request->interest)}}"
                        required="required"
                >
            @if($errors->has('interest'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('interest')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="tel">Tel</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="tel" id="tel" value="{{old('tel',$partnership_request->tel)}}"
                        required="required"
                >
            @if($errors->has('tel'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('tel')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="email">Email</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="email" id="email" value="{{old('email',$partnership_request->email)}}"
                        required="required"
                >
            @if($errors->has('email'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('email')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="accepted">Accepted</label>
        <div class="col-sm-12 col-md-10">
               

                <select name="accepted" id="" class="form-control Boolean" required>
                    @if($partnership_request->accepted)
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    @else
                    <option value="0">No</option>
                    <option value="1">Yes</option> 
                    @endif
          
                </select>
            @if($errors->has('accepted'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('accepted')}}</strong></span>
        @endif
    </div>
</div>
                        
  


   



    
   

    <div class="offset-6">
        <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
    </div>

</form>  




@endsection












