<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Partner;


use Alert;

use App\Models\BookType;


class HomeController extends Controller
{
    function index(){
        $featuredBooks=Book::where('feautured',1)
        ->get();
        $partners=Partner::all();
       return view('home.index',['featuredBooks'=>$featuredBooks,'partners'=>$partners]);
    }


    function about(){
       
       
        return view('home.about');
    }


    

    function partner(){
        $partners=Partner::all();

        return view('home.partener',['partners'=>$partners]);
    }


   
}
