<div>

  
    <div class="mbr-section-head">
    <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Ibitabo byo mu mwaka wa {{$levelName}}</strong></h4>
        
    </div>
<div style="margin-top:20px" class="container">
    <div class="row justify-content-center">
       
         <div class="col-lg-12 col-sm-12 col-md-12">     
        <input 
        wire:model="query"
        wire:keydown.escape="reset"
        wire:keydown.tab="reset"
        
      
        type="text" id="myInput"  placeholder="Andika hano igitabo ushaka..">
  
    
        </div>
    </div>
   
    </div>  
  
  
    @if($books->count()>0)
    <div class="container">
        
        <div class="row mt-4">
 
          @foreach($books as $book)
         
          <div style="height:80%" class="col-md-4 card-container item features-image сol-12 col-md-6 col-lg-4">
            <div class="card-flip">
                <div class="card front">
                    <div  class="item-img">
                        <img style="height: 400px" src="{{asset('storage/books/covers/'.$book->cover)}}">
                    </div>
                </div>
                <div  style="height:100%; background:rgb(38, 220, 233)" class="card back ">
                   
                        <p style="margin-top:150px"><center>
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
        
   <center>  <p>   {{ $books->links() }} </p> </center>  
    </div>
</div>


@else
<center> <div class="alert alert-danger col-md-6">Oooh! icyo gitabo ntacyo dufite!</div></center>

@endif