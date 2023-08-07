<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\Book;
use App\Models\Level;
use App\Models\BookType;

class AudioBooks extends Component
{


    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $query;
    public $queryBooks=[];
    public $levelID;

    public function mount($levelID)
   
    {
        $this->levelID = $levelID;
        $this->query = '';
        
    }

    public function levelName(){

        return Level::find($this->levelID)->name;
    }
  

    public function updatedQuery()
    {


        
    }
    public function render()
    {
        $bookType=BookType::where('name', 'Audio')
            ->get();
            
        $bookType=$bookType->first()->id;
        $books = Book::where('book_type_id', $bookType)
                            ->where('title', 'like', '%' . $this->query . '%')
                            ->where('level_id', $this->levelID)
                            ->paginate(12);
             
              
        return view('livewire.audio-books', ['books'=>$books,'levelName'=>$this->levelName()] );
    }
}
