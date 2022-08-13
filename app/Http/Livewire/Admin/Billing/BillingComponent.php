<?php

namespace App\Http\Livewire\Admin\Billing;

use Livewire\Component;

use App\Models\Plan;

class BillingComponent extends Component
{

    
    public $selectOtherPlan = 0;

    public function changeSelectOtherPlan()
    {
        if ($this->selectOtherPlan == 0) {
            $this->selectOtherPlan = 1;
        } elseif ($this->selectOtherPlan == 1) {
            $this->selectOtherPlan = 0;
        }
        
    }

    public function render()
    {
        $all_plans = Plan::all();
        return view('livewire.admin.billing.billing-component',compact('all_plans'))->layout('livewire.admin.base.base');
    }
}
