@extends('layouts.dashboard')

@section('content')

<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
<?php $count=0 ; ?>
@foreach ($quiz->questions as  $question )
<?php $count++ ; ?>
<div class=" alert alert-light">
{{$count}} . {{$question->question_text}}  
   
      @foreach ($question->question_options as $option)
           <div class=" alert alert-light">
            <label class="@if($option->correct) text-success @else text-dark @endif ">   {{$option->option}} </label>
           </div>
          
      @endforeach

</div>   
@endforeach
</div>


@endsection