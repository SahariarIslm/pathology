@extends('Master.main')
@section('title')
    Shop List Area Wise
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Shop List <small> ( Area Wise ) </small></h1>
                            {{--  <div class="container col-lg-4">
                                @if(session('message'))
                                <div class="alert alert-dismissible alert-success text-center"
                                    style="padding-top:0px; padding-bottom:0px; margin:0px;">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ session('message') }}</strong>
                                </div>      
                                @endif
                            </div>  --}}
                            {{--  <form action="{{ route('shop.report.area.wise') }}" method="get"
                                style="float:right;" target="_blank"> @csrf
                                <input type="hidden" name="area" value="{{ $area }}"/>
                                <input type="hidden" name="status" value="{{ $status }}"/>
                                <button type="submit"class="btn btn-primary btn-sm">
                                    <i class="fa fa-print"></i>
                                </button>
                            </form>  --}}
                            {{--  <form action="{{ route('shop.report.area.wise') }}" method="get"> @csrf
                                <div class="col-lg-2">
                                    <select class="form-control" name="status" required>
                                        <option value="">Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select class="form-control" name="area" required>
                                        <option value="">Select Area</option>
                                        @foreach ($districts as $district)
                                        <option value="{{ $district->name }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Load</button>
                            </form>  --}}
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar" class="form-inline">
                                <form action="{{ route('shop.report.area.wise') }}" method="get"> 
                                    @csrf
                                    <select class="form-control" name="status" required>
                                        <option value="">Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                    <select class="selectpicker" name="area" 
                                        title="Select Area ..." required
                                        data-live-search="true" data-style="btn-info">
                                        @foreach ($districts as $district)
                                        <option value="{{ $district->name }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-success">Load</button>
                                </form>
                            </div>

                            <table id="table" data-toggle="table" data-pagination="true" 
                                    data-search="true" data-show-columns="true" 
                                    data-show-pagination-switch="true" data-show-refresh="true" 
                                    data-key-events="true" data-show-toggle="true" 
                                    data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" 
                                    data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="sl">SL.</th>
                                        <th data-field="business_name" data-editable="false">Shop Name</th>
                                        <th data-field="name" data-editable="false">Owner name</th>
                                        <th data-field="mobile" data-editable="false">Mobile</th>
                                        <th data-field="email" data-editable="false">Email</th>
                                        <th data-field="area" data-editable="false">Area</th>
                                        <th data-field="address" data-editable="false">Address</th>
                                        <th data-field="business_type" data-editable="false">Business Type</th>
                                        <th data-field="status" data-editable="false">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    @foreach ($shop as $data)
                                    <tr>
                                        <td></td>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $data->business_name }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->mobile }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->area }}</td>
                                        <td>{{ $data->address }}</td>
                                        <td>{{ $data->business_type }}</td>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>

@endsection