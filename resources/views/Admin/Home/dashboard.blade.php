@extends('Master.main')
@section('title')
    Dashboard
@endsection
@section('content')

<div class="product-sales-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="product-sales-chart">
                    <div class="row" style="min-height:350px;">

                        <div class="col-md-12">
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
                                            <th data-field="date" data-editable="false">Entry date</th>
                                            <th data-field="time" data-editable="false">Entry Time</th>
                                            <th data-field="duration" data-editable="false">Duration</th>
                                            <th data-field="checkin" data-editable="false" >Checkin status</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        use Carbon\Carbon;
                                        use App\Admin\ParkingGroup;
                                    ?>
                                    <tbody>
                                        @foreach ($data as $key=>$data)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $data->vehicle_number }}</td>
                                            <?php
                                                $parkingGroup  = ParkingGroup::where('id',$data->parking_group_id)
                                                                        ->where('shop', Auth::user()->id)
                                                                        ->first();
                                            ?>
                                            <td>{{ $parkingGroup->name }}</td>
                                            <td>{{ $data->date }}</td>
                                            <td>{{ $data->time }}</td>
                                            <?php
                                                $entry_date = $data->time;    
                                                $date = new DateTime($entry_date);
                                                $now = new DateTime();
                                                $difference = $date->diff($now)->format("%h hours and %i minuts");
                                            ?>
                                            <td><?php echo $difference; ?></td>
                                            <td>@if($data->checkout == 0)
                                                    checkedIn
                                                @else
                                                    checkedOut
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

                @can('superAdmin')
                <div class="row" style="margin-top: 17px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="white-box analytics-info-cs mg-b-10">
                            <h3 class="box-title" style="font-size:15px;">Monthly Shop Registration</h3>
                            <ul class="list-inline" style="font-size:20px;">
                                <li class="">
                                    <span class="counter text-primary" style="font-weight:bold;">0</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="white-box analytics-info-cs mg-b-10">
                            <h3 class="box-title" style="font-size:15px;">Total Registrated Shop</h3>
                            <ul class="list-inline" style="font-size:20px;">
                                <li class="">
                                    <span class="counter text-info" style="font-weight:bold;">0</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="white-box analytics-info-cs mg-b-10">
                            <h3 class="box-title" style="font-size:15px;">Total Active Shop</h3>
                            <ul class="list-inline" style="font-size:20px;">
                                <li class="">
                                    <span class="counter text-success" style="font-weight:bold;">0</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endcan
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                @can('admin')
                <div class="white-box analytics-info-cs mg-b-10 res-mg-t-30">
                    <h3 class="box-title">Today Hourly CheckIn</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">
                            <span class="counter text-success" style="font-weight:bold;">{{ $todayHcheckin }}</span>
                        </li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs mg-b-10">
                    <h3 class="box-title">Today Monthly CheckIn</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">
                            <span class="counter text-info" style="font-weight:bold;">{{ $todayMcheckin }}</span>
                        </li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs mg-b-10">
                    <h3 class="box-title">Total CheckIn</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">
                            <span class="counter text-warning" style="font-weight:bold;">{{ $totalCheckin }}</span>
                        </li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs">
                    <h3 class="box-title">Total Collection</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">Tk.
                            <span class="counter text-danger" style="font-weight:bold;">{{ $totalPrice }}</span>
                        </li>
                    </ul>
                </div>
                @endcan
                @can('manager')
                <div class="white-box analytics-info-cs mg-b-10 res-mg-t-30">
                    <h3 class="box-title">Today Purchase</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">Tk.
                            <span class="counter text-success" style="font-weight:bold;">{{ $tPur }}</span>
                        </li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs mg-b-10">
                    <h3 class="box-title">Today Sales</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">Tk.
                            <span class="counter text-info" style="font-weight:bold;">{{ $tSal }}</span>
                        </li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs mg-b-10">
                    <h3 class="box-title">Today Expense</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">Tk.
                            <span class="counter text-warning" style="font-weight:bold;">{{ $tExp }}</span>
                        </li>
                    </ul>
                </div>
                @endcan
                @can('superAdmin')
                <div class="white-box analytics-info-cs mg-b-10">
                    <h3 class="box-title" style="font-size:15px;">Monthly Shop Registration</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">
                            <span class="counter text-primary" style="font-weight:bold;">{{ $tMsr }}</span>
                        </li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs mg-b-10">
                    <h3 class="box-title" style="font-size:15px;">Total Registrated Shop</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">
                            <span class="counter text-info" style="font-weight:bold;">{{ $tRs }}</span>
                        </li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs mg-b-10">
                    <h3 class="box-title" style="font-size:15px;">Total Active Shop</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">
                            <span class="counter text-success" style="font-weight:bold;">{{ $tAs }}</span>
                        </li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs mg-b-10">
                    <h3 class="box-title" style="font-size:15px;">Total Inactive Shop</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">
                            <span class="counter text-danger" style="font-weight:bold;">{{ $tIs }}</span>
                        </li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs">
                    <h3 class="box-title" style="font-size:15px;">Total Demo Package Shop</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">
                            <span class="counter text-warning" style="font-weight:bold;">{{ $tDps }}</span>
                        </li>
                    </ul>
                </div>
                @endcan
                @can('reference')
                <div class="white-box analytics-info-cs mg-b-10 res-mg-t-30">
                    <h3 class="box-title">Total Registrated Shop</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">
                            <span class="counter text-success" style="font-weight:bold;">{{ $Rtrs }}</span>
                        </li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs mg-b-10">
                    <h3 class="box-title">Total Active Shop</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">
                            <span class="counter text-info" style="font-weight:bold;">{{ $Rtas }}</span>
                        </li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs mg-b-10">
                    <h3 class="box-title">Total Inactive Shop</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">
                            <span class="counter text-warning" style="font-weight:bold;">{{ $Rtis }}</span>
                        </li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs">
                    <h3 class="box-title">Total Payment</h3>
                    <ul class="list-inline" style="font-size:20px;">
                        <li class="">Tk.
                            <span class="counter text-danger" style="font-weight:bold;">{{ $Rtp }}</span>
                        </li>
                    </ul>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>

{{-- <div class="calender-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="calender-inner">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection