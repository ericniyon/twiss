<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="content-type">

        <title>Quiz</title>

        <link href="{{asset('q/css/reset.css')}}" media="screen" rel="stylesheet" type="text/css">
        <link href="{{asset('q/css/slickQuiz.css')}}" media="screen" rel="stylesheet" type="text/css">
        <link href="{{asset('q/css/master.css')}}" media="screen" rel="stylesheet" type="text/css">
    </head>

    <body id="slickQuiz">
        <h1 class="quizName"><!-- where the quiz name goes --></h1>

        <div class="quizArea">
            <div class="quizHeader">
                <!-- where the quiz main copy goes -->

                <a class="button startQuiz" href="#">Tangira!</a>
            </div>

            <!-- where the quiz gets built -->
        </div>

        <div class="quizResults">
            <h3 class="quizScore">Amanota: <span><!-- where the quiz score goes --></span></h3>

            <h3 class="quizLevel"><strong>Inama:</strong> <span><!-- where the quiz ranking level goes --></span></h3>

            <div class="quizResultsCopy">
                <!-- where the quiz result copy goes -->
            </div>
        </div>

        <script src="{{asset('q/js/jquery.js')}}"></script>
        
        <script src="{{asset('q/js/slickQuiz.js')}}"></script>
        <script src="{{asset('q/js/master.js')}}"></script>


        <script>
// Setup your quiz text and questions here

// NOTE: pay attention to commas, IE struggles with those bad boys

var quizJSON = {
    "info": {
        "name":    "Reba niba wabyumvise!!",
        "main":    "",
        "results": "<p> <a class='button' href='{{route('quiz.takeCartoonQuiz',$cartoonID)}}'>Kanda hano  subiramo niba ubishaka</a></p>",
        "level1":  " Uri umuhanga cyane Narimbizi ko uri bubone amanota menshi ......",
        "level2":  "Wagerageje ariko ongera usubiremo...",
        "level3":  "Wagerageje ariko ongera usubiremo...",
        "level4":  "Wagerageje ariko ongera usubiremo...",
        "level5":  "Wagerageje ariko ongera usubiremo..." // no comma here
    },


    "questions": [

  @foreach($q as $q)
        { // Question 1 - Multiple Choice, Single True Answer
            "q":  "{{$q->question_text}}?",


            "a": [


                 @foreach ($q->question_options as $op)
                {"option": "{{$op->option}}",
                 


                
                @if($op->correct==1)
                "correct": true,
                @else
                 "correct": false,
                @endif
                
                },
              

                  @endforeach    
            ],




            "correct": "<p><span>Wooow uragikoze!</span> Komereza aho !</p>",
            "incorrect": "<p><span>Uhh ntago aricyo !</span> Ariko ndabizi igikurikiyeho uragikora!</p>" // no comma here
        },
       
   @endforeach    
         
       
       
 
   
       
    ]
};



        </script>
    </body>
</html>
