<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz</title>
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{asset('master/assets/images/l-276x252.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('master/assets/loading.css')}}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>
    
<div style="margin-top:40px, margin-bottom:40px" class="section">
    <div class="container">

        <div class="row">
            
            <div class="col">

              <center>  <div class="alert">
                    <span class="navbar-logo">
                        <a href="https://mobiri.se">
                            <img src="{{asset('master/assets/images/logo.jpg')}}" alt="Mobirise" style="height: 3rem;">
                        </a>
                    </span>
                </div>

            </center> 
              <div class="alert">

                <h5>Izina ryibazwa: {{$book->title}}.</h5>
              </div>

            </div>
        </div>

    <div class="container">

        <div class="row">
            
            <div class="col">

            
                <livewire:quiz :bookID=$bookID />


            </div>
        </div>
    </div>
</div>



@livewireScripts 
</body>
</html>