<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use livewire\Component;

#[Layout('layout.sh')]
class shop extends Component
{
    public function render()
    {
        return view('livewire.shop');
    }
}
