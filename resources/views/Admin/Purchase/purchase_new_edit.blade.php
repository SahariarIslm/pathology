@extends('Master.main')
@section('title')
    Purchase Edit
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
                                Purchase Edit
                                {{--  <small> ( Purchase No. : <span style="color: blue;">
                                    <input type="text" readonly class="purchase_no" 
                                        style="width: auto; border: hidden;"/>
                                    </span> )
                                </small>  --}}
                            </h1>
                            <div class="col-lg-2." style="float:right;">
                                <label style="font-size: 20px;">Bill (Tk) : </label>
                                <input type="text" readonly id="bil" class="bill" 
                                    style="font-size: 25px; color: red; font-weight: bold; 
                                    width: 100px; border: hidden;"/>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                    <form action="" method="POST" name=""> 
                        @csrf
                            <div class="col-lg-3">
                                <label>Purchase No. : </label>
                                <select type="text" data-live-search="true" data-style="btn-warning"
                                    title="Select Purchase No. ...."
                                    class="selectpicker form-control PurchNO">
                                    @foreach($data as $data)
                                    <option value="{{ $data->purchase_no }}">
                                        {{ $data->purchase_no }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Product List : </label>
                                <select type="text" data-live-search="true" 
                                    title="Select Product from the List ...." data-style="btn-info"
                                    class="selectpicker form-control iTEmCoDe">
                                    @foreach($product as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->name }} ( {{ $product->code}} )
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label>Supplier :</label>
                                <input class="form-control supplier" readonly>
                                    {{--  @if($data->supplie == null)
                                    <input class="form-control" name="supplier" type="text"
                                        value="Cash" readonly>
                                    @else
                                    <input class="form-control" name="supplier" type="text"
                                        value="{{ $data->supplie }}" readonly>
                                    @endif  --}}
                            </div>
                            {{--  <div class="col-lg-2">
                                <label>Mobile No. :</label>
                                <input class="form-control" value="{{ $data->mobil }}" readonly/>
                            </div>  --}}
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Purchase Date :</label>
                                    <input class="form-control p_date" type="date" readonly>
                                </div>
                            </div>
                            
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Payment By : </label>
                                    <input class="form-control p_type" readonly>
                                </div>
                            </div>
                            <div class="col-lg-8" style="overflow: scroll; height: 320px;">
                                <table class="table table-bordered tbl" id="new_r_tbl">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">SL.</th>
                                            <th style="text-align: center;">Name</th>
                                            <th style="text-align: center;">Code</th>
                                            <th style="text-align: center;">Qty</th>
                                            <th style="text-align: center;">Cost</th>
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
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    <input class="iTEmQty text-center" 
                                                        type="number" title="{{ $item->id }}"
                                                        value="{{ $item->quantity }}"
                                                        style="width: ; border:hidden;">
                                                </td>
                                                <td>
                                                    <input class="iTEmPrice text-center" 
                                                        type="number" title="{{ $item->id }}"
                                                        value="{{ $item->price }}"
                                                        style="width: ; border:hidden;"/>
                                                </td>
                                                <td>{{ $item->getPriceSum() }}</td>
                                                <td>
                                                    <a class="btn btn-danger btn-xs" 
                                                        href="{{ route('purchase.edit.remove',['id'=>$item->id]) }}"
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
                                        <label>Total Qty : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input class="form-control TQty" readonly
                                            value="{{ Cart::getTotalQuantity() }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Sub Total : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input class="form-control SubTotal" 
                                            value="{{ Cart::getTotal() }}" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Discount : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-4" style="padding-right:0px;">
                                        <input class="form-control disc" required>
                                    </div>
                                    <div class="col-lg-2" style="padding-left:0px;">
                                        <select class="form-control discType d_type" 
                                            style="padding:0px;">
                                            <option id="p" value="%">%</option>
                                            <option id="t" value="TK">TK</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Payable : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input class="form-control totalunt" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Paid : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input class="pAmount form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Return : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input class="rAmount form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6 text-right">
                                        <label>Due : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input class="dAmount form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-success btn-block btn-sm"
                                        onclick="return confirm('You want to edit this Purchase ??');">
                                        <b>Purchase Edit Confirm</b>
                                    </button>
                                    <a class="btn btn-warn ing btn-block btn-sm"
                                        onclick="return confirm('Are you sure You want to clear this ??');"
                                        href="{{ route('purchase.clean') }}" type="GET" >Clear
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
            $('.PurchNO').change(function (){
                var id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('purchase.edit.search') }}",
                    data: { id: id },
                    success: function (data) {
                        {{--  location.reload();  --}}
                        $('.purchase_no').val(data[0]['purchase_no']);
                        $('.p_date').val(data[0]['date']);
                        $('.p_type').val(data[0]['p_type']);
                        $('.supplier').val(data[0]['supp']);
                        $('.totalQty').val(data[0]['TQty']);
                        $('.subTotal').val(data[0]['SubTotal']);
                        $('.d_type').val(data[0]['d_type']);
                        $('.disc').val(data[0]['discount']);
                        $('.totalunt').val(data[0]['payable']);
                        $('.pAmount').val(data[0]['paid']);
                        $('.rAmount').val(data[0]['return']);
                        $('.dAmount').val(data[0]['due']);
                    }
                });
            });
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
    </script>
    <script>
        $('.iTEmCoDe').change(function (){
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: '{{ route('purchase.edit.item') }}',
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
                url: '{{ route('purchase.edit.qty') }}',
                data: { 
                        "_token": "{{ csrf_token() }}",
                        'id'    : id ,
                        'qty'   : qty ,
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
                url: '{{ route('purchase.edit.price') }}',
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
                    url: '{{ route('purchase.edit.clean') }}',
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
            $(".totalunt").val(Math.round(totalP));
            $('.bill').val(Math.round(totalP));
        }
        $(".disc").on('keyup', doStuff);
        $(".discType").on('change', doStuff);
        $('.SubTotal').on('keyup', doStuff());
        function doIt() {
            var ro = 0;
            var pa = $('.pAmount').val();
            var tp = $('.totalunt').val();
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
        $(".totalunt").on('change', doIt);
        $(".disc").on('keyup', doIt);
        $(".discType").on('change', doIt);
        $('.SubTotal').on('keyup', doIt);
    </script>

@endsection