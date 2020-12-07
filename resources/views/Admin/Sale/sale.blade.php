@extends('Master.main')
@section('title')
    Sale
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-4" style="padding:0px;">
                                Product Sale &nbsp;
                                <?php
                                    $s = $sl + 1 ;
                                    $p = date('Y') . $s;
                                    $bata = Auth::user()->id . $p;
                                ?>
                                {{--  <small> ( Invoice No. : <span style="color: blue;">INV{{ $bata }} </span>)</small>  --}}
                                <small> ( Invoice No. : <span style="color: blue;">{{ $tata }} </span>)</small>
                            </h1>
                            @can('admin')
                            <button type="button" class="btn btn-primary col-lg-1." data-toggle="modal" 
                                data-target="#PrimaryModalalert">Add Customer
                            </button>
                            @endcan
                            <div class="col-lg-4">
                                @if(session('message'))
                                <div class="text-center alert alert-dismissible alert-success" 
                                    style="padding-top: 0px; padding-bottom: 0px;
                                        margin-top: 0px; margin-bottom: 0px;">
                                    <button type="button" class="close" data-dismiss="alert" 
                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{ session('message') }}</strong>
                                </div>
                                @elseif(session('status'))
                                <div class="text-center alert alert-dismissible alert-info" 
                                    style="padding-top: 0px; padding-bottom: 0px; 
                                        margin-top: 0px; margin-bottom: 0px;">
                                    <button type="button" class="close" data-dismiss="alert" 
                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{ session('status') }}</strong>
                                </div>
                                @elseif(session('warning'))
                                <div class="text-center alert alert-dismissible alert-warning" 
                                    style="padding-top: 0px; padding-bottom: 0px; 
                                        margin-top: 0px; margin-bottom: 0px;">
                                    <button type="button" class="close" data-dismiss="alert" 
                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{ session('warning') }}</strong>
                                </div>
                                @elseif(session('danger'))
                                <div class="text-center alert alert-dismissible alert-danger" 
                                    style="padding-top: 0px; padding-bottom: 0px; 
                                        margin-top: 0px; margin-bottom: 0px;">
                                    <button type="button" class="close" data-dismiss="alert" 
                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{ session('danger') }}</strong>
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-2." style="float:right;">
                                <label style="font-size: 21px;">Bill (Tk) : </label>
                                <input type="text" class="bill" value="" readonly
                                    style="font-size: 25px; color: red; font-weight: bold; 
                                    width: 100px; border: hidden;"/>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div id="PrimaryModalalert" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <form action="{{ route('customer.store') }}" method="POST">
                                @csrf
                                <div class="modal-close-area modal-close-df">
                                    <a class="close" data-dismiss="modal" href="#">
                                        <i class="fa fa-close"></i></a>
                                </div>
                                <div class="modal-header header-color-modal bg-color-1">
                                    <h4 class="modal-title">Add Customer Info</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Name <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" name="name" class="form-control" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Mobile <span class="table-project-n"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" name="mobile" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Address <span class="table-project-n"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <textarea type="text" name="address" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Balance <span class="table-project-n"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <input type="number" name="balance" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-warning btn-sm" type="button"data-dismiss="modal">Close</button>
                                    <button class="btn btn-danger btn-sm" type="reset">Clear</button>
                                    <button class="btn btn-success btn-sm" type="submit">Submit</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Product List : </label>
                            <select type="text" data-live-search="true" title="Select Product ....."
                                class="selectpicker form-control iTEmCoDe" data-style="btn-info">
                                @foreach($product as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->name }} ( {{ $product->code }} ) - {{ $product->price }} Tk.
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <form action="{{ route('sale.submit') }}" method="POST"> 
                            @csrf
                            <div class="col-lg-2">
                                <label>Customer :</label>
                                <input type="hidden" name="sale_no" class="sale_no" 
                                    value="INV{{ $bata }}"/>
                                <select class="selectpicker form-control SUP customer" name="customer" 
                                    data-live-search="true" data-style="btn- primary" required>
                                    <option value="0">Cash</option>
                                    @foreach ($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label>Mobile No. :</label>
                                <input class="form-control mobile" name="mobile" readonly/>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Date :</label>
                                    <input class="form-control date" type="date" name="date"
                                        value="<?php echo date('Y-m-d');?>">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Delivery Company : </label>
                                    <select class="form-control delivery" name="delivery" required>
                                        <option value="">----- Select -----</option>
                                        @foreach($delivery as $delivery)
                                        <option value="{{ $delivery->id }}">{{ $delivery->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Payment Type : </label>
                                    <select class="form-control p_type" name="p_type">
                                        <option value="Cash">Cash</option>
                                        <option value="Bkash">Bkash</option>
                                        <option value="Rocket">Rocket</option>
                                        <option value="Card">Card</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-8" style="overflow: scroll; height: 320px;">
                                <table class="table table-bordered tbl">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">SL.</th>
                                            <th style="text-align: center;">Name</th>
                                            <th style="text-align: center;">Code</th>
                                            <th style="text-align: center;">Quantity</th>
                                            <th style="text-align: center;">Price</th>
                                            <th style="text-align: center;">Total</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach(Cart::getContent() as $item) 
                                            <tr style="text-align: center;">
                                                <td>{{ $i++ }}.</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->attributes->code }}</td>
                                                <td style="padding-right:0px; padding-left:0px;">
                                                    <input class="iTEmQty text-center" 
                                                        type="number" title="{{ $item->id }}"
                                                        value="{{ $item->quantity }}"
                                                        style="width: 60px; border:hidden;
                                                        margin-right:0px; margin-left:0px;">
                                                </td>
                                                <td style="padding-right:0px; padding-left:0px;">
                                                    <input class="iTEmPrice text-center" 
                                                        type="number" title="{{ $item->id }}"
                                                        value="{{ $item->price }}"
                                                        style="width: 70px; border:hidden; 
                                                        margin-right:0px; margin-left:0px;"/>
                                                </td>
                                                <td>{{ $item->getPriceSum() }}</td>
                                                <td>
                                                    <a class="btn btn-danger btn-xs" 
                                                        href="{{ route('sale.remove',['id'=>$item->id]) }}"
                                                        onclick="return confirm('You want to Remove Product from the Cart ??');">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Total Quantity : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <input type="text" style="text-align:center;" readonly
                                            value="{{ Cart::getTotalQuantity() }}" name="totalQty"
                                            class="col-lg-6 totalQty form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Sub Total : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <input type="text" style="text-align:center;" 
                                            value="{{ Cart::getTotal() }}" readonly
                                            class="subTotal SubTotal form-control" name="subTotal">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Discount : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-4 text-right" style="padding-right:0px;">
                                        <input type="text" style="text-align:center;" value="0"
                                            class="disc form-control discount" name="discount">
                                    </div>
                                    <div class="col-lg-2" style="padding-left:0px;">
                                        <select class="form-control discType d_type" 
                                            name="d_type" style="padding:0px;">
                                            <option id="p" value="%">%</option>
                                            <option id="t" value="TK">TK</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Delivery Charge : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <input type="text" style="text-align:center;" name="dCharge"
                                            class="form-control dCharge" value="0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Total Payable : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <input type="text" style="text-align:center;" name="payable"
                                            class="payable form-control totalamount" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Paid Amount : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <input type="text" style="text-align:center;" name="paid"
                                            class="paid form-control pAmount" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Return Amount : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <input type="text" style="text-align:center;" name="return"
                                            class="return form-control ramount" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6 text-right">
                                        <label>Due Amount : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <input type="text" style="text-align:center;" name="due"
                                        class="due form-control damount" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-success btn-block btn-sm">
                                        Confirm
                                    </button>
                                    <a class="col-lg-6 btn btn-warning btn-sm"
                                        onclick="return confirm('Are you sure You want to clear this Cart ??');"
                                        href="{{ route('sale.clean') }}" type="GET">Clear
                                    </a>
                                    <a href="{{ route('sale.report.saleInvoice',['id'=>$saleNo]) }}" 
                                        target="_blank" class="col-lg-6 btn btn-primary btn-sm" type="GET">
                                        <i class="fa fa-print"></i> Print
                                    </a>
                                    
                                </div>
                            </div>
                        </form>
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
        $('#SaleConfirm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '',
                data: {
                    '_token'        : $('input[name=_token]').val(),
                    'sale_no'       : $(".sale_no").val(),
                    'delivery'      : $(".delivery").val(),
                    'customer'      : $(".customer").val(),
                    'date'          : $(".date").val(),
                    'totalQty'      : $(".totalQty").val(),
                    'subTotal'      : $(".subTotal").val(),
                    'discount'      : $(".discount").val(),
                    'd_type'        : $(".d_type").val(),
                    'dCharge'       : $(".dCharge").val(),
                    'payable'       : $(".payable").val(),
                    'paid'          : $(".paid").val(),
                    'return'        : $(".return").val(),
                    'due'           : $(".due").val(),
                    'p_type'        : $(".p_type").val(),
                },
                success: function () {
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                    alert('Data Not Saved');
                }
            });
        });
    });
    
    $(".SUP").change(function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('customer.details') }}',
            type: 'get',
            data: {id:id},
            success: function (data) {
                $('.mobile').val(data);
            }
        });
    });
</script>
<script>
    $('.iTEmCoDe').change(function (){
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: '{{ route('sale.item') }}',
            data: { 
                    "_token": "{{ csrf_token() }}",
                    'id'    : id 
                }, 
            success: function(data){ 
                location.reload();
            }
        });
    });
    $('.iTEmQty').on('keyup', function (){
        var qty = $(this).val();
        var id = $(this).attr('title');
        $.ajax({
            type: 'POST',
            url: '{{ route('sale.qty') }}',
            data: { 
                    "_token": "{{ csrf_token() }}",
                    'id'    : id ,
                    'qty'    : qty ,
                }, 
            success: function(data){ 
                location.reload();
            }
        });
    });
    $('.iTEmPrice').on('keyup', function (){
        var price = $(this).val();
        var id = $(this).attr('title');
        $.ajax({
            type: 'POST',
            url: '{{ route('sale.price') }}',
            data: { 
                    "_token": "{{ csrf_token() }}",
                    'id'    : id ,
                    'price'    : price ,
                }, 
            success: function(data){ 
                location.reload();
            }
        });
    });
    $(document).ready(function () {
        $('.clean').on('click', function () {
            $.ajax({
                url: '{{ route('sale.clean') }}',
                type: 'GET',
                data: {},
                success: function (response) {
                    console.log(response);
                    $('input').val('');
                    $('.tbl tbody').val('');
                    location.reload();
                }
            });
        });
    });
</script>
<script>
    function doStuff() {
        var d = $('.disc').val();
        var s = $('.SubTotal').val();
        var dc = $('.dCharge').val();
        if ($(".discType").children(":selected").attr("id") == 't') {   
            var totalP = s - d;   
        } else {
            var totald = (s * d) / 100;
            var totalP = s - totald;
        }
        var totalA = +totalP + +dc; 
        $(".totalamount").val(Math.round(totalA));
        $('.bill').val(Math.round(totalA));
    }
    $(".dCharge").on('keyup', doStuff);
    $(".disc").on('keyup', doStuff);
    $(".discType").on('change', doStuff);
    $('.SubTotal').on('keyup', doStuff());
    $('.dCharge').on('keyup', doStuff());

    function doIt() {
        var ro = 0;
        var pa = $('.pAmount').val();
        var tp = $('.totalamount').val();
        var cal = (pa - tp);
        if (cal > 0) {
            $('.damount').val(Math.round(ro));
            $('.ramount').val(Math.round(cal));
        } else {
            var bal = (tp - pa);
            $('.ramount').val(Math.round(ro));
            $('.damount').val(Math.round(bal)); }
    }
    $(".pAmount").on('keyup', doIt);
    $(".totalamount").on('change', doIt);
    $(".disc").on('keyup', doIt);
    $(".discType").on('change', doIt);
    $('.SubTotal').on('keyup', doIt);
    $('.dCharge').on('keyup', doIt);
</script>

@endsection