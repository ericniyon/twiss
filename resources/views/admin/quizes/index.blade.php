@extends('layouts.admin')

@section('path')
<div class="title">
    <h4>Quizes</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Quizes</li>
       
    </ol>
</nav>


@endsection

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
												
                                                <a class="dropdown-item" href="{{route('quizes.addQuestion',$quiz->id)}}"><i class="dw dw-eye"></i> Add question</a>

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