@extends('layouts.admin')
@section('path')
<div class="title">
    <h4>Books</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>

	<li class="breadcrumb-item active" aria-current="page">Books</li>
    </ol>
</nav>


@endsection

@section('content')
 		<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Books</h4>
						
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
                                
									<th class="table-plus datatable-nosort">Title</th>
                                     
									
                                   
									<th>Level</th>
									<th>Featured</th>
                                    <th>Type</th>
                                    
									<th>Cover</th>
									
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                          

                            @foreach($books as $book)
								<tr>
                              
                                
									<td class="table-plus">{{$book->title}}</td>
                                    
                                  
									<td>{{$book->level->name}}</td>
									<td>@if($book->feautured)
										<label class="badge badge-success">Yes</label>
										@else
										<label for="" class="badge badge-danger">No</label>
									@endif</td>
                                    <td>{{$book->book_type->name}}</td>
         
									
									<td> <img
                                              src="{{asset('storage/books/covers/'.$book->cover)}}"
                                            alt="Avatar"
                                            style="width: 100px; height: 150px;"
                                           /> 
                                    </td>
									
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="{{route('books.show',$book->id)}}"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="{{route('books.edit',$book->id)}}"><i class="dw dw-edit2"></i> Edit</a>


                                                <form action="{{route('books.destroy',$book->id)}}" method="post">
                                                         @csrf
                                                        @method('DELETE')
                                               <button class="dropdown-item"  type="submit"><i class="dw dw-delete-3"></i> Delete</button>
                                           
                                              </form>
												
											</div>
										</div>
									</td>
								</tr>
								@endforeach
							
								
								
							
								
							
							

							


							
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
@endsection