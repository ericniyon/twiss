@extends('layouts.admin')





@section('path')
<div class="title">
    <h4>Partnership Request create</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://twis.test" >Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Partnership Request</li>
    </ol>
</nav>

@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> Partnership Request Show </h1>
        </div>

    <div class="card-body">
                                        <div class="form-group">
            <label class="col-form-label" for="value">Name</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$partnershipRequest->name}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Interest</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$partnershipRequest->interest}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Tel</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$partnershipRequest->tel}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Email</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$partnershipRequest->email}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Accepted</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$partnershipRequest->accepted}}">
        </div>
                                                    </div>

    </div>

    <div class="card mb-4">

        
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection