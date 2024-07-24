<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Request;

#[Layout('layout.product')]
class Product extends Component
{
    public function creat()
    {
        return view('livewire.product');
    }

}
