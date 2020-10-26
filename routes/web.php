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

   
    
});





Route::group([ 'prefix' => 'books'], function ()  {
  
  
    Route::get('/written-books',  [App\Http\Controllers\Books\BooksController::class ,'WrittenBooks'])->name('books.writtenBooks');

    Route::get('/audio-books',  [App\Http\Controllers\Books\BooksController::class ,'audioBooks'])->name('book.audioBooks');
    Route::get('/read/{book}',  [App\Http\Controllers\Books\BooksController::class ,'readBook'])->name('book.readBook');
    Route::get('/listen/{bookId}',  [App\Http\Controllers\Books\BooksController::class ,'listenBook'])->name('book.listenBook');
    Route::get('/written-books/level/{level}', [App\Http\Controllers\Books\BooksController::class ,'filterWritten'])->name('book.filterWritten');
   // Route::get('/audio-books/level/{level}', [App\Http\Controllers\Books\BooksController::class ,'filterWritten'] 'Books\BooksController@filterWritten')->name('book.filterAudio');
    
   Route::get('/endReading/{bookID}', [App\Http\Controllers\Books\BooksController::class ,'endReading'] 
  
   
   
   )->name('endReading');
    
});



Route::group([ 'prefix' => 'quiz'], function ()  {
  
  
    //Route::get('/start', 'Quizes\QuizController@index')->name('quiz.index');

    Route::get('/start/{bookID}', [App\Http\Controllers\Quizes\QuizController::class ,'takeBookQuiz'])->name('quiz.takeBookQuiz');
    
    //Route::get('/test', 'Quizes\QuizController@test')->name('quiz.test');

    Route::post('/start/start/{bookID}', [App\Http\Controllers\Quizes\QuizController::class ,'nextQuestion'])->name('quiz.nextQuestion');
    
    
});  