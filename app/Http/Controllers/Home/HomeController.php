<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Book;

//use App\Message;
use Alert;
//use App\Partener;
use App\Models\BookType;


class HomeController extends Controller
{
    function index(){
        
        

        
        $featuredBooks=Book::where('feautured',1)
        ->get();


        
   


      
       
        return view('home.index',['featuredBooks'=>$featuredBooks,]);
    }


    function about(){
       
       
        return view('home.about');
    }


    function sendMessage(Request $request){
       
        $request->validate([
            'message' => 'required',
            'email'=>'required',
            'names'=>'required',
        ]);
        $message = new Message;

        $message->names=$request->names;
        $message->email=$request->email;
        $message->message=$request->message;
        $message->save();

       
        return redirect()->back()->with('success', "Murakoze ubutumwa bwanyu bwatugezeho!");
    }

    function partner(){


        return view('home.partener');
    }


    function storePartener(Request $request){

          $request->validate([

            'email'=>'required',
            'tel'=>'required',
            'interest'=>'required',
            'name'=>'required',
          ]);

          $partener = new partener;
          $partener->email=$request->email;
          $partener->name=$request->name;
          $partener->tel=$request->tel;
          $partener->interest=$request->interest;
          $partener->save();
        return redirect()->back()->with('success', "Murakoze ubusabe bwanyu bwagiye.");
    }
}
