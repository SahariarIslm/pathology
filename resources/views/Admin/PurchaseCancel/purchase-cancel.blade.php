@extends('Master.main')
@section('title')
    Purchase Cancel
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
                                Purchase Cancel
                            </h1>
                            {{-- <div class="col-lg-5">
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
                            </div> --}}
                            <div class="col-lg-2." style="float:right;">
                                <label>Bill (Tk) : </label>
                                <input type="text" class="subTotal" value="" readonly
                                    style="font-size: 25px; color: red; font-weight: bold; 
                                    width: 100px; border: hidden;"/>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                        <form action="{{ route('purchase.cancel.confirm') }}" method="POST"> 
                            @csrf
                            <div class="col-lg-2">
                                <label>Purchase List : </label>
                                <select type="text" data-live-search="true" 
                                    name="purchase_no" title="Search Purchase No ...."
                                    class="selectpicker form-control PURCHASEN" data-style="btn-info">
                                    @foreach($data as $data)
                                    <option value="{{ $data->purchase_no }}">{{ $data->purchase_no}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Cancel Date :</label>
                                    <input class="form-control" type="date" name="date"
                                        value="<?php echo date('Y-m-d');?>">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label>Supplier :</label>
                                @if(null)
                                <input class="form-control" name="supplier" type="text"
                                    value="Cash" readonly>
                                @else
                                <input class="form-control supplier" name="supplier" 
                                    type="text" readonly>
                                @endif
                                
                            </div>
                            <div class="col-lg-2">
                                <label>Mobile No. :</label>
                                <input type="text" class="form-control mobile" name="mobile" readonly/>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Purchase Date :</label>
                                    <input class="form-control date" name="p_date" readonly>
                                </div>
                            </div>
                            
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Payment By : </label>
                                    <input class="form-control p_type" type="text" readonly>
                                </div>
                            </div>
                            <div class="col-lg-8" style="overflow: scroll; height: 320px;">
                                <table class="table table-bordered tbl">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">SL.</th>
                                            <th style="text-align: center;">Name</th>
                                            <th style="text-align: center;">Code</th>
                                            <th style="text-align: center;">Qty</th>
                                            <th style="text-align: center;">Cost</th>
                                            <th style="text-align: center;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        {{-- @foreach($details as $item) 
                                            <tr style="text-align: center;">
                                                <td>{{ $i++ }}.</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->cost }}</td>
                                                <td>{{ $item->total }}</td>
                                            </tr>
                                        @endforeach  --}}
                                        @foreach(Cart::getContent() as $item)
                                            <tr style="text-align: center;">
                                                <td>{{ $i++ }}.</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->attributes->total }}</td>
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
                                    <div class="col-lg-6 text-right">
                                        <input name="totalQty" class="totalQty form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Sub Total : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <input name="subTotal" class="subTotal form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Discount : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-4 text-right" style="padding-right:0px;">
                                        <input type="number" class="form-control discount" readonly>
                                    </div>
                                    <div class="col-lg-2" style="padding-left:0px;">
                                        <input type="text" class="form-control d_type" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Payable : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <input type="text" class="payable form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Paid : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <input type="number" class="paid form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Return : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <input type="text" class="form-control return" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6 text-right">
                                        <label>Due : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <input type="text" class="form-control due" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="col-lg-10 btn btn-warning btn-sm"
                                        onclick="return confirm('You want to Cancel this Purchase ??');">
                                        <b style="font-size: ;">Purchase Cancel Confirm</b>
                                    </button>
                                    <a class="col-lg-2 btn btn-info btn-sm" style="font-size: ;"
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
    $('.PURCHASEN').change(function () {
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "{{ route('purchase.cancel.add') }}",
            data: { 
                "_token": "{{ csrf_token() }}",
                'id'    : id 
            },
            success: function (data) {
                $('.id').val(data[0]['id']);
                $('.supplier').val(data[0]['supplie']);
                $('.mobile').val(data[0]['mobil']);
                $('.p_type').val(data[0]['p_type']);
                $('.date').val(data[0]['date']);
                $('.totalQty').val(data[0]['totalQty']);
                $('.subTotal').val(data[0]['subTotal']);
                $('.discount').val(data[0]['discount']);
                $('.d_type').val(data[0]['d_type']);
                $('.payable').val(data[0]['payable']);
                $('.paid').val(data[0]['paid']);
                $('.return').val(data[0]['return']);
                $('.due').val(data[0]['due']);
                $('.code').val(data[0]['code']);
                $('.name').val(data[0]['name']);
                $('.qty').val(data[0]['qty']);
                $('.cost').val(data[0]['cost']);
                $('.total').val(data[0]['total']);
            }
        });
    });

</script>
@endsection