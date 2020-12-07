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
                            <h1 class="col-lg-2" style="padding:0px;">Ticket Search</h1>
                            <div class="col-lg-1"></div>
                            <div class="container col-lg-4">
                                @if(session('message'))
                                <div class="alert alert-dismissible alert-success text-center"
                                        style="margin-top:0px; margin-bottom:0px;">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ session('message') }}</strong>
                                </div>      
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <label>Ticket No.</label>
                            <form action="{{ route('ticket.info') }}" method="GET"> 
                                @csrf
                                <div class="form-inline row">
                                    <select class="col-lg-10 selectpicker TICKET form- control" 
                                        name="ticket_no" title="Select Ticket No....."  
                                        data-style="btn-info" data-live-search="true" required>
                                        @foreach ($ticket as $tic)
                                        <option value="{{ $tic->ticket_no }}">{{ $tic->ticket_no }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-info" type="submit">
                                        <i class="fa fa-check-circle"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div>
                        @foreach ($data as $da)
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                <label>Business Name</label>
                                <br>
                                {{ $da->b_name }}
                                {{-- <input class="form-control b_name" 
                                    value="{{ $da->b_name }}" readonly/> --}}
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                <label>Name</label>
                                <br>
                                {{ $da->name }}
                                {{-- <input class="form-control name" 
                                    value="{{ $da->name }}" readonly/> --}}
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                <label>Mobile</label>
                                <br>
                                {{ $da->mobile }}
                                {{-- <input class="form-control mobile" 
                                    value="{{ $da->mobile }}" readonly/> --}}
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                <label>Current Status</label>
                                <br>
                                {{ $da->status }}
                                {{-- <input class="form-control status" 
                                    value="{{ $da->status }}" readonly/> --}}
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
                                <label>Subject</label>
                                <br>
                                {{ $da->subject }}
                                {{-- <input class="form-control subject" 
                                    value="{{ $da->subject }}" readonly/> --}}
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                <label>Department</label>
                                <br>
                                @if($da->department == 1)Billing Support
                                @elseif($da->department == 2)Technical Support
                                @elseif($da->department == 3)Sales Support
                                @elseif($da->department == 4)Other Support
                                @endif
                                {{-- <input class="form-control department" 
                                    value="{{ $da->department }}" readonly/> --}}
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                <label>Priority</label>
                                <br>
                                @if($da->priority == 1)Medium
                                @elseif($da->priority == 2)High
                                @elseif($da->priority == 3)Low
                                @endif
                                {{-- <input class="form-control priority" 
                                    value="{{ $da->priority }}" readonly/> --}}
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <label>Message</label>
                                <br>
                                {{ $da->message }}
                                {{-- <textarea class="form-control message" 
                                    value="{{ $da->message }}" readonly></textarea> --}}
                            </div>
                        @endforeach
                        </div>
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
                        {{-- <div class="col-lg-2"></div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <img src="{{ asset('/public') }}/FrontEnd/images/img_3.jpg" 
                                alt="Attachment" style="height:200px; width:300px;"/>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo">
    </script>

    <script>
        $(document).ready(function () {
            $('.TICKET').on('change', function () {
                var id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('ticket.details') }}",
                    data: { id: id },
                    success: function (data) {
                        $('.b_name').val(data[0]['b_name']);
                        $('.name').val(data[0]['name']);
                        $('.mobile').val(data[0]['mobile']);
                        $('.subject').val(data[0]['subject']);
                        $('.message').val(data[0]['message']);
                        $('.status').val(data[0]['status']);
                        $('.created_at').val(data[0]['created_at']);
                        $('.statuses').val(data[0]['status']);
                        if(data[0]['department']===1){ $('.department').val('Billing Support') }
                        if(data[0]['department']===2){ $('.department').val('Technical Support') }
                        if(data[0]['department']===3){ $('.department').val('Sales Support') }
                        if(data[0]['department']===4){ $('.department').val('Other Support') }
                        if(data[0]['priority']===1){ $('.priority').val('Medium') }
                        if(data[0]['priority']===2){ $('.priority').val('High') }
                        if(data[0]['priority']===3){ $('.priority').val('Low') }
                    }
                });
            });
        });
    </script>

@endsection