@extends('Master.main')
@section('title')
    Shop Admin Profile
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
                                {{ __('Shop Admin Profile') }}
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
                                                <input type="text" name="business_name" 
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
                                                    <option value="">----- Select Area -----</option>
                                                    @foreach ($districts as $district)
                                                    <option value="{{ $district->name }}">{{ $district->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-2 col-sm-2 col-xs-2">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Address <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-10 col-sm-10 col-xs-10">
                                                <textarea type="text" name="address" required
                                                    class="form-control"></textarea>
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
                                    @foreach ($shop as $data)
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
                                        <ul style="font-size:25px; font-weight:bold;">
                                            Shop Name : 
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left">
                                        <ul style="font-size:25px; font-weight:bold;">
                                            {{ $data->business_name }}
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                        <li>
                                            Business Type :
                                        </li>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                        <ul>
                                            {{ $data->business_type }}
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                        <li>
                                            Admin Name :
                                        </li>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                        <ul>
                                            {{ Auth::user()->name }}
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                        <li>
                                            Mobile :
                                        </li>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                        <ul>
                                            {{ Auth::user()->mobile }}
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                        <li>
                                            Email :
                                        </li>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                        <ul>
                                            {{ Auth::user()->email }}
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                        <li>
                                            Area :
                                        </li>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                        <ul>
                                            {{ $data->area }}
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                        <li>
                                            Address :
                                        </li>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                        <ul>
                                            {{ $data->address }}
                                        </ul>
                                    </div>
                                    @endforeach
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
    document.forms['updateProfile'].elements['b_type'].value = '{{ $data->business_type }}';
    document.forms['updateProfile'].elements['area'].value = '{{ $data->area }}';
    document.forms['updateProfile'].elements['business_name'].value = '{{ $data->business_name }}';
    document.forms['updateProfile'].elements['address'].value = '{{ $data->address }}';
</script>
@endsection