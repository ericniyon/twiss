
@extends('layouts.admin')

@section('content')

@section('path')
<div class="title">
    <h4>Show quiz</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('quizes.index')}}">Quizes</a></li>
    <li class="breadcrumb-item"><a href="{{route('quizes.show',$quiz->id)}}">{{$quiz->id}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add question</li>
    </ol>
</nav>


@endsection




<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

	<div class="pd-20">
    <h4 class="text-blue h4">Your are adding question to {{$quiz->name}} .</h4>
						
	</div>
			

 <div class="form-group">
                <hr>
                <form action="{{route('quizes.addQuestionStore')}}" method="post">
                    @csrf
                    <div class="table-responsive">
                       
                        <table class="table table-bordered" id="dynamic_field">
                            <div class="form-group">



                            @if (session('quizID'))

                            
                            <div class="alert alert-success">
                              Continue addind questions to {{session('quizName')}} (please do not refresh page ).......
                            </div>
                              <input name="quiz" value="{{session('quizID')}}" type="hidden">
                   
                           
                           


                              @else

                        <input type="hidden" name="quiz" value="{{$quizID}}">
                               


                               

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
@section('scripts')

<script type="text/javascript">
    $(document).ready(function () {
        var n = 0;

        $('#addAnswer').click(function () {
            n++;
            $('#dynamic_field').append('' +
                '<tr id="row' + n + '" class="dynamic-added">' +
                '<td>' +
                '</td>' +
                '<td>' +
                '<input type="text" name="options[]" required placeholder="Type option here" class="form-control question_list" />' +
                '</td>' +
                '<td>' +
                '<input type="checkbox" name="correct[]" value="' + n + '" class="form-control question_list" />' +
                '</td>' +
                '<td>' +
                '<button type="button" name="remove" id="' + n + '" class="btn btn-danger btn_remove">X</button>' +
                '</td>' +
                '</tr>');
        });


        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>
@endsection