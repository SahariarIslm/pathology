@extends('Master.main')
@section('title')
    Ticket List 
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-2" style="padding:0px;">Ticket List</h1>
                            <div class="col-lg-1"></div>
                            <div class="container col-lg-4">
                                @if(session('message'))
                                <div class="alert alert-dismissible alert-success text-center"
                                        style="padding-top: 0px; padding-bottom: 0px; 
                                        margin-top: 0px; margin-bottom: 0px;">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ session('message') }}</strong>
                                </div>      
                                @endif
                            </div>
                            @can('admin')
                                <a href="{{ route('ticket.add') }}" class="btn btn-info" 
                                    style="float:right;">Add Ticket
                                </a>
                            @endcan
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div id="PrimaryModalalert" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-close-area modal-close-df">
                                    <a class="close" data-dismiss="modal" href="#">
                                        <i class="fa fa-close"></i></a>
                                </div>
                                <div class="modal-header header-color-modal bg-color-1">
                                    <h4 class="modal-title">Ticket Details :
                                        <input class="ticket_no" readonly
                                            style="border:hidden; background-color:#03A9F4;"/>
                                    </h4>
                                </div>
                                <div class="modal-body" style="padding:15px;">
                                    <input class="id" type="hidden"/>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="float:left;">
                                        <label class="form-control text-left" style="border:hidden;">Business Name</label>
                                        <input class="b_name form-control text-left" style="border:hidden;" readonly/>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="float:right;">
                                        <label class="form-control text-left" style="border:hidden;">Owner Name</label>
                                        <input class="name form-control text-left" style="border:hidden;" readonly/>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="float:left;">
                                        <label class="form-control text-left" style="border:hidden;">Mobile</label>
                                        <input class="mobile form-control text-left" style="border:hidden;" readonly/>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="float:right;">
                                        <label class="form-control text-left" style="border:hidden;">Department</label>
                                        <input class="department form-control text-left" style="border:hidden;" readonly/>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="float:left;">
                                        <label class="form-control text-left" style="border:hidden;">Priority</label>
                                        <input class="priority form-control text-left" style="border:hidden;" readonly/>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="float:right;">
                                        <label class="form-control text-left" style="border:hidden;">Status</label>
                                        <input class="status form-control text-left" style="border:hidden;" readonly/>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="float:right;">
                                        <label class="form-control text-left" style="border:hidden;">Subject</label>
                                        <input class="subject form-control text-left" style="border:hidden;" readonly/>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="float:right;">
                                        <label class="form-control text-left" style="border:hidden;">Message</label>
                                        <textarea class="message form-control text-left" style="border:hidden;" readonly></textarea>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="modal-footer">
                                    <button class="btn btn-warning btn-sm" type="button" 
                                        data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            {{--  <div id="toolbar">
                                <select class="form-control">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>  --}}
                            {{--  <table id="table" data-toggle="table" data-pagination="true" 
                                    data-search="true" data-show-columns="true" 
                                    data-show-pagination-switch="true" data-show-refresh="true" 
                                    data-key-events="true" data-show-toggle="true" 
                                    data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" 
                                    data-click-to-select="true" data-toolbar="#toolbar">  --}}
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        {{--  <th data-field="state" data-checkbox="true"></th>  --}}
                                        <th class="text-center">SL.</th>
                                        <th class="text-center">Ticket No</th>
                                        <th class="text-center">Date Time</th>
                                        @can('superAdmin')
                                        <th class="text-center">Shop</th>
                                        @endcan
                                        @can('employee')
                                        <th class="text-center">Shop</th>
                                        {{--  <th data-field="name" data-editable="false">Owner Name</th>  --}}
                                        @endcan
                                        <th class="text-center">Department</th>
                                        <th class="text-center">Priority</th>
                                        <th class="text-center">Subject</th>
                                        {{--  <th data-field="message" data-editable="false">Message</th>  --}}
                                        <th class="text-center">Status</th>
                                        {{--  <th data-field="attachment" data-editable="false">Attachment</th>  --}}
                                        {{--  <th data-field="action">Action</th>  --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    @foreach ($data as $data)
                                    <tr>
                                        {{--  <td></td>  --}}
                                        <td style="text-align:center;">{{ $i++ }}.</td>
                                        <td style="text-align:center;">{{ $data->ticket_no }}</td>
                                        <td style="text-align:center;">{{ $data->created_at }}</td>
                                        @can('employee')
                                        <td style="text-align:center;">{{ $data->b_name }}</td>
                                        @endcan
                                        @can('superAdmin')
                                        <td style="text-align:center;">
                                            {{ $data->b_name }} <br>
                                            {{-- <small>{{ $data->name }}</small> --}}
                                        </td>
                                        {{--  <td style="text-align:center;">{{ $data->name }}</td>  --}}
                                        @endcan
                                        <td style="text-align:center;">
                                            @if($data->department == 1)Billing Support
                                            @elseif($data->department == 2)Technical Support
                                            @elseif($data->department == 3)Sales Support
                                            @elseif($data->department == 4)Other Support
                                            @endif
                                        </td>
                                        <td style="text-align:center;">
                                            @if($data->priority == 1)Medium
                                            @elseif($data->priority == 2)High
                                            @elseif($data->priority == 3)Low
                                            @endif
                                        </td>
                                        {{-- <td style="text-align:center;">{{ $data->subject }}
                                            {{ $data->subject }} <br>
                                            <small>{{ $data->message }}</small> 
                                        </td> --}}
                                        {{--  <td style="text-align:center;">{{ $data->message }}</td>  --}}
                                        
                                        @can('admin')
                                        <td style="text-align:center;">
                                            {{ $data->subject }} <br>
                                            <small>{{ $data->message }}</small> 
                                        </td>
                                        <td style="text-align:center;">{{ $data->status }}</td>
                                        @endcan
                                        {{--  <td style="text-align:center;">
                                            <img src="{{ asset($data->attachment) }}" alt="Attachment"
                                                style="height:80px; width:160px;"/>
                                        </td>  --}}
                                        @can('employee')
                                        <td style="text-align:center;">{{ $data->subject }}</td>
                                        <td style="text-align:center;" class="form-inline">
                                            <button type="button" value="{{ $data->id }}"
                                                class="btn btn-info VIEW btn-sm" data-toggle="modal" 
                                                data-target="#PrimaryModalalert">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <select title="{{ $data->ticket_no }}" class="STU form-control">
                                                <option value="">{{ $data->status }}</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Working">Working</option>
                                                <option value="Solved">Solved</option>
                                                <option value="Canceled">Canceled</option>
                                            </select>
                                        </td>
                                        @endcan
                                        @can('superAdmin')
                                        <td style="text-align:center;">
                                            {{ $data->subject }} <br>
                                        </td>
                                        <td style="text-align:center;" class="form-inline">
                                            <button type="button" value="{{ $data->id }}"
                                                class="btn btn-info VIEW btn-sm" data-toggle="modal" 
                                                data-target="#PrimaryModalalert">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <select title="{{ $data->ticket_no }}" class="STU form-control">
                                                <option value="">{{ $data->status }}</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Working">Working</option>
                                                <option value="Solved">Solved</option>
                                                <option value="Canceled">Canceled</option>
                                            </select>
                                                {{--  <button data-toggle="dropdown" style="border-radius:3px;"
                                                            class="btn btn-xs btn-success dropdown-toggle" 
                                                            type="button" aria-expanded="false">
                                                        @if($data->status == 1)Pending
                                                        @elseif($data->status == 2)Working
                                                        @elseif($data->status == 2)Solved
                                                        @elseif($data->status == 2)Canceled
                                                        @endif
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{ route('ticket.status',['id'=>$data->id])}}" 
                                                            title="Make Manager ??">Working</a></li>
                                                        <li><a href="{{ route('ticket.status',['id'=>$data->id])}}" 
                                                            title="Make Employee ??">Solved</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="{{ route('ticket.status',['id'=>$data->id])}}" 
                                                            title="Make Inactive ??">Canceled</a></li>
                                                </ul>  --}}
                                        </td>
                                        {{--  <td class="datatable-ct text-center">
                                            @if($data->status == 1)
                                                <a href="{{ route('ticket.status',['id'=>$data->id])}}" 
                                                    class="btn btn-warning btn-xs"
                                                    onclick="return confirm('You Want To Change Ticket Status ??')">
                                                    <i class="fa fa-arrow-down" 
                                                    title="Change Ticket Status to Inactive ??"></i>
                                                </a>
                                            @elseif($data->status == 0)
                                                <a href="{{ route('ticket.status',['id'=>$data->id])}}" 
                                                    class="btn btn-success btn-xs"
                                                    onclick="return confirm('You Want To Change Ticket Status ??')">
                                                    <i class="fa fa-arrow-up" 
                                                    title="Change Ticket Status to Active ??"></i>
                                                </a>
                                            @endif
                                        </td>  --}}
                                        @endcan
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

    <script>
        $('.STU').on('change',function(){
            var id  = $(this).attr("title");
            var value  = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{ route('ticket.status') }}',
                data: { id:id, status:value }, 
                success: function(data){ 
                    alert('You Want to Change Status to "'+ value +'" ?');
                    location.reload();
                }
            });
        });
    </script>

    <script>
        $('.VIEW').on('click', function () {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('ticket.edit') }}",
                data: { id: id  },
                success: function (data) 
                {
                    $('.id').val(data[0]['id']);
                    $('.ticket_no').val(data[0]['ticket_no']);
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
    </script>

@endsection