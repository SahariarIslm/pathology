@extends('Master.main')
@section('title')
    Checkin
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">              
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Checkin</h1>
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
                                        <form action="{{ route('checkin.entry') }}" method="POST" id="myForm">
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
                                                                        <input type="text" id="vehicle_number" name="vehicle_number" class="form-control" />
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
                                                                        <label class="login2">Phone No.:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <input type="text" id="mobile" name="mobile" class="form-control" />
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
                                                                        <label class="login2">Vehicle Type:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <select class="form-control vehicle_type_id custom-select-value" name="vehicle_type_id" id="vehicle_type_id">
                                                                            <option>Select Vehicle Type</option>
                                                                            @foreach($vehicleCategories as $vehicleCategory)
                                                                                <option value="{{$vehicleCategory->id}}">
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
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                        <label class="login2">Parking Group:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <select class="form-control parking_group_id custom-select-value" name="parking_group_id" id="parking_group_id">
                                                                            <option>Select Parking Group</option>
                                                                            @foreach($parking_groups as $parking_group)
                                                                                <option value="{{$parking_group->id}}">
                                                                                    {{$parking_group->name}}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
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
                                                                        <label class="login2">Payment Status:</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <input type="text" id="payment_status" name="payment_status" class="form-control" readonly/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="sparkline13-hd">
                                                        <button type="submit" name="Submit" id="register" class="btn btn-info col-sm-3 Primary" style="margin-left: 5px; float: right;">Register First
                                                        </button>
                                                        <button type="submit" name="Submit" id="submit" class="btn btn-info col-sm-3 Primary" style="margin-left: 5px; float: right;">Submit Checkin
                                                        </button>
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

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <select class="form-control">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" 
                                    data-search="true" data-show-columns="true" 
                                    data-show-pagination-switch="true" data-show-refresh="true" 
                                    data-key-events="true" data-show-toggle="true" 
                                    data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" 
                                    data-click-to-select="true" data-toolbar="#toolbar" >
                                <thead>
                                    <tr>
                                        
                                        <th data-field="sl">SL</th>
                                        <th data-field="vehicle_number" data-editable="false">Vehicle No.</th>
                                        <th data-field="parking_group_id" data-editable="false">ParkingGroup</th>
                                        <th data-field="vehicle_category_id" data-editable="false">Vehicle Type</th>
                                        <th data-field="datetime" data-editable="false">Entry</th>
                                        <th data-field="duration" data-editable="false">Duration</th>
                                        <th data-field="cost" data-editable="false">Amount</th>
                                        <th data-field="checkin" data-editable="false" >Checkin status</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <?php 
                                    use Carbon\Carbon;
                                    use App\Admin\VehicleCategory;
                                    use App\Admin\ParkingGroup;
                                ?>
                                <tbody>
                                    @foreach ($data as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->vehicle_number }}</td>
                                        <?php
                                            $vehicleCategory  = VehicleCategory::where('id',$data->vehicle_category_id)
                                                                    ->where('shop', Auth::user()->id)
                                                                    ->first();
                                            $parkingGroup  = ParkingGroup::where('id',$data->parking_group_id)
                                                                    ->where('shop', Auth::user()->id)
                                                                    ->first();
                                        ?>
                                        <td>{{ $parkingGroup->name }}</td>
                                        <td>{{ $vehicleCategory->name }}</td>
                                        <td>{{ $data->datetime }}</td>

                                        <?php
                                            $entry_date = $data->datetime;    
                                            $date = new DateTime($entry_date);
                                            $now = new DateTime();
                                            $difference = $date->diff($now)->format("%d day(s) %h hour(s) and %i minut(s)");
                                        ?>
                                        <td><?php echo $difference; ?></td>
                                        <?php
                                            $start_time = strtotime( $data->datetime );
                                            $time = (time() - $start_time)/3600;
                                            if($time<1){
                                                $total_cost = $data->price;
                                            }elseif($time>1){
                                                $f_cost = $data->price;
                                                $full_time = ceil($time);
                                                $penalty_cost = ($full_time - 1)*$data->penalty;
                                                $total_cost = $f_cost + $penalty_cost;
                                            }
                                        ?>
                                        <td><?php echo $total_cost; ?></td>
                                        <td>@if($data->checkout == 0)
                                                checkedIn
                                            @else
                                                checkedOut
                                            @endif
                                        </td>
                            
                                        <td class="datatable-ct w-25">
                                            @if($data->checkout == "0")
                                                <a href="{{route('checkin.checkout',['id'=>$data->id])}}" 
                                                    class="btn btn-warning btn-xs"
                                                    onclick="return confirm('Your duration is: <?php echo $difference; ?>. Your total due is: <?php echo $total_cost; ?>tk. Are you Sure You Want To Checkout ??')">
                                                    <i class="fa fa-arrow-down" 
                                                    title="Checkout"></i>
                                                </a>
                                            @elseif($data->checkout == "1")
                                                <a href="{{route('checkin.checkout',['id'=>$data->id])}}" 
                                                    class="btn btn-success btn-xs"
                                                    onclick="return confirm('Are You Sure You Want To Checkin back ??')">
                                                    <i class="fa fa-arrow-up" 
                                                    title="Checkout"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
$(document).ready(function(){
    $('#vehicle_number').focusout(function(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var vehicle_number = $('#vehicle_number').val();
        
         $.ajax({
            type: "POST",
            url : "{{ route('checkin.getClient') }}",
            data : 
                {
                    vehicle_number:vehicle_number,
                },
            success: function(response) {
                var name             = $("#name").val('');
                var mobile           = $("#mobile").val('');
                var vehicle_type_id  = $("#vehicle_type_id").val('');
                var payment_status   = $("#payment_status").val('');
                var parking_group_id    = $("#parking_group_id").val('');
                console.log(response);
                if(response){
                    name.val(response.clientInfo.name);
                    mobile.val(response.clientInfo.mobile);
                    parking_group_id.val(response.clientInfo.parking_group_id);
                    if(response.clientInfo.payment_status == 1){
                        payment_status.val('Paid');
                    }else{
                        payment_status.val('Due');
                    }
                    vehicle_type_id.val(response.clientInfo.vehicle_type_id);
                    $("#register").hide();
                    $("#submit").show();
                }else{
                    $("#myForm").attr("action", '{{ route('checkin.clientRegister') }}');
                    name.val('');
                    mobile.val('');
                    parking_group_id.val('');
                    payment_status.val('');
                    vehicle_type_id.val('');
                    $("#register").show();
                    $("#submit").hide();
                }
                
            },
            error: function(response) {
            }
        }); 
    });

});
    
    
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>


@endsection