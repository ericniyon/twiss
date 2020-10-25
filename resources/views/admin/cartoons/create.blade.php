@extends('layouts.dashboard')

@section('content')





	<!-- Default Basic Forms Start -->


    @if (session('errors'))
    <div style="margin-top:100px" class="alert alert-danger">
        {{ session('errors') }}
    </div>
@endif
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Add new book</h4>
							
						</div>
						<div class="pull-right">
							<a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
						</div>
					</div>
					<form  method="post" action="{{route('cartoons.store')}}"  enctype="multipart/form-data">
                    @csrf
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Title</label>
							<div class="col-sm-12 col-md-10">
								 <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required placeholder="Cartoon title">
							</div>

							@error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>


                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Author</label>
							<div class="col-sm-12 col-md-10">
								 <input name="author" type="text" class="form-control @error('author') is-invalid @enderror"  value="{{ old('author') }}" required placeholder="Cartoon author">
							</div>
						</div>


                        


                        	<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Level</label>
							<div class="col-sm-12 col-md-10">
								<select name="level" class="custom-select col-12 @error('level') is-invalid @enderror">
										<option value="none" selected="" disabled="">Level</option>
                                            @foreach ($levels as $level )
                                            <option value="{{$level->id}}">{{$level->name}}</option>
                                            @endforeach
                                </select>
							</div>
						</div>  






						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Type</label>
							<div class="col-sm-12 col-md-10">
								<select name="cartoonType" class="custom-select col-12 @error('cartoonType') is-invalid @enderror" required>
								  <option value="none" selected="" disabled="">Select Cartoon type ...</option>
                                        @foreach ($cartoonTypes as $cartoonType )
                                          <option value="{{$cartoonType->id}}">{{$cartoonType->name}}
                                          </option>
                                      @endforeach
                                    </select>
							</div>
						</div>



                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Category</label>
							<div class="col-sm-12 col-md-10">
								<select name="cartoonCategory" class="custom-select col-12 @error('cartoonCategory') is-invalid @enderror" required>
								  <option value="none" selected="" disabled="">Select Cartoon category ...</option>
                                        @foreach ($cartoonCats as $cartoonCat )
                                          <option value="{{$cartoonCat->id}}">{{$cartoonCat->name}}
                                          </option>
                                      @endforeach
                                    </select>
							</div>
						</div>
				



							<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Featured</label>
							<div class="col-sm-12 col-md-10">
								<select name="featured" class="custom-select col-12 @error('featured') is-invalid @enderror" required>
										<option value="1" >Yes</option>
										<option value="0" >No</option>
                                          
                                    </select>
							</div>
						</div> 


						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Description</label>
							<div class="col-sm-12 col-md-10">
								 <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" required></textarea>
							</div>
						</div>



						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Cover</label>
							<div class="col-sm-12 col-md-10">
								<input type="file" name="cover" value="{{ old('cover') }}" class="form-control-file form-control height-auto @error('cover') is-invalid @enderror" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Content</label>
							<div class="col-sm-12 col-md-10">
								<input type="file" name="content" value="{{ old('content') }}" class="form-control-file form-control height-auto" required>
							</div>
						</div>
						
						
                     <div class="row">
                        <div class="col-lg-12 offset-5">
                            <div class="payment-adress">
                               <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                        </div>
                        </div>
                    </div>
						
						
						
						
					</form>
 
@endsection