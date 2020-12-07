@extends('Master.main')
@section('title')
    Delivery System Wise Sale Report
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
                            <h1 class="col-lg-2" style="padding:0px;">
                                Sale Report <br><small>( Delivery System Wise )</small>
                            </h1>
                            <form action="{{ route('sale.report.print.delivery') }}" method="get"
                                    style="float: right;" target="_blank">   @csrf
                                <input type="hidden" name="deliver" value="{{ $deliver }}"/>
                                <input type="hidden" name="fromdate" value="{{ $fromdate }}"/>
                                <input type="hidden" name="todate" value="{{ $todate }}"/>
                                <button type="submit"class="btn btn-primary btn-sm">
                                    <i class="fa fa-print"></i>
                                </button>
                            </form>
                            <form action="{{ route('sale.report.delivery') }}" method="get">
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
                    <div class="modal modal-adminpro-general default-popup-PrimaryModal fade" 
                        id="PrimaryModalalert" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <form action="{{ route('collection.store') }}" method="POST">
                                @csrf
                                <div class="modal-close-area modal-close-df">
                                    <a class="close" data-dismiss="modal" href="#">
                                        <i class="fa fa-close"></i></a>
                                </div>
                                <div class="modal-header header-color-modal bg-color-1">
                                    <h4 class="modal-title">Add Collection Info</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Date <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input type="date" value="{{ $today }}"
                                                    name="date" class="form-control" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Customer <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input class="form-control custom" type="text" readonly/>
                                                <input name="customer" type="hidden" class="customer"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Sale Invoice <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input name="invoice" type="text" readonly
                                                    class="form-control invoice" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Due Amount <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input name="due" type="text" readonly
                                                    class="form-control due" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Collection Amount <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input name="amount" type="text" 
                                                    class="form-control" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Details <span class="table-project-n"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input name="details" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-warning btn-sm" type="button"data-dismiss="modal">Close</button>
                                    {{-- <button class="btn btn-danger btn-sm" type="reset">Clear</button> --}}
                                    <button class="btn btn-success btn-sm" type="submit">Submit</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
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
                                        <th data-field="delivery" data-editable="false">Delivery</th>
                                        <th data-field="sale_no" data-editable="false">Sale No.</th>
                                        <th data-field="supplier" data-editable="false">Customer</th>
                                        <th data-field="totalQty" data-editable="false">Quantity</th>
                                        <th data-field="payable" data-editable="false">Total</th>
                                        {{--  <th data-field="paid" data-editable="false">Paid</th>  --}}
                                        {{--  <th data-field="due" data-editable="false">Due</th>  --}}
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
                                        <td>{{ $data->delivery }}</td>
                                        <td>{{ $data->sale_no }}</td>
                                        <td>
                                            @if($data->custom == null)
                                                Cash
                                            @else
                                                {{ $data->custom }}
                                            @endif
                                        </td>
                                        <td>{{ $data->totalQty }}</td>
                                        <td>{{ $data->payable }}</td>
                                        {{--  <td>{{ $data->paid }}</td>  --}}
                                        {{--  <td>{{ $data->due }}</td>  --}}
                                        <td class="datatable-ct">
                                            <a href="{{ route('sale.report.saleInvoice',
                                                ['id'=>$data->sale_no]) }}" target="_blank"
                                                class="btn btn-primary btn-xs">
                                                <i class="fa fa-print"></i>
                                            </a>
                                            {{-- <button type="button" class="saleNo btn btn-info btn-xs" 
                                                data-toggle="modal" data-target="#PrimaryModalalert"
                                                value="{{ $data->sale_no }}">
                                                <i class="fa fa-plus-circle"></i>
                                            </button> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" style="text-align:right;">Total : &nbsp;</td>
                                        <td> &nbsp; {{ $Qty }}</td>
                                        <td> &nbsp; {{ $Total }}</td>
                                        {{--  <td> &nbsp; {{ $Paid }}</td>  --}}
                                        {{--  <td> &nbsp; {{ $Due }}</td>  --}}
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $('.saleNo').on('click', function () {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('sale.report.sale_no') }}",
                data: {id: id},
                success: function (data) {
                    $('.due').val(data[0]['due']);
                    $('.invoice').val(data[0]['sale_no']);
                    $('.customer').val(data[0]['customer']);
                    $('.custom').val(data[0]['custom']);
                }
            });
        });
    });
</script>

@endsection