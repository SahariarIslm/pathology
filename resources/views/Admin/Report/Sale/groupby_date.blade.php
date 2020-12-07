@extends('Master.main')
@section('title')
Sale Report Group By Date
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
                                Sale Report <small>( Group By Date )</small>
                            </h1>
                            
                            {{--  <button type="button" style="float: right;" 
                                class="btn btn-primary btn-sm printPage">
                                <i class="fa fa-print"></i>
                            </button>  --}}
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
                            <table id="table" data-toggle="table" data-pagination="false" 
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
                                        {{--  <th data-field="totalQty" data-editable="false">Quantity</th>  --}}
                                        {{--  <th data-field="subTotal" data-editable="false">Total</th>  --}}
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    @foreach ($data as $data)
                                    <tr>
                                        <td></td>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $data->date }}</td>
                                        {{--  <td>{{ $data->totalQty }}</td>  --}}
                                        {{--  <td>{{ $data->payable }}</td>  --}}
                                        <td class="datatable-ct">
                                            <a href="{{ route('sale.report.groupby.details',
                                                ['id'=>$data->date]) }}" 
                                                class="btn btn-info btn-xs">
                                                <i class="fa fa-external-link"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                {{--  <tfoot>
                                    <tr>
                                        <td colspan="3" style="text-align:right;">Total : &nbsp;</td>
                                        <td>&nbsp; {{ $Qty }}</td>
                                        <td>&nbsp; {{ $Total }}</td>
                                        <td></td>
                                    </tr>
                                </tfoot>  --}}
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