@extends('layouts.dashboard')

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
                                     <th>Created at</th>
									<th>Author</th>
                                   
									<th>Level</th>
                                    <th>Type</th>
                                    <th>Category</th>
									<th>Cover</th>
									<th>Content</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                          

                            @foreach($books as $book)
								<tr>
                              
                                
									<td class="table-plus">{{$book->title}}</td>
                                    <td>{{$book->created_at}}</td>
                                    <td>{{$book->author}}</td>
									<td>{{$book->level->name}}</td>
                                    <td>{{$book->book_type->name}}</td>
                                    <td>{{$book->book_category->name}}</td>
									
									<td> <img
                                              src="{{asset('storage/books/covers/'.$book->cover)}}"
                                            alt="Avatar"
                                            style="width: 100px; height: 150px;"
                                           /> 
                                    </td>
									<td><a href="{{asset('storage/books/contents/'.$book->content)}}">{{$book->content}} </a></td>
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