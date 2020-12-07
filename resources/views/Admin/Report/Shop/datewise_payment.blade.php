@extends('Master.main')
@section('title')
    Shop Payment List Date Wise
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Shop Payment List <small>( Date Wise )</span></h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar" class="form-inline">
                                <form action="{{ route('shop.payment.datewise') }}" method="get"> 
                                    @csrf
                                    <select class="form-control">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                    <label> From : </label>
                                    <input type="date" value="{{ $fromdate }}" name="fromdate" class="form-control" required/>
                                    <label> To : </label>
                                    <input type="date" value="{{ $todate }}" name="todate" class="form-control" required/>
                                    <button type="submit" class="btn btn-success btn-sm">Load</button>
                                    {{--  <button type="button" class="Print btn btn-primary btn-sm">
                                        <i class="fa fa-print"></i>
                                    </button>  --}}
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
                                        <th data-field="date" data-editable="false">Pay Date</th>
                                        <th data-field="business_name" data-editable="false">Shop</th>
                                        <th data-field="package" data-editable="false">Package</th>
                                        <th data-field="days" data-editable="false">Days</th>
                                        <th data-field="comment" data-editable="false">Comment</th>
                                        <th data-field="number" data-editable="false">Transaction</th>
                                        <th data-field="price" data-editable="false">Price (Tk.)</th>
                                        <th data-field="com" data-editable="false">Commission (Tk.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; $com = 0; $tCom = 0;?>
                                    @foreach ($data as $data)
                                    <tr>
                                        <td></td>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $data->date }}</td>
                                        <td>{{ $data->business_name }}</td>
                                        <td>{{ $data->package }}</td>
                                        <td>{{ $data->days }}</td>
                                        <td>{{ $data->comment }}</td>
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
                                        <td colspan="8" class="text-right"><b>Total : </b></td>
                                        <td><b>{{ $total }}</b></td>
                                        {{--  <td></td>  --}}
                                        <td><b>{{ $tCom }}</b></td>
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
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"></script>

<script>
    $('.Print').click(function () {
        $.ajax({
            url: "{{ route('shop.payment.datewise.print') }}",
            type: 'GET',
            success: function (){
                window.open('{{ route('shop.payment.datewise.print') }}','_blank');
            }
        });
    });
</script>

@endsection