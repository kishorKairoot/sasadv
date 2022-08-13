<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard.dashboard-component')->layout('livewire.admin.base.base');
    }
}
