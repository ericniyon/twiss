<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.2.0, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.2.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-105x33.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Home</title>
  <link rel="stylesheet" href="{{asset('master/assets/web/assets/mobirise-icons2/mobirise2.css')}}">
  <link rel="stylesheet" href="{{asset('master/assets/tether/tether.min.css')}}">
  <link rel="stylesheet" href="{{asset('master/assets/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('master/assets/bootstrap/css/bootstrap-grid.min.css')}}">
  <link rel="stylesheet" href="{{asset('master/assets/bootstrap/css/bootstrap-reboot.min.css')}}">
  <link rel="stylesheet" href="{{asset('master/assets/dropdown/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('master/assets/animatecss/animate.css')}}">
  <link rel="stylesheet" href="{{asset('master/assets/formstyler/jquery.formstyler.css')}}">
  <link rel="stylesheet" href="{{asset('master/assets/formstyler/jquery.formstyler.theme.css')}}">
  <link rel="stylesheet" href="{{asset('master/assets/datepicker/jquery.datetimepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('master/assets/socicon/css/styles.css')}}">
  <link rel="stylesheet" href="{{asset('master/assets/theme/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('master/assets/loading.css')}}">
  <link rel="preload" as="style" href="{{asset('master/assets/mobirise/css/mbr-additional.css')}}">
  <link rel="stylesheet" href="{{asset('master/assets/mobirise/css/mbr-additional.css')}}" type="text/css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="{{asset('master/assets/scroll_progress.css')}}" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  @yield('styles')
  <!-- Flip card css-->
  <style>


    .card-container {
        perspective: 700px;
    }
    
    .card-flip, .card-container {
        transform-style: preserve-3d;
        transition: all 0.7s ease;
    }
    
    .card-flip div {
        backface-visibility: hidden;
        transform-style: preserve-3d;
    }
    
    .back {
        transform: rotateY(-180deg);
    }
    
    .card-container:hover .card-flip {
        transform: rotateY(180deg);
    }
    .card-flip {
        display: grid; grid-template: 1fr / 1fr;
        grid-template-areas: "frontAndBack";
        transform-style: preserve-3d;
        transition: all 0.7s ease;
    }
    
    .front {
        grid-area: frontAndBack;
    }
    
    .back {
        grid-area: frontAndBack;
        transform: rotateY(-180deg);
    }
    .card-container {
        display: grid;
        perspective: 700px;
    }
        
    
            
              </style>

  <!-- end of flip card css -->

  @livewireStyles
</head>
<body>
  
  <section class="menu menu2 cid-sdKZeXi5yr" once="menu" id="menu2-0">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="/">
                        <img src="{{asset('master/assets/images/logo.jpg')}}" alt="Mobirise" style="height: 3rem;">
                    </a>
                </span>
                
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-black display-4" href="/">
                            Ahabanza</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">
                                    Ibitabo</a>
                                    <div class="dropdown-menu">
                                    <a class="text-black dropdown-item display-4"href="{{route('books.allWrittenBooks')}}">
                                           Ibitabo  by'imyaka yose</a>  
                                        @foreach($levels as $key => $level)
                                        <a class="text-black dropdown-item display-4"href="{{route('books.writtenBooks',$level->id)}}">
                                        Ibitabo byo mu mwaka wa {{$level->name}}</a>  
                                        @endforeach
                                       
                                           
        
        
                                            </div></li>


                                            <li class="nav-item dropdown">
                                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">
                                                    Ibitabo by'amajwi</a>
                                                    <div class="dropdown-menu">
                                                        <a class="text-black dropdown-item display-4"href="{{route('books.allAudioBooks')}}">
                                                            Ibitabo  by'imyaka yose</a>  
                                                        @foreach($levels as $key => $level)
                                                        <a class="text-black dropdown-item display-4"href="{{route('books.audioBooks',$level->id)}}">
                                                        Ibyo mu mwaka wa {{$level->name}}</a>  
                                                        @endforeach
                                                       
                                                           
                        
                        
                                                            </div></li>
                 
                    </li><li class="nav-item"><a class="nav-link link text-black display-4" href="/about">Abo turibo&nbsp;&nbsp;</a></li><li class="nav-item"><a class="nav-link link text-black display-4" href="{{route('partner')}}">Abafatanyabikorwa&nbsp;&nbsp;</a></li>
                
                 

                 </ul>
            </div>
        </div>
        <!-- scroll progress-->
        <div  class="progress-container">
            <div class="progress-bar" id="myBar"></div>
          </div>
          <!--end of  scroll progress-->
    </nav>
</section>
@yield('content')


<section class="footer4 cid-sdLbsVWK7i" once="footers" id="footer4-h">

    
    
    <div class="container">
        <div class="row mbr-white">
            <div class="col-6 col-lg-3">
                <div class="media-wrap col-md-8 col-12">
                    <a href="https://mobiri.se/">
                        <img src="{{asset('master/assets/images/l-276x252.png')}}" alt="Mobirise">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7">
                    <strong>Abo turibo</strong>
                </h5>
                <p class="mbr-text mbr-fonts-style mb-4 display-4">
                   <strong>TWIS</strong> ni company y'ikoranabuhanga itanga ibitabo byo gusoma ku banyeshuri bo mu mashuri abanza mu buryo bugezweho kandi mu rurimi rw'ikinyarwanda gusa.</p>
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-3 display-7">
                    <strong>Dukurikire</strong>
                </h5>
                <div class="social-row display-7">
                    <div class="soc-item">
                        <a href="https://www.facebook.com/twisomere.twis.5  " target="_blank">
                            <span class="mbr-iconfont socicon socicon-facebook"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://twitter.com/twisomere  " target="_blank">
                            <span class="mbr-iconfont socicon socicon-twitter"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://www.instagram.com/twisomere2020/" target="_blank">
                            <span class="mbr-iconfont socicon socicon-instagram"></span>
                        </a>
                    </div>
                   
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7">
                    <strong>Ubufasha</strong>
                </h5>
                <ul class="list mbr-fonts-style display-4">
                    <li class="mbr-text item-wrap">FAQ</li>
                    <li class="mbr-text item-wrap"><a class="mbr-text" href="#contactUs">Tuvugishe</a></li>
                 
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7">
                    <strong>Amapage</strong>
                </h5>
                <ul class="list mbr-fonts-style display-4">
                    <li class="mbr-text item-wrap"> <a class="mbr-text" href="/partner">Abafatanyabikorwa</a></li>
                    <li class="mbr-text item-wrap"><a class="mbr-text" href="/">Ahabanza</a></li>
                    
                </ul>
            </div>
            
        </div>
    </div>
</section><section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/b" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a><p style="flex: 0 0 auto; margin:0; padding-right:1rem;">Designed with Mobirise <a href="https://mobirise.site/j" style="color:#aaa;">web</a> software</p></section>

@include('sweetalert::alert')
<script src="{{asset('master/assets/web/assets/jquery/jquery.min.js')}}"></script> 
 <script src="{{asset('master/assets/popper/popper.min.js')}}"></script>  
 <script src="{{asset('master/assets/tether/tether.min.js')}}"></script>  
 <script src="{{asset('master/assets/bootstrap/js/bootstrap.min.js')}}"></script>  
 <script src="{{asset('master/assets/smoothscroll/smooth-scroll.js')}}"></script>  
 <script src="{{asset('master/assets/dropdown/js/nav-dropdown.js')}}"></script>  
 <script src="{{asset('master/assets/dropdown/js/navbar-dropdown.js')}}"></script>  
 <script src="{{asset('master/assets/touchswipe/jquery.touch-swipe.min.js')}}"></script>  
 <script src="{{asset('master/assets/viewportchecker/jquery.viewportchecker.js')}}"></script>  
 <script src="{{asset('master/assets/formstyler/jquery.formstyler.js')}}"></script>  
 <script src="{{asset('master/assets/formstyler/jquery.formstyler.min.js')}}"></script>  
 <script src="{{asset('master/assets/datepicker/jquery.datetimepicker.full.js')}}"></script>  
 <script src="{{asset('master/assets/theme/js/script.js')}}"></script>  
 <script src="{{asset('master/assets/formoid/formoid.min.js')}}"></script>  
 @yield('scripts')
  @livewireScripts


  <!--<script type="text/javascript">
  var l=false;
window.onbeforeunload = function() {
  if (!l) {
    return "you shouldn't leave";
  }
}
   </script>-->
  <!-- <script src="//code.tidio.co/ucbwx9wi19gghfi9srdodxrpimnbffjt.js" async></script> -->
  <input name="animation" type="hidden">
  </body>
</html>