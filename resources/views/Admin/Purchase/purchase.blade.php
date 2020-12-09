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
                                Pathology Bill &nbsp;
                                <?php
                                    $s = $sl + 1 ;
                                    $p = date('Y') . $s;
                                    $bata = Auth::user()->id . $p;
                                ?>
                                <small> ( Invoice No. : <span style="color: blue;"> {{ $bata }} </span>)</small>
                            </h1>
                            @can('admin')
                            <button type="button" class="btn btn-primary col-lg-1." data-toggle="modal" 
                                data-target="#PrimaryModalalert">Add Patient
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
                        <div class="col-lg-3">
                            <label>Patient List : </label>
                            <select type="text" data-live-search="true" id="patient" title="Select Patient ....."
                                class="selectpicker form-control patient" data-style="btn-info">
                                @foreach($patient as $patient)
                                    <option value="{{ $patient->id }}">
                                        {{ $patient->name }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <form action="{{ route('sale.submit') }}" method="POST"> 
                            @csrf
                            <div class="col-lg-3">
                                <label>Mobile No. :</label>
                                <input class="form-control mobile" id="mobile" name="mobile" readonly/>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Reference: </label>
                                    <select class="form-control reference_id" id="reference_id" name="reference_id" required>
                                        <option value="">----- Select -----</option>
                                        @foreach($reference as $reference)
                                            <option value="{{ $reference->id }}">
                                                {{ $reference->name }} 
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Date :</label>
                                    <input class="form-control date" type="date" name="date"
                                        value="<?php echo date('Y-m-d');?>">
                                </div>
                            </div>

                            <div class="col-lg-9" style="overflow: scroll; height: 320px;">
                                <table class="table table-bordered tbl order-list">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Name</th>
                                            <th style="text-align: center;">Code</th>
                                            <th style="text-align: center;">Qty</th>
                                            <th style="text-align: center;">Cost</th>
                                            <th style="text-align: center;">Total</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                    </tbody>
                                </table>
                                <input type="button" class="btn btn-primary text-center" id="addrow" value="Add New Medicine" />
                            </div>
                            <div class="col-lg-3">
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
                                    <a href="" 
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function () {

        $('#patient').change(function(){
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            var patient = $('#patient').val();
             $.ajax({
                type: "POST",
                url : "{{ route('purchase.clientinfo') }}",
                data : 
                    {
                        patient:patient,
                    },
                success: function(response) {
                    console.log(response.clientInfo);
                    var phone = $("#mobile").val('');
                    var reference_id = $("#reference_id").val('');
                    phone.val(response.clientInfo.mobile);
                    reference_id.val(response.clientInfo.reference_id);
                },
                error: function(response) {
                }
            }); 
        });

        
        var counter = 0;
        $("#addrow").on("click", function () {
            counter++;
        var newRow =    '<tr>'+
                            '<td>'+
                                '<select class="form-control SUP medicine" id="medicine_id" name="medicine_id[]" required>'+
                                    '<option value="">Select Medicine</option>'+
                                '</select>'+
                            '</td>'+
                              '<td>'+
                                '<input class="code text-center form-control" id="code" name="code[]" type="text" value=""style="width: ; border: hidden;" readonly>'+
                            '</td>'+
                            '<td>'+
                                '<input class="iTEmQty text-center form-control" id="quantity" name="qty[]" type="number" step=".01" title="" value="" min="0" style="width: ; bor der: hidden;">'+
                            '</td>'+
                            '<td>'+
                                '<input class="price text-center form-control" id="price" type="number" name="cost[]" step=".01" title="" value="" min="0" style="width: ; bor der: hidden;">'+
                            '</td>'+
                            '<td>'+
                                '<input class="item_total text-center form-control" id="subprice" name="total[]" type="number" step=".01" title="" value="" min="0" style="width: ; bor der: hidden;" readonly>'+
                            '</td>'+
                            '<td>'+
                                '<a class="btn btn-danger btn-xs ibtnDel"> <i class="fa fa-remove"></i></a>'+
                            '</td>'+
                        '</tr>';
            $("table.order-list").append(newRow);
        });
        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter --;
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
                url : "{{ route('purchase.getServices') }}",
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