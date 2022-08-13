<div>


    <!-- start page title -->
    <div class="page-title-alt-bg"></div>
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Sasadv</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
        <h4 class="page-title">Sasadv</h4>
    </div> 
    <!-- end page title -->

    @include('livewire.admin.billing.trial_notification')
    
    
    <div class="row">
        

        <div class="col-xl-3">
            <a href="{{ route('inventory_index') }}" target="_blank">
                <div class="card-box gradient-danger bx-shadow-lg pb-3 row">
                    <div class="col-sm-6">
                        <img style="height: 120px" src="{{ asset('assets/images/logos/inventory.jpg') }}">
                    </div>

                    <div class="col-sm-6">
                        <h4 class="header-title text-white">Inventory</h4>
                        {{-- <p class=" text-white">March 26 - April 01</p>
                        <div class="mb-3 mt-4">
                            <h2 class="font-weight-light  text-white">$3,558.48</h2>
                        </div> --}}
                    </div>
                </div> <!-- end card-box-->
            </a>
        </div>

        <div class="col-xl-3 ml-2">
            <a href="{{ route('pos_index') }}" target="_blank">
                <div class="card-box gradient-warning bx-shadow-lg pb-3 row">
                    <div class="col-sm-6">
                        <img style="height: 120px" src="{{ asset('assets/images/logos/pos.jpg') }}">
                    </div>

                    <div class="col-sm-6">
                        <h4 class="header-title text-white">Point of Sale</h4>
                        {{-- <p class=" text-white">March 26 - April 01</p>
                        <div class="mb-3 mt-4">
                            <h2 class="font-weight-light  text-white">$3,558.48</h2>
                        </div> --}}
                    </div>
                </div> <!-- end card-box-->
            </a>
        </div>

        <div class="col-xl-3 ml-2">
            <a href="{{ route('invoicing_index') }}" target="_blank">
                <div class="card-box gradient-primary bx-shadow-lg pb-3 row">
                    <div class="col-sm-6">
                        <img style="height: 120px" src="{{ asset('assets/images/logos/invoicing.jpg') }}">
                    </div>

                    <div class="col-sm-6">
                        <h4 class="header-title text-white">Invoicing</h4>
                        {{-- <p class=" text-white">March 26 - April 01</p>
                        <div class="mb-3 mt-4">
                            <h2 class="font-weight-light  text-white">$3,558.48</h2>
                        </div> --}}
                    </div>
                </div> <!-- end card-box-->
            </a>
        </div>

    </div>

</div>
