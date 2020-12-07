@extends('Master.main')
@section('title')
    Purchase Cancel Confirm Details
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                @foreach($data as $data)
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-5" style="padding:0px;">
                                Purchase Cancel Confirm Details
                            </h1>
                            <div class="col-lg-2." style="float:right;">
                                <label style="font-size: 20px;">Bill (Tk) : </label>
                                <input type="text" value="{{ $data->subTotal }}" readonly
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
                            <label>Purchase No : </label>
                            <input class="form-control" name="purchase_no"
                                value="{{ $data->purchase_no }}" readonly/>
                        </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Cancel Date :</label>
                                    <input class="form-control" type="date" name="date"
                                        value="<?php echo date('Y-m-d');?>" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label>Supplier :</label>
                                    @if($data->supplie == null)
                                    <input class="form-control" name="supplier" type="text"
                                        value="Cash" readonly>
                                    @else
                                    <input class="form-control" name="supplier" type="text"
                                        value="{{ $data->supplie }}" readonly>
                                    @endif
                                    <input value="{{ $data->ID }}" name="supplier_id" type="hidden">
                            </div>
                            <div class="col-lg-2">
                                <label>Mobile No. :</label>
                                <input class="form-control" value="{{ $data->mobil }}" readonly/>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Purchase Date :</label>
                                    <input class="form-control" name="p_date" type="date"
                                        value="{{ $data->date }}" readonly>
                                </div>
                            </div>
                            
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Payment By : </label>
                                    <input class="form-control" value="{{ $data->p_type }}" readonly>
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
                                        @foreach($details as $item) 
                                            <tr style="text-align: center;">
                                                <td>{{ $i++ }}.</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->code }}
                                                    <input type="hidden" name="itemcode" value="{{ $item->code }}">
                                                </td>
                                                <td>{{ $item->qty }}
                                                    <input type="hidden" name="itemqty" value="{{ $item->qty }}">
                                                </td>
                                                <td>{{ $item->cost }}</td>
                                                <td>{{ $item->total }}</td>
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
                                        <input value="{{ $data->totalQty }}" 
                                        name="totalQty" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Sub Total : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input value="{{ $data->subTotal }}" 
                                            name="subTotal" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Discount : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-4" style="padding-right:0px;">
                                        <input value="{{ $data->discount }}"class="form-control" readonly>
                                    </div>
                                    <div class="col-lg-2" style="padding-left:0px;">
                                        <input value="{{ $data->d_type }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Payable : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input value="{{ $data->payable }}" class="form-control"
                                            name="payable" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Paid : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input value="{{ $data->paid }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <label>Return : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input value="{{ $data->return }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6 text-right">
                                        <label>Due : &nbsp;</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input value="{{ $data->due }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-danger btn-block btn-sm"
                                        onclick="return confirm('You want to Cancel this Purchase ??');">
                                        <b>Purchase Cancel Confirm</b>
                                    </button>
                                    <a class="col-lg-2 btn btn-default btn-block btn-sm" type="GET"
                                        href="{{ route('purchase.cancel.index') }}">Back
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>


@endsection