@extends('Master.main')
@section('title')
    Shop Profile
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                {{ __('Shop Profile') }}
                            </h1>
                            <button type="button" style="float:right;" data-toggle="modal" 
                                class="btn btn-danger col-lg-2 col-md-2 col-sm-4 col-xs-6 Primary" 
                                data-target="#DangerModalhdbgcl">Update Profile
                            </button>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                @if(session('status'))
                                    <div class="text-center alert alert-dismissible alert-success">
                                        <button type="button" class="close" data-dismiss="alert" 
                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>{{ session('status') }}</strong>
                                    </div>      
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div id="DangerModalhdbgcl" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <form action="{{ route('profile.update') }}" method="POST" name="updateProfile">
                                @csrf
                                <div class="modal-close-area modal-close-df">
                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                </div>
                                <div class="modal-header header-color-modal bg-color-4">
                                    <h4 class="modal-title">Update Profile</h4>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-2 col-sm-2 col-xs-2">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Name <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-10 col-xs-10">
                                                <input type="text" name="name" value="{{ Auth::user()->name }}" 
                                                    class="form-control" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-2 col-sm-2 col-xs-2">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Business Name <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-10 col-xs-10">
                                                <input type="text" name="business_name" value="{{ Auth::user()->business_name }}" 
                                                    class="form-control" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-2 col-sm-2 col-xs-2">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Business Type <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-10 col-xs-10">
                                                <select name="b_type" class="form-control b_type" required>
                                                    <option value="Computer Shop">Computer Shop</option>
                                                    <option value="Book Shop">Book Shop</option>
                                                    <option value="Dealership">Dealership</option>
                                                    <option value="E-commerce">E-commerce</option>
                                                    <option value="Fashion House">Fashion House</option>
                                                    <option value="Grocery Shop">Grocery Shop</option>
                                                    <option value="Mobile Shop">Mobile Shop</option>
                                                    <option value="Rod, Cement, Slickon">Rod, Cement, Slickon</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-2 col-sm-2 col-xs-2">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Area <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-10 col-xs-10">
                                                <select name="area" class="form-control area" required>
                                                    <option value="Dhaka">Dhaka</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="notification-bt modal-footer footer-modal-admin">
                                    <button class="btn btn-warning btn -xs" type="button"
                                        data-dismiss="modal">Close</button>
                                    <button class="btn btn-success btn -xs" type="submit"
                                        onclick="return confirm('Are You Sure You Want To Update Profile ??')">Submit
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="single-product-tab-area mg-t-15 mg-b-30">
                        <div class="container-fluid text-center">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="single-product-details res-pro-tb">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 text-right" 
                                            style="padding:0px; margin:0px;">
                                        <ul style="font-size:20px; font-weight:bold;">
                                            Shop Name : 
                                        </ul>
                                        <li>
                                            Business Type :
                                        </li>
                                        <li>
                                            Name :
                                        </li>
                                        <li>
                                            Mobile :
                                        </li>
                                        <li>
                                            Email :
                                        </li>
                                        <li>
                                            Area :
                                        </li>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 text-left" 
                                            style="padding:0px; margin:0px;">
                                        <ul style="font-size:20px; font-weight:bold;">
                                            {{ Auth::user()->business_name }}
                                        </ul>
                                        <ul>
                                            {{ Auth::user()->b_type }}
                                        </ul>
                                        <ul>
                                            {{ Auth::user()->name }}
                                        </ul>
                                        <ul>
                                            {{ Auth::user()->mobile }}
                                        </ul>
                                        <ul>
                                            {{ Auth::user()->email }}
                                        </ul>
                                        <ul>
                                            {{ Auth::user()->area }}
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-2 col-xs-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.forms['updateProfile'].elements['b_type'].value = '{{ Auth::user()->b_type }}';
    document.forms['updateProfile'].elements['area'].value = '{{ Auth::user()->area }}';
</script>
@endsection