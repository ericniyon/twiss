<div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" class="card">
     
  @if($showAnswers)

  <a href="{{route('books.writtenBooks',$book->level->id)}}" class=" btn btn-primary">Subira ku bitabo</a>
  @endif



    @if(!$showAnswers && !$complited)
    @if($count>0)
      @php
         $currentQuestion=$count+1;
    $ratio=$currentQuestion*100;
     $percent=$ratio/$allQuestions;
      @endphp

      @else

      @php
        $percent=0;
      @endphp
    @endif
   
    <div  style="margin-bottom:10px " class="progress">
    <div class="progress-bar" role="progressbar" style="width: {{$percent}}%" aria-valuenow="{{$percent}}" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    
    <div  class=""><p style="font-size: 20px">{{$count+1}}.{{$question->question_text}} ?</p>
    </div> 
    @endif
  <div class="card-body">


    <!-- quiz complited-->
    @if($complited)
<div style="background: green" class="alert text-light">Urakoze! usoje ibazwa.</div>
  <div class="alert alert-primary"><h3>Amanota : {{$score}}/ {{$allQuestions}} </h3></div>
    <button wire:click.prevent="startAgain" class="btn btn-primary"><i class='fas fa-angle-double-left'></i> Subiramo</button>

    <button wire:click.prevent="showAnswers" class="btn btn-outline-primary">Ibisubizo <i class='fas fa-angle-double-right'></i></button>
    <!-- end quiz complited-->
    @else

    <!--answers -->
    @if($showAnswers)

    @php
    $countQuestions=0;
    @endphp
    @foreach($myAnswers as $key => $answer)

    <div  class="row">
    
    @php
   $countQuestions++;
    $allAnswers=\App\Models\QuestionOption::where('question_id' , $answer->question->id)->get();
    $isCorrect=\App\Models\QuestionOption::where('question_id' , $answer->question->id)
                                          ->where('correct',1)->get('id');
    @endphp



<div  class=""><p style="font-size: 20px">{{$countQuestions}}. {{$answer->question->question_text}}</p></div>
<div class="col-sm-12">
@foreach($allAnswers as $key => $a)  

@if($a->id==$answer->question_option_id )
@if($a->correct)
  <div  class="form-check alert alert-success">
    <input class="form-check-input" type="radio" name="{{$a->question->id}}" id="{{$a->id}}" value="option1" checked disabled>
    <label class="form-check-label" for="{{$a->id}}">
        {{$a->option}} <i class="fas fa-check text-success"></i> <br>
    </label>
  </div>
@else

<div class="form-check alert ">
<input class="form-check-input" type="radio" name="{{$a->question->id}}" id="{{$a->id}}" value="{{$a->id}}" checked disabled>
    <label class="form-check-label" for="gridRadios2">
        {{$a->option}} <i class="fas fa-times text-danger"></i>
    </label>
  </div>


  @endif


  @else
  <div  class="form-check alert  @if($a->correct) alert-success @endif">
    <input class="form-check-input" type="radio" name="{{$a->question->id}}" id="{{$a->id}}" value="option1" disabled>
    <label class="form-check-label" for="{{$a->id}}">
        {{$a->option}} 
    </label>
  </div>


  @endif


 @endforeach
</div>
</div>
  @endforeach
 
    @else 

    <!-- end answers-->
      <!-- questions -->
      
          <div  class="row">
             
          
            <div class="col-sm-10">
              <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            
                @error('answer')  <span class="text-danger">Banza usubize ikibazo!</span>@enderror
                <form >
    
                    @foreach ($question->question_options as $op)
              
              <div style="margin-right:100px; border:1px solid grey" class="form-check alert">
                <input style="margin-left:2px" wire:model="answer" class="form-check-input" type="radio" id="{{$op->id}}" name="{{$op->question->id}}" value="{{$op->id}}">
                <label style="margin-left:20px" class="form-check-label" for="{{$op->id}}">
                    {{$op->option}}
                </label>
              </div>
                 @endforeach
                 
            <div  wire:loading wire:target="store">
               
                  <livewire:loading /> 
              </div>
             
              <button wire:loading.remove wire:target="store" wire:click.prevent="store"  class="btn btn-outline-primary">Igikurikiyeho <i class='fas fa-angle-double-right'></i></button>
            </form>
            </div>
          </div>

         
          
       <!-- end questions -->   
       @endif
       @endif 
  </div>
 </div>