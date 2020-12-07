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
        <h1>{{ config('app.name') }}</h1>
        <h3><u>Date Wise Reference Payment Report</u></h3>
        <h5>Reference : {{ $reference }}</h5>
        <h5>From Date : {{ $todate }} &nbsp;&nbsp; To Date : {{ $todate }}</h5>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL.</th>
                <th>Date</th>
                <th>Reference</th>
                <th>Mobile</th>
                <th>Shop</th>
                <th>Collection</th>
                <th>Payment</th>
                <th>Comment</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;?>
            @foreach ($data as $data)
            <tr>
                <td>{{ $i++ }}.</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->reference }}</td>
                <td>{{ $data->mobile }}</td>
                <td>{{ $data->shop }}</td>
                <td>{{ $data->collection }}</td>
                <td>{{ $data->payment }}</td>
                <td>{{ $data->comment }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
    <div class="container">
        <div style="float:left; border-top:1px dashed black;">
            Manager Sign
        </div>
        <div style="float:right; border-top:1px dashed black;">
            Admin Sign
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