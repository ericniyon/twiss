<?php

namespace App\Http\Controllers\admin;

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
//use App\Http\Controllers\Redirect;


class ManagersController extends Controller
{


    public function __construct()
{
    $this->middleware('auth');
}

    function index(){

        
         $books=Book::all()->count();
       
         $quizes=Quiz::all()->count();

        return view('admin.index',['books'=>$books, 'quizes'=>$quizes]);
    }


    function addBook(){

        $levels=Level::all();
        $bookTypes=BookType::all();
        $bookCats=BookCategory::all();
       
       
        return view('managers.books.addBook',['levels'=>$levels,'bookTypes'=>$bookTypes, 'bookCats'=>$bookCats]);
    }


    function storeBook(Request $request){

        $validator = Validator::make($request->all(),[
         'author'=>'required',
         'title'=>'required',

         'level'=>'required',
         'bookCategory'=>'required',
         'bookType'=>'required',
         'cover'=>'required|unique:books',
         'content'=>'required|unique:books',
         'description'=>'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
          }
       



        if($request->hasFile('content')){

            $content= $request->content->getClientOriginalName();
            $request->content->storeAs('books/contents',$content, 'public');
        }


        if($request->hasFile('cover')){

            $cover= $request->cover->getClientOriginalName();
            $request->content->storeAs('books/covers',$cover, 'public');
        }


        $book= new Book;
        $book->title=$request->title;
        $book->author=$request->author;
        $book->description=$request->description;
        $book->level_id=$request->level;
        $book->book_type_id=$request->bookType;
        $book->book_category_id=$request->bookCategory;
        $book->cover=$cover;
        $book->content=$content;
        $book->save();
        if($book){

        $quiz = new Quiz;

        $quiz->name=$book->title;
        $quiz->quizable_id=$book->id;
        $quiz->quizable_type="App\Book";
        $quiz->save();


        }

        return redirect()->back()->with('success', 'Book Created Successfully!');
    }



    




    function addCartoon(){

        $levels=Level::all();
        $cartoonTypes=CartoonType::all();
        $cartoonCats=CartoonCategory::all();
       
       
        return view('managers.cartoons.addCartoon',['levels'=>$levels,'cartoonTypes'=>$cartoonTypes, 'cartoonCats'=>$cartoonCats]);
    }


    function storeCartoon(Request $request){


       

      $validator = Validator::make($request->all(),[
      'author'=>'required',
      'title'=>'required',

      'level'=>'required',
      'cartoonCategory'=>'required',
      'cartoonType'=>'required',
      'cover'=>'required',
       'content'=>'required',
       'description'=>'required',

       ]);
       if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
      }
       


        
        if($request->hasFile('content')){

            $content= $request->content->getClientOriginalName();
            $request->content->storeAs('cartoons/contents',$content, 'public');
        }


        if($request->hasFile('cover')){

            $cover= $request->cover->getClientOriginalName();
            $request->cover->storeAs('cartoons/covers',$cover, 'public');
        }


       $cartoon= new Cartoon;
       $cartoon->title=$request->title;
       $cartoon->author=$request->author;
        $cartoon->description=$request->description;
        $cartoon->level_id=$request->level;
        $cartoon->cartoon_type_id=$request->cartoonType;
      $cartoon->cartoon_category_id=$request->cartoonCategory;
      $cartoon->cover=$cover;
    $cartoon->content=$content;
      $cartoon->save();


      return redirect()->back()->with('success', 'cartoon Successfully!');
    }
}
