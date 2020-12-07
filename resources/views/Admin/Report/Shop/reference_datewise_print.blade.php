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
        <h3><u>Reference Wise Payment List</u></h3>
        <h5>Reference : {{ $reference }}</h5>
        <h5>From Date : {{ $fromdate }}  &nbsp;&nbsp; To Date : {{ $todate }}</h5>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL.</th>
                <th>Pay Date</th>
                <th>Shop</th>
                <th>Package</th>
                <th>Days</th>
                {{-- <th>Comment</th> --}}
                <th>Transaction</th>
                <th>Price (Tk.)</th>
                <th>Commission (Tk.)</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; $com = 0; $tCom = 0;?>
            @foreach ($shop as $data)
            <tr>
                <td>{{ $i++ }}.</td>
                <td>{{ $data->date }}</td>
                <td>{{ $data->shopname }}</td>
                <td>{{ $data->package }}</td>
                <td>{{ $data->days }}</td>
                {{-- <td>{{ $data->comment }}</td> --}}
                <td>{{ $data->type }} - {{ $data->number }}</td>
                <td>{{ $data->price }}</td>
                <?php $com = ($data->price/100)*10; ?>
                <td>{{ $com }}</td>
            </tr>
            <?php $tCom += $com; ?>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="text-right"><b>Total : </b></td>
                <td><b>{{ $total }}</b></td>
                <td><b>{{ $tCom }}</b></td>
            </tr>
        </tfoot>
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