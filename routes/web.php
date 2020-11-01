<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\Home\HomeController::class, 'index'])->name('home');
Route::get('/partner', [App\Http\Controllers\Home\HomeController::class, 'partner'])->name('partner');
Route::get('/about',  [App\Http\Controllers\Home\HomeController::class, 'about'])->name('home.about');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect()->route('admin.index') ;
})->name('dashboard');



Route::group([ 'prefix' => 'admin','middleware' => ['web']], function ()  {
  
  
    
    Route::get('/', [App\Http\Controllers\admin\ManagersController::class, 'index'])->name('admin.index');
    Route::resource('books', App\Http\Controllers\admin\books\BookController::class);
    
    Route::resource('quizes', App\Http\Controllers\admin\quizes\QuizController::class);
    Route::resource('questions', App\Http\Controllers\admin\questions\QuestionController::class);
    //Route::resource('questions', 'Managers\questions\QuestionController');
    Route::resource('cartoons', 'Managers\cartoons\CartoonController');
    
    //Route::resource('quizes', 'Managers\quizes\QuizController');
    Route::delete('/destroyCartoonQuiz/{cartoon}', 'Managers\quizes\QuizController@destroyCartoonQuiz')->name('quizes.destroyCartoonQuiz');
    Route::resource('partners', App\Http\Controllers\admin\PartnerController::class);
    Route::resource('partnership-requests', App\Http\Controllers\admin\PartnershipRequestController::class);
    Route::resource('question-options', App\Http\Controllers\admin\QuestionOptionController::class);


   
    
});

//Route::resource('questionss', App\Http\Controllers\QuestionController::class);
//Route::resource('question-options', App\Http\Controllers\QuestionController::class);




Route::group([ 'prefix' => 'books'], function ()  {
  Route::get('/written-books/{levelID}',  [App\Http\Controllers\Books\BooksController::class ,'WrittenBooks'])->name('books.writtenBooks');
  Route::get('/audio-books/{levelID}',  [App\Http\Controllers\Books\BooksController::class ,'audioBooks'])->name('books.audioBooks');
  Route::get('/all-audio-books',  [App\Http\Controllers\Books\BooksController::class ,'allAudioBooks'])->name('books.allAudioBooks');
  Route::get('/all-written-books',  [App\Http\Controllers\Books\BooksController::class ,'allWrittenBooks'])->name('books.allWrittenBooks');
  Route::get('/read/{book}',  [App\Http\Controllers\Books\BooksController::class ,'readBook'])->name('book.readBook');
  Route::get('/listen/{bookId}',  [App\Http\Controllers\Books\BooksController::class ,'listenBook'])->name('book.listenBook');
  Route::get('/endReading/{bookID}', [App\Http\Controllers\Books\BooksController::class ,'endReading'] 
  )->name('endReading');
    
});



Route::group([ 'prefix' => 'quiz'], function ()  {
Route::get('/start/{bookID}', [App\Http\Controllers\Quizes\QuizController::class ,'takeBookQuiz'])->name('quiz.takeBookQuiz');
    
    
    
    
});  