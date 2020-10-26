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
    public function render()
    {

        $bookType=BookType::where('name', 'Written')
        ->get();
        
     $bookType=$bookType->first()->id;
        return view('livewire.written-book',['books'=>Book::where('book_type_id', $bookType)->paginate(12)]);
    }
}
