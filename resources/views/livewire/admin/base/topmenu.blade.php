<!-- Topbar Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown notification-list">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle nav-link">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>

            


            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="assets/images/users/avatar-4.jpg" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        @if (auth()->user()->onTrial())
                            {{ auth()->user()->name }} ( Trial Period ) <i class="mdi mdi-chevron-down"></i>
                        @else
                            {{ auth()->user()->name }} ( {{ ucfirst(auth()->user()->plan->name) }} Plan ) <i class="mdi mdi-chevron-down"></i>
                        @endif
                        
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h6 class="m-0">
                            Welcome !
                        </h6>
                    </div>

                    <a href="{{ route('admin_billing') }}" class="dropdown-item notify-item">
                        <i class="dripicons-card"></i>
                        <span>Billing</span>
                    </a>

                    <a href="{{ route('admin_invoices') }}" class="dropdown-item notify-item">
                        <i class="dripicons-document"></i>
                        <span>Invoices</span>
                    </a>

                    <a href="{{ str_replace( 'http://','http://' . 'admin'. '.',url('/')) }}" class="dropdown-item notify-item" target="_blank">
                        <i class="dripicons-document"></i>
                        <span>subdomain</span>
                    </a>

                    <!-- item-->
                    {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="dripicons-user"></i>
                        <span>My Account</span>
                    </a>
                      --}}

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="dripicons-power"></i>
                        <span>Logout</span>
                    </a>
                    

                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>

                </div>
            </li>

            {{-- <li class="dropdown notification-list">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                    <i class="fe-settings noti-icon"></i>
                </a>
            </li> --}}

        </ul>

        <ul class="list-unstyled menu-left mb-0">
            <li class="float-left logo-box">
                <a href="index.html" class="logo">
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="22">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="24">
                    </span>
                </a>
            </li>

            
        </ul>
    </div>
</div>
<!-- end Topbar -->