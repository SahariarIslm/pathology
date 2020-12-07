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
        <h3><u>Shop List 7 Days Left to Expire Report</u></h3>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL.</th>
                <th>Shop Name</th>
                <th>Owner Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Area</th>
                <th>Business Type</th>
                <th>Expiry Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;?>
            @foreach ($data as $data)
            <?php
                $ay = $data->paydate;
                $no = $data->exdays;
                $pay = date('Y-m-d', strtotime($ay. ' + '. $no .'days'));
                $wrg = date('Y-m-d', strtotime($pay. '- 7 days'));
            ?>
            @if($today >= $wrg && $today <=$pay)
            <tr>
                <td>{{ $i++ }}.</td>
                <td>{{ $data->business_name }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->mobile }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->area }}</td>
                <td>{{ $data->b_type }}</td>
                <td>{{ $pay }}</td>
                <td>{{ $data->status }}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
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