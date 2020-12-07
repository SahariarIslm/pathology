<div class="header-advance-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-top-wraper">
                    <div class="row">
                        <div class="col-lg-0 col-md-0 col-sm-1 col-xs-12">
                            <div class="menu-switcher-pro">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                    <i class="fa fa-bars"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 text-left">
                            <div class="header-top-menu tabl-d-n">
                                <ul class="nav navbar-nav mai-top-nav">
                                    {{--  <li class="nav-item"><a href="{{ route('frontend') }}" class="nav-link">Home</a>
                                    </li>
                                    <li class="nav-item"><a href="#" class="nav-link">About</a>
                                    </li>
                                    <li class="nav-item"><a href="#" class="nav-link">Services</a>
                                    </li>  --}}
                                    @can('admin')
                                    <li class="nav-item">
                                        <?php
                                            $mess   = DB::table('messages')->first();
                                            $msg    = $mess->message;
                                            $dada   = DB::table('shop_payments')
                                                        ->where('shop', Auth::user()->id)
                                                        ->where('status', 1)
                                                        ->first();
                                            $dat    = $dada->date;
                                            $da     = $dada->days;
                                            $exdat  = date('Y-m-d', strtotime($dat. ' + '. $da .'days'));
                                        ?>
                                        <a style="font-size: 16px;">
                                            <marquee behavior="scroll" direction="left" scrollamount="5"> 
                                                <span>{{ $msg }}</span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                Please Update Your Shop Package to Enjoy Dokan POS Before : 
                                                <span style="font-weight:bolder;">{{ $exdat }}.</span>
                                            </marquee>
                                        </a>
                                    </li>
                                    @endcan
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                            <div class="header-right-info">
                                <ul class="nav navbar-nav mai-top-nav header-right-menu ">
                                    
                                    <li class="nav-item">
                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                            <i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>
                                            <span class="admin-name">{{ Auth::user()->name }}</span>
                                            <i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
                                        </a>
                                        <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                            <li>
                                                @can('superAdmin')
                                                <a class="dropdown-item" href="{{ route('profile') }}">
                                                    <i class="fa fa-home author-log-ic"></i> {{ __('Profile') }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('employee.change.password') }}">
                                                    <i class="fa fa-lock author-log-ic"></i>&nbsp; {{ __('Change Password') }}
                                                </a>
                                                @endcan
                                                
                                                @can('admin')
                                                <a class="dropdown-item" href="{{ route('profile') }}">
                                                    <i class="fa fa-home author-log-ic"></i>{{ __('Shop Admin Profile') }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('ticket.index') }}">
                                                    <i class="fa fa-ticket author-log-ic"></i>{{ __('Open Ticket') }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('testimonial.index') }}">
                                                    <i class="fa fa-comment author-log-ic"></i>{{ __('Testimonial') }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('shop.payment.lindex') }}">
                                                    <i class="fa fa-money author-log-ic"></i>{{ __('Shop Payment') }}
                                                </a>
                                                <a class="dropdown-item" target="_blank"
                                                href="https://www.youtube.com/watch?v=Al-LlCr0F5c&list=PL4H9-n8Z_rjJsb-EoDAe0xddvdQkF5s3A">
                                                    <i class="fa fa-youtube-play author-log-ic"></i> 
                                                    {{ __('Tutorial') }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('employee.change.password') }}">
                                                    <i class="fa fa-lock author-log-ic"></i>&nbsp; {{ __('Change Password') }}
                                                </a>
                                                @endcan
                                                
                                                @can('manager')
                                                <a class="dropdown-item" href="{{ route('profile') }}">
                                                    <i class="fa fa-user-secret author-log-ic"></i>{{ __('Employee Profile') }}
                                                </a>
                                                @endcan
                                                
                                                @can('salesMan')
                                                <a class="dropdown-item" href="{{ route('profile') }}">
                                                    <i class="fa fa-user-secret author-log-ic"></i>{{ __('Employee Profile') }}
                                                </a>
                                                @endcan
                                                
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <span class="fa fa-sign-out author-log-ic"></span> {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    