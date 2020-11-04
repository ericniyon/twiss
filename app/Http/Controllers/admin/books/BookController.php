<?php

namespace App\Http\Controllers\admin\books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Level;
use App\Models\BookCategory;
use App\Models\BookType;

use App\Models\Quiz;


use Illuminate\Support\Facades\Storage;
Use Alert;
use Illuminate\Support\Facades\Validator;
class BookController extends Controller
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
        $books=Book::all();
        return view('admin.books.index',['books'=>$books]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels=Level::all();
        $bookTypes=BookType::all();
        $bookCats=BookCategory::all();
       
       
        return view('admin.books.create',['levels'=>$levels,'bookTypes'=>$bookTypes, 'bookCats'=>$bookCats]);
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
        //$request->validate([
            'author'=>'required',
            'title'=>'required|unique:books|max:255',
           
            'cover'=>'required|image',
            'level'=>'required',
            'bookCategory'=>'required',
            'bookType'=>'required',
            'featured'=>'required',
            'content' => 'required|mimes:pdf,mp3',
            
            
            'description'=>'required',
   
           ]);

           if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
             }


             $content = time().'.'.$request->content->extension();  

   

            
             $request->content->storeAs('books/contents',$content, 'public');

             $cover = time().'.'.$request->cover->extension();  

   

             $request->cover->storeAs('books/covers',$cover, 'public');

        
            $book= new Book;
           
           $book->title=$request->title;
           $book->author=$request->author;
           $book->description=$request->description;
           $book->level_id=$request->level;
           $book->feautured=$request->featured;
           $book->book_type_id=$request->bookType;
           $book->book_category_id=$request->bookCategory;
           $book->cover=$cover;
           $book->content=$content;
           $book->save();

           if($book){

            $quiz = new Quiz;
    
            $quiz->name=$book->title;
            $quiz->quizable_id=$book->id;
            $quiz->quizable_type="App\Models\Book";
            $quiz->save();
    
    
            }
         
   
           return redirect()->back()->with('toast_success', 'Book created Successfully!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book=Book::find($id);
        return view('admin.books.show',['book'=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=Book::find($id);
        $levels=Level::all();
        $bookTypes=BookType::all();
        $bookCats=BookCategory::all();
       
       
        return view('admin.books.edit',['levels'=>$levels,'bookTypes'=>$bookTypes, 'bookCats'=>$bookCats, 'book'=>$book]);

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
            'title'=>'required|max:255',
   
            'level'=>'required',
            'bookCategory'=>'required',
            'bookType'=>'required',
            
            
            'description'=>'required',
            'featured'=>'required'
   
           ]);
           if ($validator->fails()) {
               return redirect()->back()->withErrors($validator);
             }
          
   
             $book= Book::find($id);
             $content=$book->content;
             $cover=$book->cover;
   
   

           if($request->hasFile('content')){
   
               $content= $request->content->getClientOriginalName();
              
               $contentExist=Book::where('content', $content)->count();
               if($contentExist>0){

                return redirect()->back()->with('toast_warning', "We already have content with the same name please change the name");
               }
                
              
           $request->content->storeAs('books/contents',$content, 'public');

           }

          
   
   
           if($request->hasFile('cover')){
   
               $cover= $request->cover->getClientOriginalName();


               $coverExist=Book::where('cover', $cover)->count();
               if($coverExist>0){

                return redirect()->back()->with('warning', "We already have cover with the same name please change the name");
               }
               $request->cover->storeAs('books/covers',$cover, 'public'); 
           }

         

           
           $book->title=$request->title;
           $book->author=$request->author;
           $book->description=$request->description;
           $book->level_id=$request->level;
           $book->book_type_id=$request->bookType;
           $book->book_category_id=$request->bookCategory;
           $book->cover=$cover;
           $book->feautured=$request->featured;
           $book->content=$content;
           $book->save();
         
   
           return redirect()->route('books.index')->with('toast_success', 'Book edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        $book = Book::find($id);
        $book->delete();

      

        return redirect()->back()->with('toast_success', 'Book deleted!');
    }
}
