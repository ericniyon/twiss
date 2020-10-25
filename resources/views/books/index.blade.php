<!-- Developed by Takit -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('master/css/books.css')}}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
    />
    <title>TWIS</title>
  </head>

  <body>
    <div class="main">

    @include('partials.header')

    
      <!-- hero section -->
      <div class="hero">
        <div class="content-hero">
          <div class="explore">
            <img src="{{asset('master/images/books.png')}}" alt="books" />
            <h3>REBA IBITABO DUFITE BYOSE</h3>
          </div>
          <h1>IBITABO</h1>
          <a href="#readings" class="button">TANGIRA USOME</a>
        </div>
      </div>
    </div>
    <!-- end hero section -->

    <!-- books section -->

    <div class="books-container" id="readings">
     

      <div class="content">
        <div class="search-bar">
          <input
            type="text"
            class="searchTerm"
            placeholder="Andika hano igitabo ushaka"
          />
        </div>

      

        <div class="popular">
          <h3>IBIKUNZWE CYANE</h3>
          <div class="separator"></div>

          <div class="books">

             @foreach($featuredBooks as $book)


          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img
                  src="{{asset('storage/books/covers/'.$book->cover)}}"
                  alt="Avatar"
                  style="width: 200px; height: 100%;"
                />
              </div>

                 <div class="flip-card-back">
                <h1>{{$book->title}}y</h1>
                <p class="author">{{$book->description}}</p>

                @if ($book->book_type->name=="Written")
                  <a href="{{route('book.readBook',$book->id)}}" class="button">Soma </a>  
                  @else
                  <a href="{{route('book.listenBook',$book->id)}}" class="button">Umva igitabo</a>  
                @endif
                
              </div>
            </div>
          </div>

        @endforeach

          
           
          
          </div>
        </div>


     @foreach($levels as $level)

        <div class="kids">
          <h3>Ibitabo byo mu mwaka {{$level->name}}</h3>
          <div class="separator"></div>
          <div class="books">

           @foreach($level->books as $book)
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
              
                  <img
                    src="{{asset('storage/books/covers/'.$book->cover)}}"
                    alt="Avatar"
                    style="width: 200px; height: 100%;"
                  />
                </div>
                <div class="flip-card-back">
                  <h1>{{$book->title}}</h1>
                <p class="author">{{$book->description}}</p>
                  @if ($book->book_type->name=="Written")
                  <a href="{{route('book.readBook',$book->id)}}" class="button">Soma </a>  
                  @else
                  <a href="{{route('book.listenBook',$book->id)}}" class="button">Umva igitabo</a>  
                @endif
                </div>
              </div>
            </div>
          @endforeach
        

           

        
          </div>
        </div>

@endforeach


      </div>
    </div>
    <!-- end books section -->

    <!-- footer -->
  
 @include('partials.footer')
    

    <script src="{{asset('master/js/scroll.js')}}"></script>
  </body>
</html>
