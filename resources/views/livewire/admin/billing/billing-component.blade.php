<div>

    @section('title', 'Billing')

    @push('styles')
        <style type="text/css">
            .radio label::before {
                visibility: hidden;
            }

            .radio label::after {
                /*visibility: hidden;*/
                border-radius: 0;
                top: 0;
                height: 100%;
            }
        </style>

    @endpush


    <!-- start page title -->
    <div class="page-title-alt-bg"></div>
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Account</a></li>
                <li class="breadcrumb-item active">Billing</li>
            </ol>
        </div>
        <h4 class="page-title">Billing</h4>
    </div> 
    <!-- end page title -->



    @if (session('alert'))
        <div class="container mx-auto max-w-3xl mt-8">
            @php $alert_type = session('alert_type'); @endphp
            <div class="
                        @if($alert_type == 'info') alert alert-primary
                        @elseif($alert_type == 'success') alert alert-success
                        @elseif($alert_type == 'error') alert alert-danger
                        @elseif($alert_type == 'warning') alert alert-warning
                        @endif p-4 rounded-lg" role="alert">
                <strong class="font-bold">{{ ucfirst(session('alert_type')) }}</strong>
                <p>{{ session('alert') }}</p>
            </div>
        </div>

    @endif



    <div class="col-lg-6 offset-lg-3 mt-3">

        <div class="card-box">

            @if (auth()->user()->subscribed('default'))

                <div class="alert alert-secondary alert-dismissible bg-secondary text-white border-0 fade show">
                    <div class="radio radio-info">
                        {{-- <label class="border p-2" style="cursor: pointer; width: 100%;"> --}}
                            <strong>You Are Subscribed To: </strong>
                            <strong>{{ ucfirst(auth()->user()->plan->name) }} Plan </strong>
                            <br>
                            {{ auth()->user()->plan->description }}
                        {{-- </label> --}}
                    </div>
                </div>

                <div class="alert alert-primary">
                    <div style="font-size: 1.2rem"><Strong>Thanks For Your Subscription.</Strong></div>
                    Your Default Payment Method Ends in <strong>*{{ auth()->user()->pm_last_four }}</strong>. 
                    To Update your Payment Method, Add a New Card Below:
                </div>
                {{-- <div class="alert alert-primary"> To Update your Payment Method, Add a New Card Below: </div> --}}

            @endif

            <div class="row">
                <div class="col-sm-6">
                    <h4 class="header-title">Billing Settings</h4>
                    <p class="sub-header">
                        Update Your Billing Info.
                    </p>
                </div>
                <div class="col-sm-6">
                    @if(auth()->user()->subscribed('default'))

                        <a href="#custom-modal" class="btn btn-primary float-right" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">Switch To Other Plan</a>

                    @endif      
                </div>
            </div>

            <!-- Custom Modal -->
            <div id="custom-modal" class="modal-demo" wire:ignore>
                <button type="button" class="close" onclick="Custombox.modal.close();">
                    <span>&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="custom-modal-title">Select Other Plan</h4>
                <div class="custom-modal-text">
                    <form action="{{ route('switch_plan') }}" id="switch-plan" class="parsley-examples" novalidate="">
                        @csrf

                        <div class="alert alert-secondary alert-dismissible bg-secondary text-white border-0 fade show">
                        
                            <h4 class="text-white">Select Your Plan</h4> {{-- {{ $checked }} --}}
                            <hr>
                            <div class="radio radio-info">
                                @if (auth()->user()->subscribed('default'))
                                    @include('livewire.admin.billing.plans')
                                @endif
                            </div>
                            
                        </div>

                        <div class="pb-3">
                            <button class="btn btn-primary waves-effect waves-light mr-1 float-right" type="submit">
                                Switch Plan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
                

            @include('livewire.admin.billing.trial_notification', ['sub_btn' => false])


            <form action="{{ route('payment_billing') }}" id="billing-form" class="parsley-examples" novalidate="">

                @csrf

                @if (!auth()->user()->subscribed('default'))
                    <div class="alert alert-secondary alert-dismissible bg-secondary text-white border-0 fade show">
                        
                        <h4 class="text-white">Select Your Plan</h4> {{-- {{ $checked }} --}}
                        <hr>
                        <div class="radio radio-info">
                        
                            @include('livewire.admin.billing.plans')

                        </div>
                        
                    </div>
                @endif

                <div class="form-group">
                    <label for="card-holder-name">Name on Card<span class="text-danger">*</span></label>
                    <input type="text" name="name" parsley-trigger="change" required="" placeholder="Name on Card" class="form-control" id="card-holder-name">
                </div>

                <div class="form-group">

                    <label for="card-element">Credit Card<span class="text-danger">*</span></label>
                    <div id="card-element" type="text" name="credit_card" parsley-trigger="change" required="" placeholder="Credit Card" class="form-control"></div>

                    <div id="card-errors" class=" mt-2" style="color:red;"></div>
                    {{-- <input type="text" name="credit_card" parsley-trigger="change" required="" placeholder="Credit Card" class="form-control" id="creditCard"> --}}
                </div>
                

                <div class="form-group text-right mb-0">
                    {{-- <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                        Submit
                    </button> --}}

                    <button id="card-button" data-secret="{{ auth()->user()->createSetupIntent()->client_secret }}" class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                        Update Payment Method
                    </button>
                    
                </div>

            </form>
        </div> <!-- end card-box -->
    </div>



    @push('scripts')
        <script src="https://js.stripe.com/v3/"></script>
     
        <script>
            const stripe = Stripe('{{ env("STRIPE_KEY") }}');
         
            const elements = stripe.elements();
            const cardElement = elements.create('card');
         
            cardElement.mount('#card-element');


            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;
            const cardError = document.getElementById('card-errors');

            cardElement.addEventListener('change', function(event) {
                if (event.error) {
                    cardError.textContent = event.error.message;
                } else {
                    cardError.textContent = '';
                }
            });

            var form = document.getElementById('billing-form');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const { setupIntent, error } = await stripe.handleCardSetup(
                    clientSecret, cardElement, {
                        payment_method_data: {
                            billing_details: { name: cardHolderName.value }
                        }
                    }
                );
                if (error) {
                    // Display "error.message" to the user...
                    cardError.textContent = error.message;
                } else {
                    // The card has been verified successfully...
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'payment_method');
                    hiddenInput.setAttribute('value', setupIntent.payment_method);
                    form.appendChild(hiddenInput);
                    // Submit the form
                    form.submit();
                }
            });

        </script>

    @endpush


</div>

