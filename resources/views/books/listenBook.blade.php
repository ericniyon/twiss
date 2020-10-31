@extends('layouts.master')

@section('content')


<section class="header17 cid-sdRCBgbNQz mbr-fullscreen" id="header17-2d">

    

    

  <div class="align-center container">
      <div class="row justify-content-md-center">
          <div class="col-md-10">
              <h1 class="mbr-section-title mb-3 mbr-fonts-style display-1">
              <strong>{{$book->title}}</strong>
              </h1>
            
              <div style="background:rgb(38, 220, 233)" class="item features-image ">
                <div class="item-wrapper">
                    
                    <div class="item-content">
                        
                      <audio style="margin-top:150px;margin-bottom:50px" id="myAudio" controls>
                        <source  src="{{asset('storage/books/contents/'. $book->content)}}" type="audio/mpeg">
            
             
            Your browser does not support the audio element.
                    </audio> 
                        
                    </div>
                   
                </div>
            </div>
          </div>
      </div>
  </div>
  <div>
     
  </div>
</section>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog  ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     
        <div  class="alert alert-success col-12">
          <h4>Urakoze kumva igitabo!</h4>
      </div>
      
    
         
        <p><center> Urashaka  kureba niba wasomye neza igitabo? </center></p>


    <center>  <a href="{{route('quiz.takeBookQuiz',$book->id)}}" class="btn item-btn btn-danger display-7" > Yego </button>  <a href="{{route('books.audioBooks',$book->level->id)}}" class="btn item-btn btn-outline-danger display-7"> Oya </a> </center>
       
       
      </div>
    
    </div>

  </div>
</div>

<!-- end modal -->


@endsection

@section('scripts')

<script>
  var aud = document.getElementById("myAudio");
  aud.onended = function() {
    
  
  
   $('#myModal').modal('show');
  };
  </script>
 
  @endsection

