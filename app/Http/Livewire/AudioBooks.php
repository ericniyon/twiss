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


    $bookType=BookType::where('name', 'Audio')
        ->get();
        
    $bookType=$bookType->first()->id;
    return   $this->books = Book::where('book_type_id', $bookType)
                        ->where('title', 'like', '%' . $this->query . '%')
                        ->where('level_id', $this->levelID)
                        ->paginate(12);
         
          

    }
    public function render()
    {
        return view('livewire.audio-books', ['books'=>$this->updatedQuery(),'levelName'=>$this->levelName()] );
    }
}
