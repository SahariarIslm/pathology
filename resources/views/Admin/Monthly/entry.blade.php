@extends('Master.main')
@section('title')
    Hourly Vehicle Entry
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">              
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Monthly Vehicle Entry</h1>
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
                                        <form action="{{ route('monthly_entry.store') }}" method="POST" id="myForm">
                                            @csrf
                                            <div class="sparkline12-list col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                        <label class="login2">Vehicle Number:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <input type="text" id="vehicle_number" name="vehicle_number" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                        <label class="login2">Name:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <input type="text" id="name" name="name" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                        <label class="login2">Vehicle Type:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <div class="form-select-list">
                                                                            <select class="form-control custom-select-value" id="vehicle_category_id" name="vehicle_category_id">
                                                                                <option>Select Vehicle</option>
                                                                                @foreach($vehicleCategories as $vehicleCategory)
                                                                                    <option value="{{ $vehicleCategory->id }}">{{ $vehicleCategory->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                        <label class="login2">Phone:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <input type="text" id="mobile" name="mobile" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                        <label class="login2">Monthly Rate:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <input type="number" id="monthlyPrice" name="price" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                        <label style="">End Date:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <input type="date" name="end_date" required
                                                                            value="" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="sparkline13-hd">
                                                        <div class="main-sparkline13-hd">
                                                            <button type="submit" name="Submit" class="btn btn-info col-sm-3 Primary" style="margin-left: 5px; float: right;">Entry
                                                            </button>
                                                            <a class="btn btn-danger col-sm-3 Primary" style="margin-left: 5px; float: right;" href="{{ route('monthly_entry.index') }}" role="button">Go Back </a>
                                                            <a class="btn btn-primary col-sm-3 Primary" style="margin-left: 5px; float: right;" onclick="myFunction()" href="#" role="button">Clear </a> 
                                                        </div>
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

<script type="text/javascript">
    $('#vehicle_number').focusout(function(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var vehicle_number = $('#vehicle_number').val();
        
         $.ajax({
            type: "POST",
            url : "{{ route('monthly_entry.getClient') }}",
            data : 
                {
                    vehicle_number:vehicle_number, 
                },
            success: function(response) {
                var name = $("#name").val('');
                var mobile = $("#mobile").val('');
                console.log(response.clientInfo[0].name);
                name.val(response.clientInfo[0].name);
                mobile.val(response.clientInfo[0].mobile);
            },
            error: function(response) {
            }
        }); 
    });
    
    $('#vehicle_category_id').change(function(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var vehicle_category = $('#vehicle_category_id').val();
        
         $.ajax({
            type: "POST",
            url : "{{ route('monthly_entry.getPrice') }}",
            data : 
                {
                    vehicle_category:vehicle_category,
                },
            success: function(response) {
                var monthlyPrice = $("#monthlyPrice").val('');
                console.log(response.monthlyPrice[0].price);
                monthlyPrice.val(response.monthlyPrice[0].price);
                    
            },
            error: function(response) {
            }
        }); 
    });
    
</script>

<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection