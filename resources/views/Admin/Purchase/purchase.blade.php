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
                    <form id="PurchaseConfirm" action="{{ route('purchase.submit') }}" method="Post" > @csrf
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1 class="col-lg-5" style="padding:0px;">
                                    Medicine Purchase &nbsp;
                                    <?php
                                        $s = $sl + 1;
                                        $p = date('Ymd') . $s;
                                        $bata = Auth::user()->id . $p;
                                    ?>
                                    <input type="hidden" class="purchase_no" name="purchase_no" value="PO{{ $bata }}"/>
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
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Manufacturar :</label>
                                <select class="form-control SUP supplier" search="true" id="manufacturer" name="supplier" required>
                                    <option value="Cash">Select Manufacturer</option>
                                    @foreach ($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Phone No.: </label>
                                <input class="form-control date" id="phone" type="text"
                                        value="">
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
                                    <label>Payment By : </label>
                                    <select class="form-control p_type" name="p_type">
                                        <option value="Cash">Cash</option>
                                        <option value="Bkash">Bkash</option>
                                        <option value="Rocket">Rocket</option>
                                        <option value="Card">Card</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 form-group" style="overflow: scroll; height: 320px;">
                                <table class="table table-bordered tbl order-list">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; width: 300px;">Name</th>
                                            <th style="text-align: center;">Barcode</th>
                                            <th style="text-align: center;">Expiry Date</th>
                                            <th style="text-align: center;">Batch No</th>
                                            <th style="text-align: center;">Qty</th>
                                            <th style="text-align: center;">Cost</th>
                                            <th style="text-align: center;width: 180px">Total</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">  
                                    </tbody>
                                </table>
                                <input type="button" class="btn btn-primary text-center" id="addrow" value="Add New Medicine" />
                            </div>
                            <div class="col-lg-4 form-inline form-group text-right">
                                <label>Total Qty :</label>
                                <input type="text" class="totalQty form-control" name="totalQty" readonly
                                    value="" style="text-align:center;">
                            </div>
                            <div class="col-lg-4 form-inline form-group text-right">
                                <label>Sub Total :</label>
                                <input type="text" class="subTotal SubTotal form-control" readonly
                                    value="" name="subTotal" style="text-align:center;">
                            </div>
                            <div class="col-lg-4 form-inline form-group text-right">
                                <label>Discount :</label>
                                <input type="number" name="discount" class="disc form-control discount" 
                                    min="0" style="text-align:center;">
                                <select class="form-control discType d_type" name="d_type">
                                    <option id="p" value="%">%</option>
                                    <option id="t" value="TK">TK</option>
                                </select>
                            </div>
                            <div class="col-lg-4 form-inline form-group text-right">
                                <label>Payable :</label>
                                <input type="text" name="payable" class="payable form-control totalamount"
                                    style="text-align:center;" readonly>
                            </div>
                            <div class="col-lg-4 form-inline form-group text-right">
                                <label>Paid :</label>
                                <input type="number" name="paid" class="paid form-control pAmount" 
                                    min="0" style="text-align:center;">
                            </div>
                            <div class="col-lg-4 form-inline form-group text-right">
                                <label>Due :</label>
                                <input type="text" name="due" class="due form-control damount" 
                                    style="text-align:center;" readonly>
                            </div>
                            <div class="col-lg-4 form-inline form-group text-right">
                                <label>Return :</label>
                                <input type="text" name="return" class="return form-control ramount" 
                                    style="text-align:center;" readonly>
                            </div>
                            <div class="col-lg-4 form-inline form-group text-right">
                                <label>Payment By :</label>
                                <select class="form-control p_type" name="p_type">
                                    <option value="Cash">Cash</option>
                                    <option value="Bkash">Bkash</option>
                                    <option value="Rocket">Rocket</option>
                                    <option value="Card">Card</option>
                                </select>
                            </div>
                            <div class="col-lg-4 form-inline form-group text-center">
                                <a href="#" type="GET" 
                                    onclick="return confirm('Are you sure You want to clear this Cart ??');"
                                    class="btn btn-warning btn-lg" style="width: 100px">Clear
                                </a>
                                <button type="submit" class="btn btn-success btn-lg" style="width: 150px">
                                    Confirm
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {

    $('#manufacturer').change(function(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var manufacturer = $('#manufacturer').val();
         $.ajax({
            type: "POST",
            url : "#",
            data : 
                {
                    manufacturer:manufacturer,
                },
            success: function(response) {
                var phone = $("#phone").val('');
                phone.val(response.clientInfo.mobile);
            },
            error: function(response) {
            }
        }); 
    });

    $('#manufacturer').change(function(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var manufacturer = $('#manufacturer').val();
         $.ajax({
            type: "POST",
            url : "#",
            data : 
                {
                    manufacturer:manufacturer,
                },
            success: function(response) {
                // var medicine = $(".medicine").html('');
                var counter = 0;
                $("#addrow").on("click", function () {
                    counter++;
                    var newRow = $("<tr id='medicine_row_"+counter+"' data-id='"+counter+"'>");
                    newRow.append(response.medicines_html);
                    $("table.order-list").append(newRow);
                });
            },
            error: function(response) {
            }
        }); 
    });
});
</script>

@endsection