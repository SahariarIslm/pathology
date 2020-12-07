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
        <h4><u>Purchase Invoice</u></h4>
    </div>
    <div style="text-align:center;">
        @foreach($data as $dat)
        <div class="col-4" style="float:left; text-align:left;">
            <b>Invoice Date : </b>  {{ $dat->date }} <br>
            <b>Invoice No. : </b>  {{ $dat->purchase_no }} <br>
            <b>Purchase By : </b>  {{ $dat->user }}
        </div>
        <div class="col-6" style="float:right; text-align:right;">
            <b>Supplier : </b> {{ $dat->supplie }}
            <p>{{ $dat->mobil }}<br>
                {{ $dat->addres }}</p>
        </div>
        @break
        @endforeach
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>SL.</th>
                <th>Date</th>
                <th>Item</th>
                <th>Code</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;?>
            @foreach ($info as $inf)
            <tr>
                <td>{{ $i++ }}.</td>
                <td>{{ $inf->date }}</td>
                <td>{{ $inf->name }}</td>
                <td>{{ $inf->code }}</td>
                <td>{{ $inf->qty }}</td>
                <td>{{ $inf->cost }}</td>
                <td>{{ $inf->total }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align:right;">Total :</td>
                <td>{{ $Qty }}</td>
                <td></td>
                <td>{{ $Total }}</td>
            </tr>
        </tfoot>
    </table>
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