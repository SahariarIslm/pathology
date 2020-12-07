@extends('Master.main')
@section('title')
    Product
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-4 p-0"  style="padding:0px;">
                                Hourly Checkin<span class="table-project-n"></span>
                            </h1>
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
                            <a class="btn btn-info col-lg-2 Primary" style="float:right;" href="{{ route('monthly_entry.entry') }}" role="button">New Monthly Entry</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>

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
                                        <th data-field="vehicle_category_id" data-editable="false">Vehicle Type</th>
                                        <th data-field="mobile" data-editable="false">Phone No.</th>
                                        <th data-field="date" data-editable="false">Entry Date</th>
                                        <th data-field="time" data-editable="false">End Date</th>
                                        <th data-field="cost" data-editable="false">Amount</th>
                                        <th data-field="checkin" data-editable="false" >Payment status</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <?php 
                                	use Carbon\Carbon;
                                ?>
                                <tbody>
                                    @foreach ($data as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->vehicle_number }}</td>
                                        <td>{{ $data->vehicleCategory->name }}</td>
                                        <td>{{ $data->mobile }}</td>
                                        <td>{{ $data->date }}</td>
                                        <td>{{ $data->end_date }}</td>
		                                <?php
											date_default_timezone_set('Asia/Dhaka');  // you are required to set a timezone
                                            $date1 = new DateTime($data->date);
                                            $date2 = new DateTime($data->end_date);
                                            $diff = $date1->diff($date2);
		                                ?>
                                        <td><?php echo (($diff->format('%y') * 12) + $diff->format('%m'))*$data->price ?></td>
                                        <td>@if($data->payment_status == 1)
                                                Paid
                                            @else
                                                Unpaid
                                            @endif
                                        </td>
                            
                                        <td class="datatable-ct w-25">
                                            @if($data->payment_status == "1")
                                                <a href="{{route('monthly_entry.payment_status',['id'=>$data->id])}}" 
                                                    class="btn btn-warning btn-xs"
                                                    onclick="return confirm('Your duration is: <?php echo (($diff->format('%y') * 12) + $diff->format('%m'))."Months"; ?>. Are you Sure To add due ??')">
                                                    <i class="fa fa-arrow-down" 
                                                    title="payment_status"></i>
                                                </a>
                                            @elseif($data->payment_status == "0")
                                                <a href="{{route('monthly_entry.payment_status',['id'=>$data->id])}}" 
                                                    class="btn btn-success btn-xs"
                                                    onclick="return confirm('Are You Sure You Want pay ??')">
                                                    <i class="fa fa-arrow-up" 
                                                    title="payment_status"></i>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('.deletE').on('click', function () {
        var id = $(this).data("id");
        $.ajax(
            {
                url: "{{ route('product.destroy') }}",
                type: 'GET',
                data: {
                    "id": id,
                },
                success: function (){
                    console.log("Data Deleted Successfully");
                    location.reload();
                }
            });
        });  
    });
</script>

@endsection