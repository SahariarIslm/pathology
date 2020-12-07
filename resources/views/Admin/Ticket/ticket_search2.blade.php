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
                                    style="margin-top: 0px; margin-bottom: 0px;">
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
                            <select name="ticket_no" class="selectpicker TICKET form-control" 
                                title="Select Ticket No." required data-style="btn-info" 
                                data-live-search="true">
                                @foreach ($ticket as $dat)
                                <option value="{{ $dat->id }}">{{ $dat->ticket_no }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <label>Business Name</label>
                            <input class="form-control b_name" readonly/>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <label>Name</label>
                            <input class="form-control name" readonly/>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <label>Mobile</label>
                            <input class="form-control mobile" readonly/>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <label>Status</label>
                            <input class="form-control status" readonly/>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
                            <label>Subject *</label>
                            <input class="form-control subject" readonly/>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <label>Department *</label>
                            <input class="form-control department" readonly/>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <label>Priority *</label>
                            <input class="form-control priority" readonly/>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <label>Message *</label>
                            <textarea class="form-control message" readonly></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Created At</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}
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