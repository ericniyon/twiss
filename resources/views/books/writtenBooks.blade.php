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
    @livewireStyles()
     @livewireScripts()
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
          <h1 style="font-size:60px">IBITABO</h1>
          <a style="margin-left:50px;font-size:15px" href="#readings" class="button">SOMA IGITABO</a>
        </div>
      </div>
    </div>
    <!-- end hero section -->

    <!-- books section -->

    <div class="books-container" id="readings">
     <div class="browse">
       
        </ul>
      </div>

     
<div class="content">

        @livewire('search-book')

</div>


<div class="filter-container">
  <div class="filter" onclick="myFunction()">
    <div class="filter-icon">
      <img src="{{asset('master/images/filter.png')}}" alt="filter" />
    </div>
    <h3> Yungurura </h3>
  </div>
  <div class="filter-categories" id="filter">
    <div class="upload-category">
      <h3>Umwaka </h3>
      <ul>


        @foreach($levels as $level)
          <li>
            <a href="{{route('book.filterWritten',$level->id)}}">Ibyo mu mwaka wa {{$level->name}}</a>
          </li>
          @endforeach
       
      </ul>
    </div>

  
   
  </div>
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



        <div class="kids">
          <h3 style>IBITABO BYOSE</h3>
          <div class="separator"></div>
          <div class="books">

           @foreach($books as $book)
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

<center>  <p>   {{ $books->links() }} </p> </center>

      </div>
    </div>
    <!-- end books section -->

    <!-- footer -->
  
 @include('partials.footer')
    

    <script src="{{asset('master/js/scroll.js')}}"></script>
    @include('sweetalert::alert')
   
   
  </body>
</html>
