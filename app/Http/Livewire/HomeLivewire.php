<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomeLivewire extends Component
{
    public function render()
    {
        return view('livewire.home-livewire')
        ->extends('template')
        ->section('content');
    }
}
