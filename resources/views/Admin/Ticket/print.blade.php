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
        <h3><u>Ticket Report ( Status & Date Wise )</u></h3>
        <h5>Status : {{ $status }}</h5>
        <h5>From Date : {{ $fromdate }}  &nbsp;&nbsp; To Date : {{ $todate }}</h5>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL.</th>
                <th>Ticket No.</th>
                <th>Date Time</th>
                <th>Shop Name</th>
                <th>Owner Name</th>
                <th>Department</th>
                <th>Priority</th>
                <th>Subject</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($data as $data)
            <tr>
                <td>{{ $i++ }}.</td>
                <td>{{ $data->ticket_no }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->b_name }}</td>
                <td>{{ $data->name }}</td>
                <td>
                    @if($data->department == 1)Billing Support
                    @elseif($data->department == 2)Technical Support
                    @elseif($data->department == 3)Sales Support
                    @elseif($data->department == 4)Other Support
                    @endif
                </td>
                <td>
                    @if($data->priority == 1)Medium
                    @elseif($data->priority == 2)High
                    @elseif($data->priority == 3)Low
                    @endif
                </td>
                <td>{{ $data->subject }}</td>
                <td>{{ $data->status }}</td>
            </tr>
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