<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layout.service')]
class Service extends Component
{
    public function render()
    {
        return view('livewire.service');
    }
}
