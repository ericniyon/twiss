<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PartnershipRequest;

class Partner extends Component
{
    public $name,$email,$interest,$tel;

    public function submit(){


        $validatedDate = $this->validate([

            'name' => 'required',
            'interest' => 'required',
            'email' => 'required|email',
            'tel' => 'required',
            
    
    
    
           
    
        ]);

        PartnershipRequest::create([
            'name' => $this->name,
            'email' => $this->email,
            'interest' => $this->interest,
            'tel' => $this->tel,
        ]);

        $this->resetForm();
        session()->flash('message', 'Murakoze! umwe mubakozi bacu araza kubavugisha .');
    }
    public function resetForm(){

        $this->name="";
        $this->email="";
        $this->interest="";
        $this->tel="";
    }
    public function render()
    {
        return view('livewire.partner');
    }
}
