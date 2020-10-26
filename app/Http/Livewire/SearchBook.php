<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\BookType;
use Livewire\WithPagination;

class SearchBook extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $query;
    public $books;


 

   public function mount()
   {
       $this->query = '';
    $this->contacts = [];
   }

  

    public function updatedQuery()
    {

       // $this->books = BookType::where('name', 'Written')
                        //->books->where('title', 'like', '%' . $this->query . '%') 
        $this->books = Book::where('title', 'like', '%' . $this->query . '%')
           ->get()
            ->toArray();

            $this->resetPage();
    }
    public function render()
    {
        return view('livewire.search-book', ['filterBooks'=>Book::where('title', 'like', '%' . $this->query . '%')->paginate(15)]);
    }
}
