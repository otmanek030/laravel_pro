<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layout.signin')]

class signin extends Component
{
    public function render()
    {
        return view('livewire.signin');
    }
}
