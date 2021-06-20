<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomepageComponent extends Component
{
    public function render()
    {
        return view('livewire.homepage-component')->layout('layouts.base');
    }
}
