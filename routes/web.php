<?php

use Illuminate\Support\Facades\Route;



use App\Http\Livewire\Home\HomeComponent;



//admin Classes
use App\Http\Livewire\Admin\Dashboard\DashboardComponent;
use App\Http\Livewire\Admin\Billing\BillingComponent;
use App\Http\Controllers\BillingController;
use App\Http\Livewire\Admin\Invoice\InvoiceComponent;


//Inventory Classes
use App\Http\Livewire\Inventory\Home\InventoryIndexComponent;

//POS Classes
use App\Http\Livewire\Pos\Home\PosIndexComponent;

//Invoicing Classes
use App\Http\Livewire\Invoicing\Home\InvoicingIndexComponent;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::domain('{subdomain}'.env('DOMAIN'))->group(function () {
    Route::get('/', [BillingController::class,'sub_check']);
    // Route::get('/inventory_index', InventoryIndexComponent::class)->name('inventory_index');
});

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', HomeComponent::class)->name('home');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // admin routes
    Route::get('/admin_billing', BillingComponent::class)->name('admin_billing');
    Route::get('/payment_billing', [BillingController::class, 'save_payment'])->name('payment_billing');

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'subscriber'
])->group(function () {
    Route::get('/dashboard', function () {
        // return view('dashboard');
        return redirect()->route('admin_dashboard');
    })->name('dashboard');

    // admin routes
    Route::get('/admin_dashboard', DashboardComponent::class)->name('admin_dashboard');
    Route::get('account/billing/switch_plan', [BillingController::class, 'switch_plan'])->name('switch_plan');
    Route::get('/admin_download_invoice/{invoiceId}', [BillingController::class, 'invoiceDownload'])->name('admin_download_invoice');
    Route::get('/admin_invoices', InvoiceComponent::class)->name('admin_invoices');

    // Inventory Routes
    Route::get('/inventory_index', InventoryIndexComponent::class)->name('inventory_index');

    // POS Routes
    Route::get('/pos_index', PosIndexComponent::class)->name('pos_index');

    // Invoicing Routes
    Route::get('/invoicing_index', InvoicingIndexComponent::class)->name('invoicing_index');

});
