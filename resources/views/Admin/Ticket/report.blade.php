@extends('Master.main')
@section('title')
    Ticket Report Status & Date Wise
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Ticket Report <small>( Status & Date Wise )</span></h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar" class="form-inline">
                                <form action="{{ route('ticket.report') }}" method="get" name="Repo"> 
                                    @csrf
                                    <select class="form-control" name="status" required>
                                        <option value="All">All</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Working">Working</option>
                                        <option value="Solved">Solved</option>
                                        <option value="Canceled">Canceled</option>
                                    </select>
                                    <label>&nbsp; From : </label>
                                    <input type="date" value="{{ $fromdate }}" name="fromdate" class="form-control" required/>
                                    <label>&nbsp; To : </label>
                                    <input type="date" value="{{ $todate }}" name="todate" class="form-control" required/>
                                    <button type="submit" class="btn btn-success btn- sm">Load</button>
                                    <button type="button" class="Print btn btn-primary btn- sm">
                                        <i class="fa fa-print"></i>
                                    </button>
                                </form>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" 
                                    data-search="true" data-show-columns="true" 
                                    data-show-pagination-switch="true" data-show-refresh="true" 
                                    data-key-events="true" data-show-toggle="true" 
                                    data-resizable="false" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" 
                                    data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="sl">SL.</th>
                                        <th data-field="Ticket No" data-editable="false">Ticket No.</th>
                                        <th data-field="Date Time" data-editable="false">Date Time</th>
                                        <th data-field="Shop Name" data-editable="false">Shop Name</th>
                                        <th data-field="Owner Name" data-editable="false">Owner Name</th>
                                        <th data-field="Department" data-editable="false">Department</th>
                                        <th data-field="Priority" data-editable="false">Priority</th>
                                        <th data-field="Subject" data-editable="false">Subject</th>
                                        <th data-field="Status" data-editable="false">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($data as $data)
                                    <tr>
                                        <td></td>
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
        $('.Print').click(function () {
            $.ajax({
                url: "{{ route('ticket.report.print') }}",
                type: 'GET',
                success: function (){
                    window.open('{{ route('ticket.report.print') }}','_blank');
                }
            });
        });
    </script>

    <script>
        document.forms['Repo'].elements['status'].value = '{{ $status }}';
    </script>

@endsection