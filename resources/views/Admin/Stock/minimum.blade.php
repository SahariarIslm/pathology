@extends('Master.main')
@section('title')
    Minimum Stock Report
@endsection
@section('content')
    
<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <a href="{{ route('stock.minimum.print') }}" method="get" target="_blank"
                                class="btn btn-primary btn-sm" style="float: right;"> 
                                <i class="fa fa-print"></i>
                            </a>
                            <h1>Minimum Stock Report</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>

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
                                    data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="sl">SL.</th>
                                        <th>Code</th>
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>Unit Type</th>
                                        <th>Minimum Stock</th>
                                        <th>Stock Quantity</th>
                                        <th>Cost Price</th>
                                        <th>Sale Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    @foreach ($data as $data)
                                    <tr>
                                        <td></td>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $data->code }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->cat_name }}</td>
                                        <td>{{ $data->unit }}</td>
                                        <td>{{ $data->minimum }}</td>
                                        <td>{{ $data->quantity }}</td>
                                        <td>{{ $data->cost }}</td>
                                        <td>{{ $data->price }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-right" colspan="7">Total : &nbsp;</td>
                                        <td>&nbsp;&nbsp; {{ $Qty }}</td>
                                        <td>&nbsp;&nbsp; {{ $Cost }}</td>
                                        <td>&nbsp;&nbsp; {{ $Price }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection