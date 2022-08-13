<?php

namespace App\Http\Livewire\Invoicing\Home;

use Livewire\Component;

class InvoicingIndexComponent extends Component
{
    public function render()
    {
        return view('livewire.invoicing.home.invoicing-index-component')->layout('livewire.invoicing.base.base');
    }
}
