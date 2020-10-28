<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Book;

use Livewire\Component;

class FeaturedBooks extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.featured-books',['featuredBooks'=>Book::where('feautured',1)->paginate(6)]);
    }
}
