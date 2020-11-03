

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('master/assets/images/l-276x252.png')}}" type="image/x-icon">
    <title>End book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body style="background:white">
    <!-- Modal -->
<div id="myModal" class="modal hide fade" role="dialog">
    <div  class="modal-dialog  modal-lg">
  
      <!-- Modal content-->
      <div  class="modal-content">
      
        <div style="background-image: url('https://giphy.com/gifs/l46CbKgZ1hvJjxfZS/html5');" class="modal-body">
       
  <div style="background:green" class="alert">  <center>  <h4>Urakoze gusoma.</h4> </center></div>
      
        
           
          <p><center> Urashaka  gukora isuzuma? </center></p>
  
  
        <center>  <a style="background:orange" href="{{route('quiz.takeBookQuiz',$bookID)}}" class="btn "> Yego  </a>  <a href="{{route('books.writtenBooks',$book->level->id)}}" style="border: 1px solid orange"class="btn "> Oya </a> </center>
         
         
        </div>
       
      </div>
  
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });

    $('#myModal').modal({backdrop: 'static', keyboard: false}) 
</script>
</body>
</html>




  