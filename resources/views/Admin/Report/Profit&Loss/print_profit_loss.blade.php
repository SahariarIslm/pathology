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
        <h4>Profit & Loss Report</h4>
        From : {{ $fromdate }} &nbsp;-&nbsp; To : {{ $todate }}
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <th>SL.</th>
            <th>Description</th>
            <th>Amount (Tk.)</th>
            <th>Balance (Tk.)</th>
        </thead>
        <tbody>
            <?php $i = 1;?>
            <tr>
                <td >{{ $i++ }}.</td>
                <td >Total Sales</td>
                <td >{{ $tSal }}</td>
                <td ></td>
            </tr>
            <tr>
                <td>{{ $i++ }}.</td>
                <td>Total Purchase</td>
                <td >{{ $tPur }}</td>
                <td class=" "></td>
            </tr>
            <tr>
                <td>{{ $i++ }}.</td>
                <td><b>Gross Profit</b></td>
                <td class=" "></td>
                <td class=" "><b>{{ $gPft }}</b></td>
            </tr>
            <tr>
                <td>{{ $i++ }}.</td>
                <td>Total Expense</td>
                <td class=" ">{{ $tExp }}</td>
                <td class="  "></td>
            </tr>
            <tr>
                <td>{{ $i++ }}.</td>
                <td><b>Profit & Loss</b></td>
                <td class=" "></td>
                <td class=" "><b>{{ $pLos }}</b></td>
            </tr>
        </tbody>
    </table>
    <br><br>
    <div class="container">
        <div style="float:right; border-top:1px dashed black;">
            Authorized Sign
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