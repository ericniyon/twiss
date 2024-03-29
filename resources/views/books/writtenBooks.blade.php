@extends('layouts.master')

@section('title')
Book
@endsection
@section('styles')
<!-- for search filed-->
<style>


  #myInput {
   
    background-position: 10px 12px; 
background-repeat: no-repeat; 
      /* width: 100%; */
    font-size: 16px; 
    padding: 12px 20px 12px 40px; 
    border: 1px solid #ddd; 
    margin-bottom: 12px; 
  }
  
  input[type=text] {
width: 100%;
-webkit-transition: width 0.4s ease-in-out;
transition: width 0.4s ease-in-out;
}

/* When the input field gets focus, change its width to 100% */
input[type=text]:focus {
width: 100%;
}
  #myUL {
    /* Remove default list styling */
    list-style-type: none;
    padding: 0;
    margin: 0;
  }
  
  #myUL li a {
    border: 1px solid #ddd; /* Add a border to all links */
    margin-top: -1px; /* Prevent double borders */
    background-color: #f6f6f6; /* Grey background color */
    padding: 12px; /* Add some padding */
    text-decoration: none; /* Remove default text underline */
    font-size: 18px; /* Increase the font-size */
    color: black; /* Add a black text color */
    display: block; /* Make it into a block element to fill the whole list */
  }
  
  #myUL li a:hover:not(.header) {
    background-color: #eee; /* Add a hover effect to all links, except for headers */
  }
  
  </style>

  

  




@endsection

@section( 'content')








  

<section style="background: white" class="gallery2 cid-sdMVhqtUCf" id="gallery2-1i">
 
  <livewire:written-book :levelID=$levelID />
  
   
</section>


@endsection