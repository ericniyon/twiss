@extends('layouts.admin')

@section('content')






<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

	<div class="pd-20">
		<h4 class="text-blue h4">Add question to quiz(book or cartoon)</h4>
						
	</div>
			

 <div class="form-group">
                <hr>
                <form action="{{route('questions.store')}}" method="post">
                    @csrf
                    <div class="table-responsive">
                       
                        <table class="table table-bordered" id="dynamic_field">
                            <div class="form-group">



                            @if (session('quizID'))

                            
                            <div class="alert alert-success">
                              Continue adding questions to {{session('quizName')}} (please do not refresh page ).......
                            </div>
                              <input name="quiz" value="{{session('quizID')}}" type="hidden">
                   
                           
                           


                              @else
                                <label for="">Select Book name</label>
                                <select name="quiz" id="inputState" class="form-control" required>
                                     <option  value="" selected>Quiz.....</option> 
                                     
                                    @foreach ($quizes as $quiz)

                                  
                                        <option  value="{{$quiz->id}}">{{$quiz->name}} </option> 

                                 

                                    @endforeach
                                       
                                   
                                </select>



                               

                                 @endif 
                            </div>
                            <tr>
                                <td>
                                    <input type="text" name="question" placeholder="Insert questition here ....."
                                           class="form-control question_list" required
                                    />
                                <td>
                                    <input type="text" name="options[]" placeholder="insert answer here (option) ...."
                                           class="form-control options_list" required
                                    />
                                </td>
                                <td>
                                    <input type="checkbox"
                                           name="correct[]"
                                           value="1"
                                           placeholder="Insert another answer(option) ....."
                                           class="form-control"
                                    />
                                </td>
                                </td>
                                <td>
                                    <button type="button" name="addAnswer" id="addAnswer" class="btn btn-success mb-2">
                                        Add Answer
                                    </button>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" name="addQuestion" id="addQuestion" class="btn btn-success mb-2 mr-2"
                               value="Add Question"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

 
@endsection