<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/bootstrap.min.css">
    <style type="text/css">
        @media print {
            @page {
                size: auto;
            }
        }
    </style>
</head>
<body onload="window.print();window.history.back()">
    <div style="text-align:center;">
        @foreach ($company as $compan)
        <h2>{{ $compan->business_name }}</h2>
        <h6>Mobile No. : {{ Auth::user()->mobile }}</h6>
        <h6>{{ $compan->address }}, {{ $compan->area }}</h6>
        @endforeach
        <h4><u>Sales Invoice</u></h4>
    </div>
    <div class="container">
        @foreach($data as $dat)
        <div class="col-4" style="float:left; text-align:left;">
            <b>Invoice Date : </b>  {{ $dat->date }} <br>
            <b>Invoice No. : </b>  {{ $dat->sale_no }} <br>
            <b>Sold By : </b>  {{ $dat->user }} <br>
        </div>
        <div class="col-6" style="float:right; text-align:right;">
            <b>Customer : </b> 
            @if($dat->name == null)
                Cash
            @else
                {{ $dat->name }}
            @endif
            <p>{{ $dat->mobile }}<br>
                {{ $dat->address }}</p>
        </div>
        @break
        @endforeach
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>SL.</th>
                <th>Description</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;?>
            @foreach ($details as $inf)
            <tr>
                <td>{{ $i++ }}.</td>
                <td>
                    {{ $inf->name }} ({{ $inf->code }})
                </td>
                <td>{{ $inf->qty }}</td>
                <td>{{ $inf->price }}</td>
                <td>{{ $inf->total }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            @foreach($data as $dat)
            <tr>
                <td colspan="4" style="text-align:right;">Total Quantity :</td>
                <td>{{ $dat->totalQty }}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:right;">Sub Total :</td>
                <td>{{ $dat->subTotal }}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:right;">Discount :</td>
                <td>{{ $dat->discount }} {{ $dat->d_type }}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:right;">Delivery Charge :</td>
                <td>{{ $dat->dCharge }}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:right;">Total Payable :</td>
                <td>{{ $dat->payable }}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:right;">Paid Amount :</td>
                <td>{{ $dat->paid }}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:right;">Return Amount :</td>
                <td>{{ $dat->return }}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:right;">Due Amount :</td>
                <td>{{ $dat->due }}</td>
            </tr>
            @break
            @endforeach
        </tfoot>
    </table>
    <br><br><br><br>
    <div class="container">
        <div style="float:right; border-top:1px dashed black;">
            Authorized Sign
        </div>
        <div style="float:left; border-top:1px dashed black;">
            Customer Sign
        </div>
    </div>
    <div class="navbar-fixed-bottom">
        <div style="float:left;">
                Printed By : {{ config('app.name') }}
        </div>
        <div style="float:right;">
            <?php echo "Date & Time : " . date("D, d M Y h:i:s a"); ?>
        </div>
    </div>
</body>
</html>