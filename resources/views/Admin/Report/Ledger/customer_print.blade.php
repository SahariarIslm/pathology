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
        <h4><u>Patient Ledger Report</u></h4>
        <h6>Patient : {{ $customer }} &nbsp;&nbsp; Mobile : {{ $mobile }}</h6>
        <h6>From : {{ $fromdate }} &nbsp;-&nbsp; To : {{ $todate }}</h6>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <th>SL.</th>
            <th>Date</th>
            <th>Perticulars</th>
            <th>Invoice</th>
            <th class="text-right">Debit (Tk.)</th>
            <th class="text-right">Credit (Tk.)</th>
            <th class="text-right">Balance (Tk.)</th>
        </thead>
        <tbody>
            <?php $i = 1;?>
            @foreach ($debit as $data)
            <tr>
                <td>{{ $i++ }}.</td>
                <td>{{ $data->date }}</td>
                <td>Sales</td>
                <td>{{ $data->sale_no }}</td>
                <td style="text-align: right;">{{ $data->payable }}</td>
                <td style="text-align: right;">0</td>
                <td></td>
            </tr>
            @endforeach
            @foreach ($credT as $data)
            <tr>
                <td>{{ $i++ }}.</td>
                <td>{{ $data->s_date }}</td>
                <td>Sales Cancel</td>
                <td>{{ $data->sale_no }}</td>
                <td style="text-align: right;">0</td>
                <td style="text-align: right;">{{ $data->subTotal }}</td>
                <td></td>
            </tr>
            @endforeach
            @foreach ($credit as $data)
            <tr>
                <td>{{ $i++ }}.</td>
                <td>{{ $data->date }}</td>
                <td>Collection</td>
                <td>{{ $data->invoice }}</td>
                <td style="text-align: right;">0</td>
                <td style="text-align: right;">{{ $data->paid }}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="text-right">
                <td colspan="4" >Total Amount : </td>
                <td>{{ $tDebit }}</td>
                <td>{{ $newCre }}</td>
                <td>{{ $tBalance }}</td>
            </tr>
        </tfoot>
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