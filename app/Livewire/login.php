<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layout.login')]
class login extends Component
{
    public function render()
    {
        return view('livewire.login');
    }
}
