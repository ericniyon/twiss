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
							<h4 class="text-blue h4">Edit </h4>
							
						</div>
						<div class="pull-right">
							<a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
						</div>
					</div>
					<form  method="post" action="{{route('books.update', $book->id)}}"  enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Title</label>
							<div class="col-sm-12 col-md-10">
								 <input name="title" type="text" value="{{$book->title}}" class="form-control" >
							</div>
						</div>


                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Author</label>
							<div class="col-sm-12 col-md-10">
								 <input name="author" type="text" class="form-control" value="{{$book->author}}">
							</div>
						</div>


                        


                        	<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Level</label>
							<div class="col-sm-12 col-md-10">
								<select name="level" class="custom-select col-12">
										<option value="{{$book->level_id}}" selected>{{$book->level->name}}</option>
                                            @foreach ($levels as $level )
                                            <option value="{{$level->id}}">{{$level->name}}</option>
                                            @endforeach
                                    </select>
							</div>
						</div>  


						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Type</label>
							<div class="col-sm-12 col-md-10">
								<select name="bookType" class="custom-select col-12">
								  <option value="{{$book->book_type_id}}" selected>{{$book->book_type->name}} </option>
                                        @foreach ($bookTypes as $bookType )
                                          <option value="{{$bookType->id}}">{{$bookType->name}}
                                          </option>
                                      @endforeach
                                    </select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Category</label>
							<div class="col-sm-12 col-md-10">
								<select name="bookCategory" class="custom-select col-12">
									<option value="{{$book->book_category_id}}" selected>{{$book->book_category->name}}</option>
										@foreach ($bookCats as $bookCat )
                                    <option value="{{$bookCat->id}}">{{$bookCat->name}}</option>
                                    @endforeach

                                 </select>   
							</div>
						</div>


						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Description</label>
							<div class="col-sm-12 col-md-10">
								 <textarea class="form-control" name="description" >
                                 {{$book->description}}
                                 </textarea>
							</div>
						</div>



						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Cover</label>
                            
                        

                            
							<div class="col-sm-12 col-md-10">
                                <img
                          src="{{asset('storage/books/covers/'.$book->cover)}}"
                          alt="Avatar"
                           style="width: 100px; height: 150px;"
                           />
								<input style="margin-top:20px" type="file" name="cover" class="form-control-file form-control height-auto">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Content</label>


                           
                           
							<div class="col-sm-12 col-md-10">
                                 <a href="{{asset('storage/books/contents/'.$book->content)}}">{{$book->content}} </a>
								<input type="file" name="content" class="form-control-file form-control height-auto">
                               
							</div>
						</div>
						
						
                     <div class="row">
                        <div class="col-lg-12 offset-6">
                            <div class="payment-adress">
                               <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                        </div>
                        </div>
                    </div>
						
						
						
						
					</form>
 
@endsection