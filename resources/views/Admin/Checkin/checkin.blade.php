@extends('Master.main')
@section('title')
    Checkin
@endsection
@section('content')
<?php
    use App\Admin\Customer;
    $customer = Customer::where('licence',$data->vehicle_number)->first();
    use App\Admin\ParkingPrice;
    use App\Admin\VehicleCategory;
    $vehicle_category = VehicleCategory::where('name',$data->vehicle_category)->first();
?>
<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">              
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Vehicle Checkin</h1>

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
                                        <form action="{{ route('checkin.checkin') }}" method="POST" id="myForm">
                                            @csrf
                                            <div class="sparkline12-list col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group-inner">
                                                            <?php
                                                                use App\Admin\Checkin;
                                                                $count = count(Checkin::whereDate('created_at', date('Y-m-d'))->get());
                                                                $s = $count + 1;
                                                                $bata = date('Ymd') . $s;
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                        <label class="login2">Invoice:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <input type="number" name="invoice" class="form-control" value="{{ $bata }}" readonly />
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
                                                                        <label class="login2">Hourly Rate:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <?php  
                                                                            $hourly_price = ParkingPrice::where('parking_group_id',1)
                                                                                            ->where('vehicle_category_id',@$data->vehicle_type_id)
                                                                                            ->first();
                                                                        ?>
                                                                        <input type="number" id="price" name="price" <?php if(@$customer->parking_group_id == 1){ ?> value="{{ $hourly_price->price }}"<?php } ?> class="form-control" readonly />
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
                                                                        <label class="login2">Parking group:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <div class="form-select-list">
                                                                            <select class="form-control parking_group_id custom-select-value" name="parking_group_id" id="parking_group_id" readonly>
                                                                                <option>Select Parking Group</option>
                                                                                @foreach($parking_groups as $parking_group)
                                                                                    <option value="{{$parking_group->id}}" {{ $parking_group->id == $data->parking_group_id ? 'selected' : '' }}>
                                                                                        {{$parking_group->name}}
                                                                                    </option>
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
                                                                        <label class="login2">Monthly Rate:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <?php  
                                                                            $monthly_price = ParkingPrice::where('parking_group_id',3)->where('vehicle_category_id',@$data->vehicle_type_id)->first();
                                                                        ?>
                                                                        <input type="number" id="monthly_price" name="monthly_price" <?php if(@$customer->parking_group == 'Monthly'){ ?> value="{{ $monthly_price->price }}"<?php } ?> class="form-control" readonly />
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
                                                                            <select class="form-control vehicle_type_id custom-select-value" name="vehicle_category_id" id="vehicle_type_id" readonly>
                                                                                <option>Select Vehicle Type</option>
                                                                                @foreach($vehicleCategories as $vehicleCategory)
                                                                                    <option value="{{$vehicleCategory->id}}" 
                                                                                        {{ $vehicleCategory->id == $data->vehicle_type_id ? 'selected' : '' }} >
                                                                                        {{$vehicleCategory->name}}
                                                                                    </option>
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
                                                                        <label class="login2">Penalty Rate:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <?php  
                                                                            $hourly_price = ParkingPrice::where('parking_group_id',1)->where('vehicle_category_id',@$data->vehicle_type_id)->first();
                                                                        ?>
                                                                        <input type="number" id="penalty" name="penalty" <?php if(@$customer->parking_group == 'Hourly'){ ?> value="{{ $hourly_price->penalty }}"<?php } ?> class="form-control" readonly />
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
                                                                        <label class="login2">Vehicle Number:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <input type="text" value="{{ $data->vehicle_number }}" id="vehicle_number" name="vehicle_number" class="form-control" readonly />
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
                                                                        <label class="login2">Phone No.:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        
                                                                        <input type="number" id="phone" name="phone" value="{{ @$customer->mobile }}" class="form-control" readonly />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="sparkline13-hd">
                                                        <div class="main-sparkline13-hd">
                                                            <button type="submit" name="Submit" class="btn btn-info col-sm-3 Primary" style="margin-left: 5px; float: right;">Checkin
                                                            </button>
                                                            <a class="btn btn-danger col-sm-3 Primary" style="margin-left: 5px; float: right;" href="{{ route('checkin.index') }}" role="button">Go Back </a>
                                                            
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
    $('#vehicle_category_id').change(function(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var vehicle_category = $('#vehicle_category_id').val();
        
         $.ajax({
            type: "POST",
            url : "{{ route('hourly_entry.getPrice') }}",
            data : 
                {
                    vehicle_category:vehicle_category,
                },
            success: function(response) {
                var hourly_price = $("#hourly_price").val('');
                var penalty_price = $("#penalty_price").val('');
                console.log(response.hourlyPrice[0].price);
                hourly_price.val(response.hourlyPrice[0].price);
                penalty_price.val(response.hourlyPrice[0].penalty);
            },
            error: function(response) {
            }
        }); 
    });
    
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#search').on('keyup',function(){
            $value=$(this).val();
            if ($value) {
                $('#search1').show();
                $.ajax({
                    type : 'get',
                    url : '{{URL::to('product/search')}}',
                    data:{'search':$value},
                    success:function(data){
                        $('#search1').html(data);
                    }
                });
            }else{
                $('#search1').hide();
            }     
        });
        $("#search").focusout(function(){
            $('#search1').hide();
        });
    });

    function myFunction(){
        document.getElementById("myForm").reset();
    }
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection