@extends('layouts.master')

@section('content')


<section class="header17 cid-sdRCBgbNQz mbr-fullscreen" id="header17-2d">

    

    

  <div class="align-center container">
      <div class="row justify-content-md-center">
          <div class="col-md-10">
              <h1 class="mbr-section-title mb-3 mbr-fonts-style display-1">
                  <strong>Intro with Video Popup</strong>
              </h1>
              <p class="mbr-text mb-3 mbr-fonts-style display-5">
                  Full-screen intro with Image and video popup.
              </p>

            <!--  <div class="mbr-media mb-3 show-modal"   data-toggle="modal" data-target="#audioPlayModal" >
                  <div class="icon-wrapper">
                      <span class="mbr-iconfont mobi-mbri-play mobi-mbri" style="color:orange fill: rgb(255, 255, 255);"></span>
                  </div>
              </div>-->


              <div class="mbr-media mb-3 show-modal"  onclick="playAudio()"  >
                <div class="icon-wrapper">
                    <span class="mbr-iconfont mobi-mbri-play mobi-mbri" style="color:orange fill: rgb(255, 255, 255);"></span>
                </div>
            </div>

              <p class="icon-description mb-3 mbr-fonts-style display-7">
                  Set the link to your video in Block Parameters
              </p>
          </div>
      </div>
  </div>
  <div>



    <!-- The Modal -->
<div style="hide" class="modal fade hide" id="audioPlayModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
   

      <!-- Modal body -->
      <div class="modal-body">

        <div style="border-left:5px solid orange" class="alert alert-secondary">
          <center>   <span class="text-dark">Uri kumva {{$book->title}} </span>    </center>
        </div>
        <div style="border-left:5px solid orange" class="alert alert-secondary">   
<center>
          <audio  id="myAudio" controls>
            <source  src="{{asset('storage/books/contents/'. $book->content)}}" type="audio/mpeg">
        
        
           </audio> 


          </center>

        </div>

        <div class="alert alert-light">

         <i data-dismiss="modal" class="material-icons" style="font-size:48px;color:red">highlight_off</i>

        </div>
        
      </div>


  

      <!-- Modal footer -->
   

    </div>
  </div>
</div>




  </div>
</section>




<section class="content11 cid-sdRDxbuJ0e" id="content11-2e">
  
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12 col-lg-10">
              <div class="mbr-section-btn align-center"><a class="btn btn-danger-outline display-4" href="">Subira inyuma</a></div>
          </div>
      </div>
  </div>
</section>

@endsection