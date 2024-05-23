<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function add()
    {
        $this->count++;
    }
    
    public function subtract()
    {
        $this->count--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
