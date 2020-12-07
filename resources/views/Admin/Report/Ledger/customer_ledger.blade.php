@extends('Master.main')
@section('title')
    Customer Ledger Report
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-3" style="padding:0px;">
                                Customer Ledger <small>( Report )</small>
                            </h1>
                            <form action="{{ route('ledger.report.customer.print') }}" method="get"
                                    style="float: right;" target="_blank">  @csrf
                                <input type="hidden" name="customer" value="{{ $customer }}"/>
                                <input type="hidden" name="fromdate" value="{{ $fromdate }}"/>
                                <input type="hidden" name="todate" value="{{ $todate }}"/>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-print"></i>
                                </button>
                            </form>
                            <form action="{{ route('ledger.report.customer') }}" method="get">
                                {{ csrf_field() }}
                                <div class="col-lg-2">
                                    <div class="row">
                                        <select name="customer" class="select picker form-control" 
                                            title="Select Customer" data-style="btn-info" 
                                            data-live-search="true" required>
                                            <option value="">Select Customer</option>
                                            @foreach ($customers as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label style="float:right;">From :</label>
                                        </div>
                                        <div class="col-lg-8" style="padding-left:0px;">
                                            <input type="date" name="fromdate" required
                                                value="{{ $fromdate }}" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label style="float:right;">To :</label>
                                        </div>
                                        <div class="col-lg-8" style="padding-left:0px;">
                                            <input type="date" value="{{ $todate }}" 
                                                class="form-control" name="todate" required/>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"class="btn btn-success btn-sm">Load</button>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <th>SL.</th>
                                    <th>Date</th>
                                    <th>Perticulars</th>
                                    <th>Invoice</th>
                                    <th class="text-right">Debit (Tk.)</th>
                                    <th class="text-right">Credit (Tk.)</th>
                                    <th class="text-right">Balance (Tk.)</th>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    @foreach ($debit as $data)
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $data->date }}</td>
                                        <td>Sales</td>
                                        <td>{{ $data->sale_no }}</td>
                                        <td style="text-align: right;">{{ $data->payable }}</td>
                                        <td style="text-align: right;">0</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                    @foreach ($credT as $data)
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $data->s_date }}</td>
                                        <td>Sales Cancel</td>
                                        <td>{{ $data->sale_no }}</td>
                                        <td style="text-align: right;">0</td>
                                        <td style="text-align: right;">{{ $data->subTotal }}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                    @foreach ($credit as $data)
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $data->date }}</td>
                                        <td>Collection</td>
                                        <td>{{ $data->invoice }}</td>
                                        <td style="text-align: right;">0</td>
                                        <td style="text-align: right;">{{ $data->paid }}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="text-right">
                                        <td colspan="4" >Total Amount : </td>
                                        <td>{{ $tDebit }}</td>
                                        <td>{{ $newCre }}</td>
                                        <td>{{ $tBalance }}</td>
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