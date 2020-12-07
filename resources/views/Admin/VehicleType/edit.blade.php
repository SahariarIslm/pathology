@extends('Master.main')
@section('title')
    Vehicle Type
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">              
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Vehicle Type Entry</h1>

                            <div class="container col-lg-4">
                                @if(session('success'))
                                <div class="alert alert-dismissible alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ session('success') }}</strong>
                                </div>      
                                @elseif(session('message'))
                                <div class="alert alert-dismissible alert-info">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ session('message') }}</strong>
                                </div>  
                                @elseif(session('danger'))
                                <div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ session('danger') }}</strong>
                                </div>      
                                @endif
                            </div>
                            
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="all-form-element-inner">
                                        <form action="{{ route('vehicle_category.update',$data->id) }}" method="POST" id="myForm">
                                            @csrf
                                            <div class="sparkline12-list col-md-12">
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Name:</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" value="{{ $data->name }}" name="name" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Details:</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <textarea type="text" name="details" rows="6" class="form-control">{{ $data->details }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="sparkline13-hd">
                                                    <div class="main-sparkline13-hd">
                                                        <button type="submit" name="Submit" class="btn btn-info col-sm-3 Primary" style="margin-left: 5px; float: right;">Save
                                                        </button>
                                                        <a class="btn btn-danger col-sm-3 Primary" style="margin-left: 5px; float: right;" href="{{ route('vehicle_category.index') }}" role="button">Go Back </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
@endsection