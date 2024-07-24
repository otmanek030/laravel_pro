<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layout.aboutus')]
class Aboutus extends Component
{
    public function render()
    {
        return view('livewire.aboutus');
    }
}
