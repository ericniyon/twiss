<div>
    <div class="container">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Ibitabo bikunzwe</strong></h4>
            
        </div>
        <div class="row mt-4">
  
          @foreach($featuredBooks as $book)
         
          <div style="height:80%" class="col-md-4 card-container item features-image сol-12 col-md-6 col-lg-4">
            <div class="card-flip">
                <div class="card front">
                    <div  class="item-img">
                        <img style="height: 400px" src="{{asset('storage/books/covers/'.$book->cover)}}">
                    </div>
                </div>
                <div  style="height:100%; background:rgb(38, 220, 233)" class="card back ">
                    <p class="mbr-text mbr-fonts-style mt-3 display-7">
                  
                      </p>
                        <p style="margin-top:120px"><center>
                          @if ($book->book_type->name=="Written")
                          <a class="btn btn-danger display-4" href="{{route('book.readBook',$book->id)}}"><span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span>Soma igitabo</a>
                         @else
                         <a class="btn btn-danger display-4" href="{{route('book.listenBook',$book->id)}}"><span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span>Umva igitabo</a>
                          @endif
                       
                        </center></p>
                     
                </div>
            </div>
        </div>
  
   @endforeach
  
         
       
          
          
         
        </div>
        <center>  <p>   {{ $featuredBooks->links() }} </p> </center> 
    </div>
</div>
