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
        @foreach ($company as $data)
        <h2>{{ $data->business_name }}</h2>
        <h6>Mobile No. : {{ Auth::user()->mobile }}</h6>
        <h6>{{ $data->address }}, {{ $data->area }}</h6>
        @endforeach
        <h4>Delivery System Wise Collection Report</h4>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL.</th>
                <th>Date</th>
                <th>Delivery</th>
                <th>Customer</th>
                <th>Invoice</th>
                <th>Total Sale</th>
                <th>Paid</th>
                <th>Due</th>
                <th>Last Collection</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;?>
            @foreach ($data as $data)
            <tr>
                <td>{{ $i++ }}.</td>
                <td>{{ $data->date }}</td>
                <td>{{ $data->deliver }}</td>
                <td>{{ $data->custo }}</td>
                <td>{{ $data->invoice }}</td>
                <td>{{ $data->paid + $data->due }}</td>
                <td>{{ $data->paid }}</td>
                <td>{{ $data->due }}</td>
                <td>{{ $data->amount }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" style="text-align:right;">Total : &nbsp;</td>
                <td> &nbsp; {{ $Paid }}</td>
                <td> &nbsp; {{ $Due }}</td>
                <td></td>
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