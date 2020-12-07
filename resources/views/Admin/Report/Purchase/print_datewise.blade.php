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
        <h4>Date Wise Purchase Report</h4>
        From : {{ $fromdate }} &nbsp;-&nbsp; To : {{ $todate }}
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL.</th>
                <th>Date</th>
                <th>Purchase No.</th>
                <th>Supplier</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;?>
            @foreach ($data as $data)
            <tr>
                <td>{{ $i++ }}.</td>
                <td>{{ $data->date }}</td>
                <td>{{ $data->purchase_no }}</td>
                <td>
                    @if($data->supplie == null)
                        Cash
                    @else
                        {{ $data->supplie }}
                    @endif
                </td>
                <td>{{ $data->totalQty }}</td>
                <td>{{ $data->payable }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align:right;">Total :</td>
                <td>{{ $Qty }}</td>
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