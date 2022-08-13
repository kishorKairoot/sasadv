<div>

    @section('title', 'Invoices')

    


    <!-- start page title -->
    <div class="page-title-alt-bg"></div>
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Account</a></li>
                <li class="breadcrumb-item active">Invoices</li>
            </ol>
        </div>
        <h4 class="page-title">Invoices</h4>
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

            

            <div class="row">
                <div class="col-sm-6">
                    <h4 class="header-title">Invoices</h4>
                    <p class="sub-header">
                        All Your Invoices are Here.
                    </p>
                </div>
            </div>
                

            <table class="table table-bordered mb-0">
                <thead>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                            <td>{{ $invoice->total() }}</td>
                            <td><a href="{{ route('admin_download_invoice', $invoice->id) }}" class="btn btn-primary text-white">Download</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div> <!-- end card-box -->
    </div>






</div>

