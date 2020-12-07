@extends('Master.main')
@section('title')
    Profit & Loss Report
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
                                Profit & Loss <small>Report</small>
                            </h1>
                            <form action="{{ route('profit.loss.print') }}" method="get"
                                style="float: right;" target="_blank">   @csrf
                                <input type="hidden" name="fromdate" value="{{ $fromdate }}"/>
                                <input type="hidden" name="todate" value="{{ $todate }}"/>
                                <button type="submit"class="btn btn-primary btn-sm">
                                    <i class="fa fa-print"></i>
                                </button>
                            </form>
                            <form action="{{ route('profit.loss.report') }}" method="get">
                                {{ csrf_field() }}
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label style="float:right;">From :</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="date" name="fromdate" required
                                                value="{{ $fromdate }}" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label style="float:right;">To :</label>
                                        </div>
                                        <div class="col-lg-7">
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
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <th>SL.</th>
                                    <th>Sector</th>
                                    <th>Amount (Tk.)</th>
                                    <th>Balance (Tk.)</th>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>Total Sales</td>
                                        <td>{{ $tS }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>Total Purchase</td>
                                        <td>{{ $tP }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>Gross Profit</td>
                                        <td></td>
                                        <td>{{ $gPft }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>Total Expense</td>
                                        <td>{{ $tExp }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>Profit & Loss</td>
                                        <td></td>
                                        <td>{{ $pLos }}</td>
                                    </tr>
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