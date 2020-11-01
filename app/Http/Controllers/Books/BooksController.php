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
    function writtenBooks($levelID){
       return view('books.writtenBooks',['levelID'=>$levelID]);
    }


    function allWrittenBooks(){
      return view('books.allWrittenBooks');
   }


    function audioBooks($levelID){
    return view('books.audioBooks',['levelID'=>$levelID]);
    }

    function allAudioBooks(){

      
      return view('books.allAudioBooks');
      }


    function readBook($book){

        $book= Book::find($book);
        

        return view('books.readBook',['book'=>$book]);
    }


    
    function listenBook($bookId){

        $book= Book::find($bookId);


        return view('books.listenBook',['book'=>$book]);
    }

   

    function endReading($bookID){

      $book=Book::find($bookID);


      if($book->quiz->questions->count()>0){
        
        return view('books.endReading', ['bookID'=>$bookID,'book'=>$book]);

}

else{
    
    return redirect()->route('books.writtenBooks',$book->level->id);
      }

    
    }
}
