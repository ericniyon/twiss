<div>
    <div class="container content4 cid-sdRFwSVnh8" id="content4-2j">
        <div class="row justify-content-center">
           
               
        <input 
        wire:model="query"
        wire:keydown.escape="reset"
    wire:keydown.tab="reset"
        
      
        type="text" id="myInput"  placeholder="Andika hano igitabo ushaka..">
  
        
@if(!empty($query))

@if(!empty($books))
        <ul style="width: 100%;" id="myUL">

            @foreach($filterBooks as $i => $book)
           @if($book['book_type_id']==1)
          <li ><a href="{{route('book.readBook',$book->id)}}"> <center><img style="height: 250px; width:200px" src="{{asset('storage/books/covers/'.$book->cover)}}"></center></a></li>

          
           
          @else
          <li ><a href="{{route('book.listenBook',$book->id)}}">{{ $book->title }}</a></li>
         @endif
          @endforeach
          <li >{{ $filterBooks->links() }}</li>      
        </ul> 

@else
<ul style="width: 100%;" id="myUL">

   
    <li ><a  href="#">Icyo gitabo ntacyo dufite.</a></li>

    
</ul>    
@endif

@endif
  
            </div>
  
  
  
           </div>
</div>








 