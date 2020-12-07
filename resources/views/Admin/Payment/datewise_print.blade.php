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
        {{-- <h1>{{ config('app.name') }}</h1> --}}
        @foreach ($company as $data)
        <h2>{{ $data->business_name }}</h2>
        <h6>Mobile No. : {{ Auth::user()->mobile }}</h6>
        <h6>{{ $data->address }}, {{ $data->area }}</h6>
        @endforeach
        <h3><u>Payment Report ( Supplier & Date Wise )</u></h3>
        <h5>Supplier : {{ $supplier }}</h5>
        <h5>From Date : {{ $fromdate }}  &nbsp;&nbsp; To Date : {{ $todate }}</h5>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL.</th>
                <th>Date</th>
                <th>Purchase No.</th>
                <th>Supplier</th>
                <th>Paid</th>
                <th>Due</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($payment as $data)
            <tr>
                <td>{{ $i++ }}.</td>
                <td>{{ $data->date }}</td>
                <td>{{ $data->purchase_no }}</td>
                <td>
                    @if($data->suppli == null)Cash
                    @else {{ $data->suppli }}
                    @endif
                </td>
                <td>{{ $data->paid }}</td>
                <td>{{ $data->due }}</td>
                <td>{{ $data->amount }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr style="font-weight: bolder; font-size: 13px;">
                <td colspan="4" style="text-align: right;">Total : </td>
                <td>{{ $Paid }}</td>
                <td>{{ $Due }}</td>
                <td>{{ $Amou }}</td>
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