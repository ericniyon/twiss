@extends('layouts.admin')

@section('path')
<div class="title">
   <h4>New Partnership Request</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
   <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="http://twis.test">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">New Partnership Request</li>
   </ol>
</nav>
@endsection


@section('content')

@if($errors->any())
    @include('admin.partials.errors')
@endif


<form action="{{route('partnership-requests.store')}}" method="POST" novalidate>
   @csrf
  



                                                                 <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="name">Name</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('name') is-invalid @enderror  String"  type="text"  name="name" id="name" value="{{old('name')}}"                  maxlength="255"
                                                   required="required"
                                  >
                                  @if($errors->has('name'))
                 <p class="text-danger">{{$errors->first('name')}}</p>
                 @endif
             </div>
            </div>
                                                    <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="interest">Interest</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('interest') is-invalid @enderror  String"  type="text"  name="interest" id="interest" value="{{old('interest')}}"                  maxlength="255"
                                                   required="required"
                                  >
                                  @if($errors->has('interest'))
                 <p class="text-danger">{{$errors->first('interest')}}</p>
                 @endif
             </div>
            </div>
                                                    <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="tel">Tel</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('tel') is-invalid @enderror  String"  type="text"  name="tel" id="tel" value="{{old('tel')}}"                  maxlength="255"
                                                   required="required"
                                  >
                                  @if($errors->has('tel'))
                 <p class="text-danger">{{$errors->first('tel')}}</p>
                 @endif
             </div>
            </div>
                                                    <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="email">Email</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('email') is-invalid @enderror  String"  type="text"  name="email" id="email" value="{{old('email')}}"                  maxlength="255"
                                                   required="required"
                                  >
                                  @if($errors->has('email'))
                 <p class="text-danger">{{$errors->first('email')}}</p>
                 @endif
             </div>
            </div>
                                                    <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="accepted">Accepted</label>
                 <div class="col-sm-12 col-md-10">
                                  <input  class="form-control  @error('accepted') is-invalid @enderror  Boolean"  type="text"  name="accepted" id="accepted" value="{{old('accepted')}}"                                   required="required"
                                  >
                                  @if($errors->has('accepted'))
                 <p class="text-danger">{{$errors->first('accepted')}}</p>
                 @endif
             </div>
            </div>
                                                                              


      

 <div class="offset-6">
               <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
 </div>
            </form>

         </div>            
@endsection