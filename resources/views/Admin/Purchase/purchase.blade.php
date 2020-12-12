@extends('Master.main')
@section('title')
    Pathology Bill
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
                                Sale No.&nbsp;
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
                            <div class="col-lg-2" style="float:right;">
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
                         <form action="{{ route('purchase.submit') }}" method="POST"> 
                            @csrf
                            <div class="col-lg-2">
                                <label>Patient: </label>
                                <select type="text" data-live-search="true" name="patient_id" id="patient" title="Select Patient ....."
                                    class="selectpicker form-control patient" data-style="btn-info">
                                    @foreach($patient as $patient)
                                        <option value="{{ $patient->id }}">
                                            {{ $patient->name }} 
                                        </option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="sale_no" class="sale_no" 
                                    value="INV{{ $bata }}"/>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Gender: </label>
                                    <select class="form-control custom-select-value gender" id="gender" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label>Mobile No. :</label>
                                <input class="form-control mobile" id="mobile" name="mobile" readonly/>
                            </div>
                            <div class="col-lg-2">
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
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Reference Discount :</label>
                                    <input class="form-control r_discount" type="number" id="r_discount" name="r_discount"
                                        value="">
                                </div>
                            </div>
                            <div class="col-lg-2">
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
                                            <th style="text-align: center;width: 250px;">Name</th>
                                            <th style="text-align: center;">Code</th>
                                            <th style="text-align: center;">Qty</th>
                                            <th style="text-align: center;">MRP</th>
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
                                        <label>Sub Total : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <input type="text" style="text-align:center;" 
                                            value="" readonly
                                            class="subTotal form-control" name="subTotal">
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
                                        <label>Ref. Amount: &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <input type="text" style="text-align:center;" readonly
                                            value="" name="commission"
                                            class="col-lg-6 reference form-control">
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

                    var phone = $("#mobile").val('');
                    var reference_id = $("#reference_id").val('');
                    var gender = $("#gender").val('');
                    var r_discount = $("#r_discount").val('');
                    phone.val(response.clientInfo.mobile);
                    reference_id.val(response.clientInfo.reference_id);
                    gender.val(response.clientInfo.gender);
                    r_discount.val(response.clientInfo.r_discount);
                },
                error: function(response) {
                }
            }); 
        });

        var counter = 0;
        $("#addrow").on("click", function () {
            counter++;
            var newRow= '<tr id="test_row_'+counter+'" data-id="'+counter+'">'+
                            '<td>'+
                                '<select class="form-control SUP test_id" id="test_id" name="test_id[]" required>'+
                                    '<option value="">Select Test</option>'+
                                    @foreach($tests as $test)
                                    '<option value="{{$test->id}}">{{$test->name}}</option>'+
                                    @endforeach
                                '</select>'+
                            '</td>'+
                              '<td>'+
                                '<input class="code text-center form-control" id="code" name="code[]" type="text" value=""style="width: ; border: hidden;" readonly>'+
                            '</td>'+
                            '<td>'+
                                '<input class="qty text-center form-control" min="0" id="qty" name="qty[]" type="number" step=".0001" title="" value="" min="0" style="width: ; bor der: hidden;">'+
                            '</td>'+
                            '<td>'+
                                '<input class="mrp text-center form-control" id="mrp" min="0" type="number" name="mrp[]" step=".0001" title="" value="" min="0" style="width: ; bor der: hidden;">'+
                            '</td>'+
                            '<td>'+
                                '<input class="item_total_amount text-center form-control" min="0" id="total" name="total[]" type="number" step=".00001" title="" value="" min="0" style="width: ; bor der: hidden;" readonly>'+
                            '</td>'+
                            '<td>'+
                                '<a class="btn btn-danger btn-xs ibtnDel"> <i class="fa fa-remove"></i></a>'+
                            '</td>'+
                        '</tr>';
            $("table.order-list").append(newRow);

            $('#test_row_'+counter).find('.test_id').on("change",function(){
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                var test_id = $('#test_row_'+counter).find('.test_id').val();
                 $.ajax({
                    type: "POST",
                    url : "{{ route('purchase.getTests') }}",
                    data : 
                        {
                            test_id:test_id,
                        },
                    success: function(response) {
                        var sub_total = 0;
                        var code  = $('#test_row_'+counter).find('.code').val('');
                        var mrp   = $('#test_row_'+counter).find('.mrp').val('');
                        var item_total_amount = $('#test_row_'+counter).find('.item_total_amount').val('');
                        var qty   = $('#test_row_'+counter).find('.qty').val('');

                        code.val(response.test[0].code);
                        mrp.val(response.test[0].mrp);
                        qty.val(1);
                        var totalPrice = parseFloat(qty.val()) * parseFloat(mrp.val());
                        item_total_amount.val(totalPrice);

                        $(".item_total_amount").each(function(){
                            var item_total_amount = parseFloat($(this).val());
                            sub_total += isNaN(item_total_amount) ? 0 : item_total_amount;
                            $('.subTotal').val(sub_total);
                        });

                    },
                    error: function(response) {
                    }
                });  
            });

            $('#test_row_'+counter).find('#qty').on("keyup",function(){
                var item_total_amount = $('#test_row_'+counter).find('.item_total_amount').val('');
                var totalPrice = parseFloat($('#test_row_'+counter).find('#qty').val()) * parseFloat($('#test_row_'+counter).find('#mrp').val());
                item_total_amount.val(totalPrice);
            });

            $('#test_row_'+counter).find('#mrp').on("keyup",function(){
                var item_total_amount = $('#test_row_'+counter).find('.item_total_amount').val('');
                var totalPrice = parseFloat($('#test_row_'+counter).find('#qty').val()) * parseFloat($('#test_row_'+counter).find('#mrp').val());
                item_total_amount.val(totalPrice);
            });

        });


        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter --;
        });
        function doStuff() {
            var d = $('.disc').val();
            var s = $('.subTotal').val() ;
            var r = $('.r_discount').val();

            if ($(".discType").children(":selected").attr("id") == 't') {   
                
                var totalP = s - d;   

            } else {
                
                var totald = (s * d) / 100;
                var totalP = s - totald;
            }

            var totalb = totalP; 

            if(r > 0){
                totalr = (totalb * r) / 100;
            }else{
                totalr = 0;
            }
            
            $(".reference").val(Math.round(totalr));
            $(".totalamount").val(Math.round(totalb));
            $('.bill').val(Math.round(totalb));
        }
        
        $(".disc").on('keyup', doStuff);
        $(".discType").on('change', doStuff);
        $('.subTotal').on('keyup', doStuff());


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
        $(".r_discount").on('keyup', doStuff);
        $(".disc").on('keyup', doIt);
        $(".discType").on('change', doIt);
        $('.subTotal').on('keyup', doIt);

    });
    </script>


@endsection