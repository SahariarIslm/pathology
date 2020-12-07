@extends('Master.main')
@section('title')
    Purchase
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-5" style="padding:0px;">
                                Product Purchase &nbsp;
                                <?php
                                    $s = $sl + 1;
                                    $p = date('Y') . $s;
                                    $bata = Auth::user()->id . $p;
                                ?>
                                <input type="hidden" class="purchase_no" value="PO{{ $bata }}"/>
                                <small> ( Purchase No. : <span style="color: blue;">PO{{ $bata }} </span>)</small>
                            </h1>
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
                                <label style="font-size: 20px;">Bill (Tk) : </label>
                                <input type="text" class="bill" value="" readonly
                                    style="font-size: 25px; color: red; font-weight: bold; 
                                    width: 100px; border: hidden;"/>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="row" >
                        <div class="row" >
                            <div class="col-md-6 form-group" style="overflow: scroll; height: 320px;">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
                                                <input type="text" placeholder="Search..." class="form-control" style="width: 600px">
                                                <a href=""></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fa fa-users sub-icon-mg" style="font-size: 100px; margin: 10px; border: 1px solid #ddd"></i>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-users sub-icon-mg" style="font-size: 100px; margin: 10px; border: 1px solid #ddd"></i>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-users sub-icon-mg" style="font-size: 100px; margin: 10px; border: 1px solid #ddd"></i>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-users sub-icon-mg" style="font-size: 100px; margin: 10px; border: 1px solid #ddd"></i>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-users sub-icon-mg" style="font-size: 100px; margin: 10px; border: 1px solid #ddd"></i>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-users sub-icon-mg" style="font-size: 100px; margin: 10px; border: 1px solid #ddd"></i>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-users sub-icon-mg" style="font-size: 100px; margin: 10px; border: 1px solid #ddd"></i>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-users sub-icon-mg" style="font-size: 100px; margin: 10px; border: 1px solid #ddd"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-group" style="overflow: scroll; height: 320px;">
                                <div class="row">
                                        <div class="col-lg-4">
                                            <label>Mobile No. :</label>
                                            <input type="text" class="form-control mobile"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Date :</label>
                                                <input class="form-control date" type="date"
                                                    value="<?php echo date('Y-m-d');?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Table No. : </label>
                                                <select class="form-control p_type">
                                                    <option value="Cash">Cash</option>
                                                    <option value="Bkash">Bkash</option>
                                                    <option value="Rocket">Rocket</option>
                                                    <option value="Card">Card</option>
                                                </select>
                                            </div>
                                        </div>
                                </div>
                                <table class="table table-bordered tbl">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">SL.</th>
                                            <th style="text-align: center;">Description</th>
                                            <th style="text-align: center;">Qty</th>
                                            <th style="text-align: center;">Cost</th>
                                            <th style="text-align: center;">Total</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr style="text-align: center;">
                                                <td></td>
                                                <td>
                                                    <input class="iTEmQty text-center form-control" 
                                                        type="number" title=""
                                                        value="" min="0"
                                                        style="width: ; bor der: hidden;">
                                                </td>
                                                <td>
                                                    <input class="iTEmQty text-center form-control" 
                                                        type="number" title=""
                                                        value="" min="0"
                                                        style="width: ; bor der: hidden;">
                                                </td>
                                                <td>
                                                    <input class="iTEmPrice text-center form-control" 
                                                        type="number" title=""
                                                        value="" min="0"
                                                        style="width: ; bor der: hidden;"/>
                                                </td>
                                                <td>31312</td>
                                                <td>
                                                    <a class="btn btn-danger btn-xs" 
                                                        href=""
                                                        onclick="return confirm('You want to Remove Product from the Cart ??');">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label class="login2">Total Qty :</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="totalQty form-control" readonly value="{{ Cart::getTotalQuantity() }}" style="text-align:center;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label class="login2">Sub Total :</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="subTotal SubTotal form-control" readonly value="{{ Cart::getTotal() }}" style="text-align:center;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label class="login2">Discount :</label>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                            <input type="number" class="disc form-control discount" min="0" style="text-align:center;">
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <select class="form-control discType d_type" >
                                                <option id="p" value="%">%</option>
                                                <option id="t" value="TK">TK</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label class="login2">Service Charge (15%) :</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <input type="number" class="disc form-control discount" min="0" style="text-align:center;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 form-inline form-group">
                                <label>Service Charge (15%) :</label>
                                <input type="number" class="disc form-control discount" 
                                    min="0" style="text-align:center;">
                            </div>
                            <div class="col-lg-4 form-inline form-group">
                                <label>Vat (15%) :</label>
                                <input type="number" class="disc form-control discount" 
                                    min="0" style="text-align:center;">
                            </div>
                            <div class="col-lg-4 form-inline form-group">
                                <label>Payable :</label>
                                <input type="text" class="payable form-control totalamount"
                                    style="text-align:center;" readonly>
                            </div>
                            <div class="col-lg-4 form-inline form-group">
                                <label>Paid :</label>
                                <input type="number" class="paid form-control pAmount" 
                                    min="0" style="text-align:center;">
                            </div>
                            <div class="col-lg-4 form-inline form-group">
                                <label>Due :</label>
                                <input type="text" class="due form-control damount" 
                                    style="text-align:center;" readonly>
                            </div>
                            <div class="col-lg-4 form-inline form-group">
                                <label>Payment By :</label>
                                <select class="form-control p_type">
                                    <option value="Cash">Cash</option>
                                    <option value="Bkash">Bkash</option>
                                    <option value="Rocket">Rocket</option>
                                    <option value="Card">Card</option>
                                </select>
                            </div>
                            <div class="col-lg-4 form-inline form-group">
                                <button type="submit" class="btn btn-success btn-sm">
                                    Confirm
                                </button>
                                <a href="{{ route('purchase.clean') }}" type="GET" 
                                    onclick="return confirm('Are you sure You want to clear this Cart ??');"
                                    class="btn btn-warning btn-sm">Clear
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
        $('#PurchaseConfirm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '{{ route('purchase.submit') }}',
                data: {
                    '_token'        : $('input[name=_token]').val(),
                    'purchase_no'   : $(".purchase_no").val(),
                    'supplier'      : $(".supplier").val(),
                    'date'          : $(".date").val(),
                    'totalQty'      : $(".totalQty").val(),
                    'subTotal'      : $(".subTotal").val(),
                    'discount'      : $(".discount").val(),
                    'd_type'        : $(".d_type").val(),
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
            url: '{{ route('supplier.details') }}',
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
            url: '{{ route('purchase.item') }}',
            data: { 
                    "_token": "{{ csrf_token() }}",
                    'id'    : id 
                }, 
            success: function(data){ 
                location.reload();
            }
        });
    });
    $('.Expiry').on('change', function (){
        var expiry  = $(this).val();
        var id      = $(this).attr('title');
        $.ajax({
            type: 'POST',
            url: '{{ route('purchase.expiry') }}',
            data: { 
                    "_token"    : "{{ csrf_token() }}",
                    'id'        : id ,
                    'expiry'    : expiry ,
                }, 
            success: function(data){ 
                location.reload();
            }
        });
    });
    $('.Batch').on('keyup', function (){
        var batch   = $(this).val();
        var id      = $(this).attr('title');
        $.ajax({
            type: 'POST',
            url: '{{ route('purchase.batch') }}',
            data: { 
                    "_token"    : "{{ csrf_token() }}",
                    'id'        : id ,
                    'batch'     : batch ,
                }, 
            success: function(data){
                {{--  setTimeout(function(){  --}}
                    location.reload();
                {{--  }, 3000);    --}}
            }
        });
    });
    $('.iTEmQty').on('keyup', function (){
        var qty = $(this).val();
        var id = $(this).attr('title');
        $.ajax({
            type: 'POST',
            url: '{{ route('purchase.qty') }}',
            data: { 
                    "_token"    : "{{ csrf_token() }}",
                    'id'        : id ,
                    'qty'       : qty ,
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
            url: '{{ route('purchase.price') }}',
            data: { 
                    "_token"    : "{{ csrf_token() }}",
                    'id'        : id ,
                    'price'     : price ,
                }, 
            success: function(data){ 
                location.reload();
            }
        });
    });
    $(document).ready(function () {
        $('.clean').on('click', function () {
            $.ajax({
                url: '{{ route('purchase.clean') }}',
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
        if ($(".discType").children(":selected").attr("id") == 't') {   
            var totalP = s - d;   
        } else {
            var totald = (s * d) / 100;
            var totalP = s - totald;
        }
        $(".totalamount").val(Math.round(totalP));
        $('.bill').val(Math.round(totalP));
    }
    $(".disc").on('keyup', doStuff);
    $(".discType").on('change', doStuff);
    $('.SubTotal').on('keyup', doStuff());
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
</script>
@endsection