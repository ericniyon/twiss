@extends('layouts.admin')





@section('path')
<div class="title">
    <h4>Partner create</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin" >Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('partners.index')}}" >Partners</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$partner->id}}</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> Partner Show </h1>
        </div>

    <div class="card-body">
                                        <div class="form-group">
            <label class="col-form-label" for="value">Name:</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$partner->name}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Logo:</label>
            <img src="{{asset('storage/partners/logos/'.$partner->logo)}}" alt="">
         
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Contract:</label>
                                <a href="{{asset('storage/partners/contracts/'.$partner->contract)}}">{{$partner->contract}}</a>
          
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Tel:</label>
                                
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$partner->tel}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Email:</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$partner->email}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Web Link:</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$partner->web_link}}">
        </div>
                                                    </div>

    </div>

    <div class="card mb-4">

        
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection