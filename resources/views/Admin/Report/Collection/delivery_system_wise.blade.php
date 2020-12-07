@extends('Master.main')
@section('title')
    Delivery System Wise Collection Report
@endsection
@section('content')
<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-2" style="padding:0px;">
                                Collection Report <br><small>( Delivery System Wise )</small>
                            </h1>
                            <form action="{{ route('collection.report.print_delivery') }}" method="get"
                                    style="float: right;" target="_blank">   @csrf
                                <input type="hidden" name="deliver" value="{{ $deliver }}"/>
                                <input type="hidden" name="fromdate" value="{{ $fromdate }}"/>
                                <input type="hidden" name="todate" value="{{ $todate }}"/>
                                <button type="submit"class="btn btn-primary btn-sm">
                                    <i class="fa fa-print"></i>
                                </button>
                            </form>
                            <form action="{{ route('collection.report.delivery') }}" method="get">
                                {{ csrf_field() }}
                                <div class="col-lg-2">
                                    <div class="row">
                                        <select name="deliver" class="form-control"
                                            style="padding-left: 5px;" required>
                                            <option value="">Select Delivery System</option>
                                            @foreach ($delivery as $delivery)
                                            <option value="{{ $delivery->id }}">{{ $delivery->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label style="float:right;">From :</label>
                                        </div>
                                        <div class="col-lg-8" style="padding-left: 5px;">
                                            <input type="date" name="fromdate" required
                                                value="{{ $fromdate }}" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label style="float:right;">To :</label>
                                        </div>
                                        <div class="col-lg-6" style="padding-left: 5px;">
                                            <input type="date" value="{{ $todate }}" 
                                                class="form-control" name="todate" required/>
                                        </div>
                                        <button type="submit"class="btn btn-success btn-sm">Load</button>
                                    </div>
                                </div>
                            </form>
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
                                        <th data-field="sl">SL.</th>
                                        <th data-field="date" data-editable="false">Date</th>
                                        <th data-field="delivery" data-editable="false">Delivery</th>
                                        <th data-field="supplier" data-editable="false">Customer</th>
                                        <th data-field="invoice" data-editable="false">Invoice</th>
                                        <th data-field="total" data-editable="false">Total Sale</th>
                                        <th data-field="paid" data-editable="false">Paid</th>
                                        <th data-field="due" data-editable="false">Due</th>
                                        <th data-field="amount" data-editable="false">Last Collection</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $data->date }}</td>
                                        <td>{{ $data->deliver }}</td>
                                        <td>{{ $data->custo }}</td>
                                        <td>{{ $data->invoice }}</td>
                                        <td>{{ $data->paid + $data->due }}</td>
                                        <td>{{ $data->paid }}</td>
                                        <td>{{ $data->due }}</td>
                                        <td>{{ $data->amount }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" style="text-align:right;">Total : &nbsp;</td>
                                        <td> &nbsp; {{ $Paid }}</td>
                                        <td> &nbsp; {{ $Due }}</td>
                                        <td></td>
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