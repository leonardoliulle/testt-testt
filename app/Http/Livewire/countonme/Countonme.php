<?php

namespace App\Http\Livewire\Countonme;

use Livewire\Component;

class Countonme extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function render()
    {
        return view('livewire.countonme.countonme');
    }
}
