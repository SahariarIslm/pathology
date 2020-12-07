@extends('Master.main')
@section('title')
    Payment Date Expired Shop List 
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Shop List <small>( Payment Date Expired )</small></h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar" class="form-inline">
                                <select class="form-control">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <form action="{{ route('shop.report.payment.expired.print') }}" 
                                    method="get" target="_blank" style="float:right;"> @csrf
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-print"></i>
                                    </button>
                                </form>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" 
                                    data-search="true" data-show-columns="true" 
                                    data-show-pagination-switch="true" data-show-refresh="true" 
                                    data-key-events="true" data-show-toggle="true" 
                                    data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" 
                                    data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="sl">SL.</th>
                                        <th data-field="business_name" data-editable="false">Shop Name</th>
                                        <th data-field="name" data-editable="false">Owner name</th>
                                        <th data-field="mobile" data-editable="false">Mobile</th>
                                        <th data-field="email" data-editable="false">Email</th>
                                        <th data-field="area" data-editable="false">Area</th>
                                        <th data-field="b_type" data-editable="false">Business Type</th>
                                        <th data-field="paydate" data-editable="false">Expiry Date</th>
                                        <th data-field="status" data-editable="false">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    @foreach ($data as $data)
                                    <?php
                                        $ay = $data->paydate;
                                        $no = $data->exdays;
                                        $pay = date('Y-m-d', strtotime($ay. ' + '. $no .'days'));
                                        $wrg = date('Y-m-d', strtotime($pay. '- 7 days'));
                                    ?>
                                    @if($today >= $pay)
                                    <tr class="orng">
                                        <td></td>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $data->business_name }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->mobile }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->area }}</td>
                                        <td>{{ $data->b_type }}</td>
                                        <td>{{ $pay }}</td>
                                        <td>{{ $data->status }}</td>
                                    </tr>
                                    @endif
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

@endsection