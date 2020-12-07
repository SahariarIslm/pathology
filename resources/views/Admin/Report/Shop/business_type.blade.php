@extends('Master.main')
@section('title')
    Shop List Business Type Wise
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Shop List <small> ( Business Type Wise ) </small></h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar" class="form-inline">
                                <form action="{{ route('shop.report.business.type.wise') }}" method="get"> 
                                    @csrf
                                    <select class="form-control">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <select class="form-control" name="status" required>
                                        <option value="">Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                    <select class="form-control" name="b_type" required>
                                        <option value="">Select Business Type</option>
                                        <option value="Computer Shop">Computer Shop</option>
                                        <option value="Book Shop">Book Shop</option>
                                        <option value="Dealership">Dealership</option>
                                        <option value="E-commerce">E-commerce</option>
                                        <option value="Fashion House">Fashion House</option>
                                        <option value="Grocery Shop">Grocery Shop</option>
                                        <option value="Mobile Shop">Mobile Shop</option>
                                        <option value="Rod, Cement, Slickon">Rod, Cement, Slickon</option>
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

@endsection