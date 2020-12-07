@extends('Master.main')
@section('title')
    Ticket Search 
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-7">Ticket Search</h1>
                            <form action="{{ route('ticket.info') }}" method="GET"> 
                                @csrf
                                <div class="col-lg-1" style="padding:0px;">
                                    <label style="float:left;">Ticket No. :</label>
                                </div>
                                <div class="col-lg-3" style="padding:0px;">
                                    <select class="selectpicker TICKET form-control" 
                                        name="ticket_no" title="Select Ticket No....."  
                                        data-style="btn-info" data-live-search="true" required>
                                        @foreach ($ticket as $tic)
                                        <option value="{{ $tic->ticket_no }}">{{ $tic->ticket_no }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-info" type="submit">
                                    <i class="fa fa-check-circle"></i>
                                </button>
                            </form>  
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        @foreach ($data as $da)
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 40%">
                                        <label>Business Name</label><br>
                                        {{ $da->b_name }}
                                    </td>
                                    <td style="width: 30%">
                                        <label>Owner Name</label><br>
                                        {{ $da->name }}
                                    </td>
                                    <td style="width: 30%">
                                        <label>Mobile</label><br>
                                        {{ $da->mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 30%">
                                        <label>Current Status</label><br>
                                        {{ $da->status }}
                                    </td>
                                    <td style="width: 40%">
                                        <label>Department</label><br>
                                        @if($da->department == 1)Billing Support
                                        @elseif($da->department == 2)Technical Support
                                        @elseif($da->department == 3)Sales Support
                                        @elseif($da->department == 4)Other Support
                                        @endif
                                    </td>
                                    <td style="width: 30%">
                                        <label>Priority</label><br>
                                        @if($da->priority == 1)Medium
                                        @elseif($da->priority == 2)High
                                        @elseif($da->priority == 3)Low
                                        @endif
                                    </td>
                                   
                                </tr>
                                <tr>
                                    <td style="width: 20%">
                                        <label>Subject</label><br>
                                        {{ $da->subject }}
                                    </td>
                                    <td style="width: 80%" colspan="2">
                                        <label>Message</label><br>
                                        {{ $da->message }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Status</th>
                                        <th>Updated By</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    @foreach ($info as $in)
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $in->status }}</td>
                                        <td>{{ $in->name }}</td>
                                        <td>{{ $in->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo">
    </script>

@endsection