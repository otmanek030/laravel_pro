<?php

namespace App\Livewire;


use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layout.open')]
class Open extends Component
{
    public function render()
    {
        return view('livewire.open');
    }
}
