@extends('layouts.dashboard')

@section('content')
 		<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Cartoons</h4>
						
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
                                
									<th class="table-plus datatable-nosort">Title</th>
                                     <th>Created at</th>
									<th>Author</th>
                                   
									<th>Level</th>
                                   
                                    <th>Category</th>
									<th>Cover</th>
									<th>Content</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                          

                            @foreach($cartoons as $cartoon)
								<tr>
                              
                                
									<td class="table-plus">{{$cartoon->title}}</td>
                                    <td>{{$cartoon->created_at}}</td>
                                    <td>{{$cartoon->author}}</td>
									<td>{{$cartoon->level->name}}</td>
                                  
                                    <td>{{$cartoon->cartoon_category->name}}</td>
									
									<td> <img
                                              src="{{asset('storage/cartoons/covers/'.$cartoon->cover)}}"
                                            alt="Avatar"
                                            style="width: 100px; height: 150px;"
                                           /> 
                                    </td>
									<td><a href="{{asset('storage/cartoons/contents/'.$cartoon->content)}}">{{$cartoon->content}} </a></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="{{route('cartoons.show',$cartoon->id)}}"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="{{route('cartoons.edit',$cartoon->id)}}"><i class="dw dw-edit2"></i> Edit</a>


                                                <form action="{{route('cartoons.destroy',$cartoon->id)}}" method="post">
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