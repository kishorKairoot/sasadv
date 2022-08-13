<?php

namespace App\Http\Livewire\Pos\Home;

use Livewire\Component;

class PosIndexComponent extends Component
{
    public function render()
    {
        return view('livewire.pos.home.pos-index-component')->layout('livewire.pos.base.base');
    }
}
