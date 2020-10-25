<?php
namespace App\Http\Controllers\Managers\cartoons;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\Cartoon;
use App\Level;
use App\Question;
use App\Quiz;
use App\CartoonType;
use App\CartoonCategory;
use App\QuestionOption;
use Illuminate\Support\Facades\Storage;
Use Alert;
use Illuminate\Support\Facades\Validator;

class CartoonController extends Controller
{


    public function __construct()
{
    $this->middleware('auth');
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartoons=Cartoon::all();

        return view('managers.cartoons.index',['cartoons'=>$cartoons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels=Level::all();
        $cartoonTypes=CartoonType::all();
        $cartoonCats=CartoonCategory::all();
       
       
        return view('managers.cartoons.create',['levels'=>$levels,'cartoonTypes'=>$cartoonTypes, 'cartoonCats'=>$cartoonCats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'author'=>'required',
            'title'=>'required|unique:cartoons|unique:books',
      
            'level'=>'required',
            'cartoonCategory'=>'required',
            'cartoonType'=>'required',
            'cover'=>'required|image',
         'content'=>'required|mimes:mp4',
             'description'=>'required',
      
             ]);
             if ($validator->fails()) {
              return redirect()->back()->withErrors($validator);
            }
             
      
      
              
              if($request->hasFile('content')){
      
                  $content= $request->content->getClientOriginalName();
                 
                  $contentExist=Cartoon::where('content', $content)->count();
               if($contentExist>0){

                return redirect()->back()->with('warning', "We already have content with the same name please change the name");

               }

               $request->content->storeAs('cartoons/contents',$content, 'public');
              }
      
      
              if($request->hasFile('cover')){
      
                  $cover= $request->cover->getClientOriginalName();
                  $coverExist=Cartoon::where('cover', $cover)->count();
                  if($coverExist>0){

                    return redirect()->back()->with('warning', "We already have cover with the same name please change the name");
                   }
                  $request->cover->storeAs('cartoons/covers',$cover, 'public');
              }
      
      
             $cartoon= new Cartoon;
             $cartoon->title=$request->title;
             $cartoon->feautured=$request->featured;
             $cartoon->author=$request->author;
              $cartoon->description=$request->description;
              $cartoon->level_id=$request->level;
            $cartoon->cartoon_type_id=$request->cartoonType;
            $cartoon->cartoon_category_id=$request->cartoonCategory;
            $cartoon->cover=$cover;
            $cartoon->content=$content;
            $cartoon->save();
      

            if($cartoon){

                $quiz = new Quiz;
        
                $quiz->name=$cartoon->title;
                $quiz->quizable_id=$cartoon->id;
                $quiz->quizable_type="App\Cartoon";
                $quiz->save();
        
        
                }
             
      
            return redirect()->back()->with('success', 'cartoon Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cartoon=Cartoon::find($id);
        $levels=Level::all();
        $cartoonTypes=CartoonType::all();
        $cartoonCats=CartoonCategory::all();

        return view("managers.cartoons.edit",['cartoon'=>$cartoon,'levels'=>$levels, 'cartoonTypes'=>$cartoonTypes,'cartoonCats'=>$cartoonCats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'author'=>'required',
            'title'=>'required|unique:cartoons|unique:books',
      
            'level'=>'required',
            'cartoonCategory'=>'required',
            'cartoonType'=>'required',
          
             'description'=>'required',
      
             ]);
             if ($validator->fails()) {
              return redirect()->back()->withErrors($validator);
            }
             
      
      

            $cartoon=Cartoon::find($id);  
            $content=$cartoon->content;  
            $cover=$cartoon->cover; 

            if($request->content!=""){
              
              if($request->hasFile('content')){
                  
                $request->validate([
                    'content'=>'mimes:mp4'
                ]);
                  $content= $request->content->getClientOriginalName();
                 
                  $contentExist=Cartoon::where('content', $content)->count();
               if($contentExist>0){

                return redirect()->back()->with('warning', "We already have content with the same name please change the name");

               }


              }



              



               $request->content->storeAs('cartoons/contents',$content, 'public');
              }
      
      
              if($request->cover!=""){
              if($request->hasFile('cover')){
                $request->validate([
                    'content'=>'image'
                ]);
                  $cover= $request->cover->getClientOriginalName();
                  $coverExist=Cartoon::where('cover', $cover)->count();
                  if($coverExist>0){

                    return redirect()->back()->with('warning', "We already have cover with the same name please change the name");
                   }
                  $request->cover->storeAs('cartoons/covers',$cover, 'public');
              }
      
            }
      
             
             $cartoon->title=$request->title;
             $cartoon->feautured=$request->featured;
             $cartoon->author=$request->author;
              $cartoon->description=$request->description;
              $cartoon->level_id=$request->level;
            $cartoon->cartoon_type_id=$request->cartoonType;
            $cartoon->cartoon_category_id=$request->cartoonCategory;
            $cartoon->cover=$cover;
            $cartoon->content=$content;
            $cartoon->save();
      

            if($cartoon){

                $quiz = new Quiz;
        
                $quiz->name=$cartoon->title;
                $quiz->quizable_id=$cartoon->id;
                $quiz->quizable_type="App\Cartoon";
                $quiz->save();
        
        
                }
             
      
            return redirect()->back()->with('success', 'cartoon Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cartoon=Cartoon::find($id);

        $cartoon->delete();

        return redirect()->back()->with('success', 'cartoon Successfully deleted!');
    }
}
