@extends('layouts.dashboard')

@section('content')
 		<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Books quizes</h4>
						
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
                                
									<th class="table-plus datatable-nosort">Quiz name</th>
                                     <th>Created at</th>
									<th>Questions</th>
                                   
							
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                          
                      
                            @foreach($quizes as $quiz)
                          
								<tr>
                              
                                
									<td class="table-plus">{{$quiz->name}}</td>
                                    <td>{{$quiz->created_at}}</td>
                                    <td>{{$quiz->questions->count()}}</td>
									
									
								
									
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="{{route('quizes.show',$quiz->id)}}"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>


                                                <form action="{{route('quizes.destroy',$quiz->id)}}" method="post">
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