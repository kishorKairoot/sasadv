@if (auth()->user()->onTrial())

    <div class="row alert alert-danger" role="alert">
        <div class="col-sm-9">
            <i class="dripicons-alarm"></i> 
            You are on Trial Period and Have <strong>{{ auth()->user()->trial_ends_at->diffInDays(now()) }}</strong> Days Left on Your Trial.
            <br>
            <strong>Subscribe to a Plan</strong>
        </div>
        <div class="col-sm-3">
            @if (isset($sub_btn))
                
            @else
                <a href="{{ route('admin_billing') }}" class="btn btn-success float-right">Subscribe Here</a>
            @endif
        </div>
    </div>

@endif