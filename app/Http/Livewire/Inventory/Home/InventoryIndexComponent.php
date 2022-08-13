<?php

namespace App\Http\Livewire\Inventory\Home;

use Livewire\Component;

class InventoryIndexComponent extends Component
{
    public function render()
    {
        return view('livewire.inventory.home.inventory-index-component')->layout('livewire.inventory.base.base');
    }
}
