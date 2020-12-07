@extends('Master.main')
@section('title')
    Super Admin Profile
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
                                {{ __('Super Admin Profile') }}
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
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                        <li>
                                            Name :
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection