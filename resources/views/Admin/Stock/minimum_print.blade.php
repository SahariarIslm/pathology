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
        @foreach ($company as $com)
        <h2>{{ $com->business_name }}</h2>
        <h6>Mobile No. : {{ Auth::user()->mobile }}</h6>
        <h6>{{ $com->address }}, {{ $com->area }}</h6>
        @endforeach
        <h4><u>Minimum Stock Report</u></h4>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL.</th>
                <th>Code</th>
                <th>Product</th>
                <th>Category</th>
                <th>Unit Type</th>
                <th>Minimum Stock</th>
                <th>Stock Quantity</th>
                <th>Cost Price</th>
                <th>Sale Price</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;?>
            @foreach ($data as $data)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $data->code }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->cat_name }}</td>
                <td>{{ $data->unit }}</td>
                <td>{{ $data->minimum }}</td>
                <td>{{ $data->quantity }}</td>
                <td>{{ $data->cost }}</td>
                <td>{{ $data->price }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" style="text-align: right;">Total :</td>
                <td>{{ $Qty }}</td>
                <td>{{ $Cost }}</td>
                <td>{{ $Price }}</td>
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