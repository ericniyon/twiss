<?php


namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Level;
use App\Models\BookType;
use Illuminate\Support\Facades\Storage;
use Alert;





class BooksController extends Controller
{
    function writtenBooks(){
        $bookType=BookType::where('name', 'Written')
        ->get();
        
     $bookType=$bookType->first()->id;
    
      
    $books=Book::where('book_type_id', $bookType)->paginate(12);
        //$books= Book::paginate(15);
        $featuredBooks=Book::where('feautured',1)
                             ->where('book_type_id' , $bookType)
                           ->get();
       $levels=Level::all();
        


        return view('books.writtenBooks',['books'=>$books,'levels'=>$levels,'featuredBooks'=>$featuredBooks]);
    }


    function audioBooks(){

        
            $bookType=BookType::where('name', 'Audio')
            ->get();
            
         $bookType=$bookType->first()->id;
        
          
        $books=Book::where('book_type_id', $bookType)->paginate(12);
            //$books= Book::paginate(15);
            $featuredBooks=Book::where('feautured',1)
            ->where('book_type_id' , $bookType)
          ->get();
           $levels=Level::all();
            
    
    
            return view('books.audioBooks',['books'=>$books,'levels'=>$levels,'featuredBooks'=>$featuredBooks]);
    }


    function readBook($book){

        $book= Book::find($book);
        $url = Storage::url($book->content);

        return view('books.readBook',['book'=>$book,'url'=>$url]);
    }


    
    function listenBook($bookId){

        $book= Book::find($bookId);


        return view('books.listenBook',['book'=>$book]);
    }

    function filterWritten($id){

        $bookType=BookType::where('name', 'Written')
        ->get();
        
     $bookType=$bookType->first()->id;
        $level=Level::find($id);
        $level_id=$level->id;
        $bookNum=Book::where('level_id', $level_id)
        ->where('book_type_id', $bookType)
        
        ->count();
        if ($bookNum==0){

            return redirect()->back()->with("warning", "Mutwihanganire nta bitabo byo   mumwaka wa " . $level->name . " dufite aka kanya.");
        }


        
    
      
    $books=Book::where('book_type_id', $bookType)
                 ->where('level_id', $level_id)
    ->paginate(12);
      
        
        $levels=Level::all();
        return view('books.filterWritten',['level'=>$level,'levels'=>$levels,'books'=>$books]);
    }

    function filterAudio($id){
        $bookType=BookType::where('name', 'Audio')
        ->get();
        
     $bookType=$bookType->first()->id;
        $level=Level::find($id);
        $level_id=$level->id;
        $bookNum=Book::where('level_id', $level_id)
        ->where('book_type_id', $bookType)
        ->count();
        if ($bookNum==0){

            return redirect()->back()->with("warning", "Mutwihanganire nta bitabo byo   mumwaka wa " . $level->name . " dufite aka kanya.");
        }
        
        $books=Book::where('level_id', $level_id)
        ->where('book_type_id', $bookType)
        ->paginate(12);
        
        $levels=Level::all();
        return view('books.filterAudio',['level'=>$level,'levels'=>$levels,'books'=>$books]);
    }

    function endReading($bookID){

$bookID=$bookID;

return view('books.endReading', ['bookID'=>$bookID]);
    }
}
