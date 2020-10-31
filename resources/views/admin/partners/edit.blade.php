@extends('layouts.admin')



@section('path')
<div class="title">
    <h4>Partner</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://twis.test">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Partners</a></li>
    <li class="breadcrumb-item active" aria-current="page">id</li>
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

<form method="post" action="{{route('partners.update',['partner'=>$partner->id])}}" >
    @csrf
    @method('PUT')


    

                    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="name">Name</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="name" id="name" value="{{old('name',$partner->name)}}"
                        required="required"
                >
            @if($errors->has('name'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('name')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="logo">Logo</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="logo" id="logo" value="{{old('logo',$partner->logo)}}"
                        required="required"
                >
            @if($errors->has('logo'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('logo')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="contract">Contract</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="contract" id="contract" value="{{old('contract',$partner->contract)}}"
                        required="required"
                >
            @if($errors->has('contract'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('contract')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="tel">Tel</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="tel" id="tel" value="{{old('tel',$partner->tel)}}"
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
                <input class="form-control String"  type="text"  name="email" id="email" value="{{old('email',$partner->email)}}"
                        required="required"
                >
            @if($errors->has('email'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('email')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="web_link">Web Link</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="web_link" id="web_link" value="{{old('web_link',$partner->web_link)}}"
                        required="required"
                >
            @if($errors->has('web_link'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('web_link')}}</strong></span>
        @endif
    </div>
</div>
                        
  


   



    
   

    <div class="offset-6">
        <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
    </div>

</form>  




@endsection












