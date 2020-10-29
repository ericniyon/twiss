<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;

use App\Models\Book;
use App\Models\Level;
use App\Models\BookType;

use Livewire\Component;

class WrittenBook extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $query;
    public $queryBooks=[];
    
    public function mount()
    {
        $this->query = '';
     
    }

    public function updatedQuery()
    {


    $bookType=BookType::where('name', 'Written')
        ->get();
        
    $bookType=$bookType->first()->id;
    return   $this->books = Book::where('book_type_id', $bookType)
                        ->where('title', 'like', '%' . $this->query . '%')->paginate(12);
         
          

    }
    public function render()
    {

      

     return view('livewire.written-book',['books'=>$this->updatedQuery()]);
        //return view('livewire.written-book',['books'=>Book::where('book_type_id', $bookType)->paginate(12)]);
    }
}
