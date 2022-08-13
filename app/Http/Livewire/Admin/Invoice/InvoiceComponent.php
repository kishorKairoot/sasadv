<?php

namespace App\Http\Livewire\Admin\Invoice;

use Livewire\Component;

class InvoiceComponent extends Component
{


    // public function invoiceDownload($invoiceId)
    // {
    //     dd($invoiceId);
    //     return auth()->user()->downloadInvoice($invoiceId, [
    //         'vendor' => 'Sasadv',
    //         'product' => 'Sasadv Subscription',
    //     ]);
    // }

    public function render()
    {
        $invoices = auth()->user()->invoices();

        return view('livewire.admin.invoice.invoice-component',compact('invoices'))->layout('livewire.admin.base.base');
    }
}
