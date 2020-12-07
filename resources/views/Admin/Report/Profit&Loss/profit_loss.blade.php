@extends('Master.main')
@section('title')
    Profit & Loss Report
@endsection
@section('content')
    <style type="text/css">
        @media print{
                .header{
                        display: none;
                }
                .page-sidebar{
                        display: none;
                }
                .page-footer{
                    display: none;
                }
                .content-wrapper{
                        margin: 0px;
                        padding: 0px;
                        height: 100%;
                        width:100%;
                }
                .company_info{
                        display: block;
                }
                .dateSearch{
                        display: none;
                }

                .hideBorder{
                        border: hidden;
                }

                .hideDate{
                        display: none;
                }
        }
        .company_info{
                display: none;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('.printPage').on('click',function () {
                $('.company_info').show();
                $('.hideDate').show();
            });
        });
    </script>
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
                                        <th data-field="date" data-editable="false">Date</th>
                                        <th data-field="name" data-editable="false">Type</th>
                                        <th data-field="amount" data-editable="false">Amount</th>
                                        {{--  <th data-field="balance" data-editable="false">Balance</th>  --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    @foreach ($sale as $sale)
                                    <tr>
                                        <td></td>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $sale->date }}</td>
                                        <td> Sale </td>
                                        <td>{{ $sale->subTotal }}</td>
                                        {{--  <td>{{ $sale->balance }}</td>  --}}
                                    </tr>
                                    @endforeach
                                    @foreach ($purchase as $purchase)
                                    <tr>
                                        <td></td>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $purchase->date }}</td>
                                        <td> Purchase </td>
                                        <td>{{ $purchase->subTotal }}</td>
                                        {{--  <td>{{ $purchase->balance }}</td>  --}}
                                    </tr>
                                    @endforeach
                                    @foreach ($expense as $expense)
                                    <tr>
                                        <td></td>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $expense->date }}</td>
                                        <td> Expense </td>
                                        <td>{{ $expense->amount }}</td>
                                        {{--  <td>{{ $expense->balance }}</td>  --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" style="text-align:right;">Profit & Loss : &nbsp;</td>
                                        <td>&nbsp;&nbsp; {{ $Blnc }}</td>
                                        {{--  <td>&nbsp; </td>  --}}
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

<script>
    $(document).ready(function () {
        $('.printPage').on('click',function () {
            $(this).hide();
            window.print();
            window.history.back();
        });
    });
</script>

@endsection