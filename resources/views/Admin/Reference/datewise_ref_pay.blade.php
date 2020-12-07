@extends('Master.main')
@section('title')
    Date Wise Reference Payment Report
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Reference Payment Report <small>( Date Wise )</span></h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar" class="form-inline">
                                <form action="{{ route('reference.payment.report') }}" 
                                    method="get" name="Repo"> @csrf
                                    <select class="form-control" name="status" required>
                                        <option value="All">All</option>
                                        @foreach ($reference as $ref)
                                        <option value="{{ $ref->id }}">{{ $ref->name }}</option>
                                        @endforeach
                                    </select>
                                    <label>&nbsp; From : </label>
                                    <input type="date" value="{{ $fromdate }}" name="fromdate" class="form-control" required/>
                                    <label>&nbsp; To : </label>
                                    <input type="date" value="{{ $todate }}" name="todate" class="form-control" required/>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <button type="button" class="Print btn btn-primary">
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
                                        <th data-field="Date" data-editable="false">Date</th> 
                                        <th data-field="Reference" data-editable="false">Reference</th> 
                                        <th data-field="Mobile" data-editable="false">Mobile</th> 
                                        <th data-field="Shop" data-editable="false">Shop</th> 
                                        <th data-field="Collection" data-editable="false">Collection</th> 
                                        <th data-field="Payment" data-editable="false">Payment</th> 
                                        <th data-field="Comment" data-editable="false">Comment</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($data as $data)
                                    <tr>
                                        <td></td>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>{{ $data->reference }}</td>
                                        <td>{{ $data->mobile }}</td>
                                        <td>{{ $data->shop }}</td>
                                        <td>{{ $data->collection }}</td>
                                        <td>{{ $data->payment }}</td>
                                        <td>{{ $data->comment }}</td>
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
                url: "{{ route('reference.payment.print') }}",
                type: 'GET',
                success: function (){
                    window.open('{{ route('reference.payment.print') }}','_blank');
                }
            });
        });
    </script>

    <script>
        document.forms['Repo'].elements['status'].value = '{{ $status }}';
    </script>

@endsection