<!DOCTYPE html>
<html>
<head>
  <title>jQuery Quiz</title>
  <link rel="stylesheet" type="text/css" href="{{asset('master/quiz/jquery.quiz-min.css')}}" />
</head>
<body>
<div id="quiz">
  <div id="quiz-header">
    <h1>Basic Quiz Demo</h1>
    <p><a id="quiz-home-btn">Home</a></p>
  </div>
  <div id="quiz-start-screen">
    <p><a href="#" id="quiz-start-btn" class="quiz-button">Start</a></p>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="{{asset('quiz/jquery.quiz-min.js')}}"></script>
<script>
  $('#quiz').quiz({
    //resultsScreen: '#results-screen',
    //counter: false,
    //homeButton: '#custom-home',
    counterFormat: 'Question %current of %total',
    questions: [
      
      
      

     @foreach($q as $q)

      {
        'q': '{{$q->question_text}}?',
       







        'options': [
 @foreach ($q->question_options as $op)

          '{{ $op->option}}',
   @endforeach     
        ],
      
        
    

          'correctIndex': 0,
        'correctResponse': 'Custom correct response.',
        'incorrectResponse': 'Custom incorrect response.'
      },
       
      @endforeach





 
 
 
 
    
    


    
    
    ]
  });
</script>
</body>
</html>