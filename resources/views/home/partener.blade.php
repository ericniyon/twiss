<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{asset('master/css/about.css')}}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>TWIS</title>
  </head>
  <body>
    <div class="main">
 <header style="background:orange; " class="header">
        <a href="" class="logo">
          <img style="height:80px;width:200px" src="{{asset('master/images/logo.png')}}" alt="logo" />
        </a>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"
          ><span class="navicon"></span
        ></label>
        <ul class="menu">
          <li><a style="color:white; font-size:20px " href="/">Ahabanza</a></li>
         
          <li><a style="color:white; font-size:20px " href="/books/written-books">Ibitabo</a></li>
          <li><a style="color:white; font-size:20px "  href="/books/audio-books">Ibitabo by'amajwi</a></li>
         <!-- <li><a style="color:white" href="/cartoons">Cartoons</a></li>-->
         
       
           <li><a style="color:white; font-size:20px " href="/about">Abo turibo</a></li>
          <li><a style="color:white; font-size:20px " href="/partener">Abafatanyabikorwa</a></li>
         
        </ul>
      </header>
    </div>
    <!-- hero section -->
<div style="" class="container hero" >

<div class="col-lg-8 offset-2">
<div   class="alert  alert-primary">Uzuza form ube niba ushaka kuba umufatanyabikorwa.</div>

<div class="card" >

<div class="card-body">
<form method="post" action="{{route('home.storePartener')}}">
 @csrf
 <div class="form-group">
    <label for="exampleInputPassword1">Izina </label>
    <input type="text" class="form-control" name="name">
    <small id="emailHelp" class="form-text text-muted">Izina ry'íkigo cg izina ryawe.</small>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Imeli</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
    
  </div>



  <div class="form-group">
    <label for="exampleInputPassword1">Telefoni</label>
    <input type="text" class="form-control" name="tel">
  </div>


   <div class="form-group">
    <label for="exampleInputPassword1">Ubutumwa</label>
    

    <textarea type="text" class="form-control" name="interest"> </textarea>
    
  </div>


 
  <button type="submit" class="btn btn-primary">Ohereza</button>
</form>
</div>
</div>
</div>
</div>


 @include('partials.footer')
 <script src="js/scroll.js"></script>
   @include('sweetalert::alert')
  </body>
</html>