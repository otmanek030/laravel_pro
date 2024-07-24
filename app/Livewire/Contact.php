<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layout.contact')]
class Contact extends Component
{
    public function render()
    {
        return view('livewire.contact');
    }
}
