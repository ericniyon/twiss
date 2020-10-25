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
							<h4 class="text-blue h4">Edit Cartoon</h4>
							
						</div>
						<div class="pull-right">
							<a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
						</div>
					</div>
					<form  method="post" action="{{route('cartoons.update',$cartoon->id)}}"  enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Title</label>
							<div class="col-sm-12 col-md-10">
								 <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $cartoon->title }}" required placeholder="Cartoon title">
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
								 <input name="author" type="text" class="form-control @error('author') is-invalid @enderror"  value="{{ $cartoon->author }}" required placeholder="Cartoon author">
							</div>
						</div>


                        


                        	<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Level</label>
							<div class="col-sm-12 col-md-10">
								<select name="level" class="custom-select col-12 @error('level') is-invalid @enderror">
										<option value="{{$cartoon->level_id}}" selected>{{$cartoon->level->name}}</option>
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
								  <option value="{{$cartoon->cartoon_type_id}}" selected>{{$cartoon->cartoon_type->name}}</option>
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
								  <option value="{{$cartoon->cartoon_category_id}}" selected >{{$cartoon->cartoon_category->name}}</option>
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
                                  @if ($cartoon->feautured==1)

	                               <option value="1" >Yes</option>
                                  <option value="0" >No</option>
                                  @else
                                  <option value="0" >No</option>
                                  <option value="1" >Yes</option>
                                      
                                  @endif
                                
										
										
                                          
                                    </select>
							</div>
						</div> 


						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Description</label>
							<div class="col-sm-12 col-md-10">
								 <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" required>
                                 {{$cartoon->description}}
                                 </textarea>
							</div>
						</div>



						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Cover</label>
							<div class="col-sm-12 col-md-10">
                            <img   src="{{asset('storage/cartoons/covers/'.$cartoon->cover)}}"
                          alt="Avatar"
                           style="width: 100px; height: 150px;"
                           />
								<input style="margin-top:20px" type="file" name="cover" value="{{ old('cover') }}" class="form-control-file form-control height-auto @error('cover') is-invalid @enderror" >
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Content</label>
							<div class="col-sm-12 col-md-10">
                                 <a href="{{asset('storage/cartoons/contents/'.$cartoon->content)}}"> {{$cartoon->content}}</a>
								<input type="file" name="content" value="{{ old('content') }}" class="form-control-file form-control height-auto" >
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