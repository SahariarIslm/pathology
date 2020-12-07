@extends('Master.main')
@section('title')
    All Customer Due Report (A/C Receiveable)
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 style="float: left;">All Customer Due Report <small>(A/C Receiveable)</span></h1>
                            <button type="button" class="Print btn btn-primary btn-sm" 
                                style="float: right;"><i class="fa fa-print"></i>
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            {{-- <div id="toolbar" class="form-inline">
                                <form action="{{ route('shop.payment.datewise.report') }}" method="get" name="Repo"> 
                                    @csrf
                                    <select class="form-control" name="supplier" required>
                                        <option value="All">All</option>
                                        <option value="Cash">Cash</option>
                                        @foreach ($supli as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
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
                            </div> --}}
                            <div id="toolbar">
                                <select class="form-control">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
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
                                        <th data-field="date" data-editable="false">Date</th>
                                        <th data-field="invoice" data-editable="false">Sale Invoice</th>
                                        <th data-field="name" data-editable="false">Customer</th>
                                        <th data-field="paid" data-editable="false">Paid</th>
                                        <th data-field="due" data-editable="false">Due</th>
                                        <th data-field="amount" data-editable="false">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($collection as $data)
                                    <tr>
                                        <td></td>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $data->date }}</td>
                                        <td>{{ $data->invoice }}</td>
                                        <td>
                                            @if($data->name == null)Cash
                                            @else {{ $data->name }}
                                            @endif
                                        </td>
                                        <td>{{ $data->paid }}</td>
                                        <td>{{ $data->due }}</td>
                                        <td>{{ $data->amount }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr style="font-weight: bolder; font-size: 13px;">
                                        <td colspan="5" style="text-align: right;">Total : </td>
                                        <td>{{ $Paid }}</td>
                                        <td>{{ $Due }}</td>
                                        <td>{{ $Amou }}</td>
                                    </tr>
                                </tfoot>
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
                url: "{{ route('due.customer.print') }}",
                type: 'GET',
                success: function (){
                    window.open('{{ route('due.customer.print') }}','_blank');
                }
            });
        });
    </script>

    {{-- <script>
        document.forms['Repo'].elements['supplier'].value = '{{ $supplier }}';
    </script> --}}

@endsection