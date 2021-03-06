<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        .text {
            text-align: center;
            font-family: monospace;
        }

        .left-align {
            float: left;
        }

        .tbl {
            padding-right: 10px;
            width: 10px;
            float: left;
            text-align: right;
            font-family: monospace;
        }

        .tbl1 {
            padding-left: 10px;
            padding-right: 10px;
            width: 100px;
            float: left;
            text-align: left;
            font-family: monospace;
        }

        .tbl2 {
            width: 100px;
            float: left;
            text-align: center;
            font-family: monospace;
        }

        .tbl3 {
            width: 80px;
            float: left;
            text-align: center;
            font-family: monospace;
        }

        @media print {
            @page {
                size: auto;
            }
        }
    </style>
</head>

<body onload="window.print();window.history.back()" style="width: 550px; min-height: 750px;">
        @foreach ($company as $com)
        <div class="text" style="width:500px; text-align:center;">
            <b style="font-size:23px;">{{ $com->business_name }}</b>
            <br>{{ $com->address }}, {{ $com->area }}
            <br>Mobile No.: {{ Auth::user()->mobile }}
        </div>
        @endforeach
        @foreach($data as $data)
        <div class="text" style="width:500px; border-top: 1px solid;">
            <div class="center-align">
                    Invoice: <b>{{ $data->sale_no }}</b>
                    <br>
                    Date: {{ $data->created_at }}
                    <br>
                    Sold By: {{ $data->user }}
            </div>
        </div>
        <div class="text" style="width:500px; border-top: 1px solid; height:20px; ">
            <div style="float: left; text-align: left;">
                    Name: 
                    @if($data->custom == null)
                        Cash
                    @else
                        {{ $data->custom }}
                    @endif
                    <br> Mobile: {{ $data->mobil }}
            </div>
        </div>
        <br>
        <div class="text" style="width:500px; border-top: 1px solid;">
            <div class="tbl">SL.</div>
            <div class="tbl1">Description</div>
            <div class="tbl3">Room</div>
            <div class="tbl3">Qty.</div>
            <div class="tbl2">Price</div>
            <div class="tbl2">Total</div>
            <br>
            <br>
            <?php $i = 1; ?>
            @foreach($details as $item)
                <div class="tbl">{{ $i++ }}.</div>
                <div class="tbl1" style="font-size: 12px;">{{ $item->name }}
                    ({{$item->code}})
                </div>
                <div class="tbl3">{{ $item->room }}</div>
                <div class="tbl3">{{ $item->qty }}</div>
                <div class="tbl2">{{ $item->price }}</div>
                <div class="tbl2">{{ $item->total }}</div>
                <br><br>
            @endforeach
            <div class="text" style=" border-top: 1px solid;">
                <div>
                    <div class="text" style="float: right;">Total Quantity
                        : {{ $data->totalQty  }}</div>
                    <br>
                    <div class="text" style="float: right;">Sub Total
                        : {{ $data->subTotal  }} Tk</div>
                    <br>
                    <div class="text" style="float: right;">Discount 
                        : {{ $data->discount }} {{ $data->d_type }} </div>
                    <br>
                    <div class="text" style="float: right;">Total Payable
                        : {{ $data->payable  }} Tk</div>
                    <br>
                    <div class="text" style="float: right;">Paid Amount
                        : {{ $data->paid  }} Tk</div>
                    <br>
                    <div class="text" style="float: right;">Return Amount
                        : {{ $data->return  }} Tk</div>
                    <br>
                    <div class="text" style="float: right;">Due Amount
                        : {{ $data->due  }} Tk</div>
                    <br>
                </div>
                <div class="col-md-12">
                    <h4 style="text-align: center;">Develop By www.creativesoftware.com.bd</h4>
                </div>
            </div>
        </div>
        @break
        @endforeach
</body>
</html>