@extends('Master.main')
@section('title')
    Expense Report Date Wise
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
                                Expense Report <small>( Date Wise )</small>
                            </h1>
                            <form action="{{ route('expense.report.print_datewise') }}" method="get"
                                style="float: right;" target="_blank">   @csrf
                                <input type="hidden" name="fromdate" value="{{ $fromdate }}"/>
                                <input type="hidden" name="todate" value="{{ $todate }}"/>
                                <button type="submit"class="btn btn-primary btn-sm">
                                    <i class="fa fa-print"></i>
                                </button>
                            </form>
                            <form action="{{ route('expense.report.datewise') }}" method="get">
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
                                        <th data-field="sl">SL</th>
                                        <th data-field="date" data-editable="false">Date</th>
                                        <th data-field="expense_type" data-editable="false">Expense Type</th>
                                        <th data-field="amount" data-editable="false">Amount</th>
                                        <th data-field="user" data-editable="false">User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    @foreach ($data as $data)
                                    <tr>
                                        <td></td>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->date }}</td>
                                        <td>{{ $data->expense_type }}</td>
                                        <td>{{ $data->amount }}</td>
                                        <td>{{ $data->user }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" style="text-align:right;">Total : &nbsp;</td>
                                        <td>&nbsp; {{ $Amt }}</td>
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