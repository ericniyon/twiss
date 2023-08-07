<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Book;
use App\Models\Level;
use App\Models\BookType;

class AllAudioBooks extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $query;
    public $queryBooks=[];
    public $levelID;

    public function mount()
   
    {
      
        $this->query = '';
        
    }

   
  

    public function render()
    
    {
        $bookType=BookType::where('name', 'Audio')
            ->get();
            
        $bookType=$bookType->first()->id;
        $books = Book::where('book_type_id', $bookType)
                            ->where('title', 'like', '%' . $this->query . '%')
                           
                            ->paginate(12);
        return view('livewire.all-audio-books', ['books'=>$books]);
    }
}
