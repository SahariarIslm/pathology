@extends('Master.main')
@section('title')
    Parking Price 
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-4 p-0"  style="padding:0px;">
                                Parking Price <span class="table-project-n"></span>
                            </h1>
                            <div class="container col-lg-4">
                                @if(session('success'))
                                <div class="alert alert-dismissible alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ session('success') }}</strong>
                                </div>      
                                @elseif(session('message'))
                                <div class="alert alert-dismissible alert-info">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ session('message') }}</strong>
                                </div>  
                                @elseif(session('danger'))
                                <div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ session('danger') }}</strong>
                                </div>      
                                @endif
                            </div>
                            <a class="btn btn-info col-lg-2 Primary" style="float:right;" href="{{ route('parking_price.create') }}" role="button">Add Price</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
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
                                    data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" 
                                    data-click-to-select="true" data-toolbar="#toolbar" style="width: 1100px; margin-left: 10px">
                                <thead>
                                    <tr>
                                        
                                        <th data-field="sl">SL</th>
                                        <th data-field="delivery_id" data-editable="false">Parking Zone</th>
                                        <th data-field="parking_group_id" data-editable="false">Parking Group</th>
                                        <th data-field="vehicle_category_id" data-editable="false">Vehicle type</th>
                                        <th data-field="category" data-editable="false">price</th>
                                        <th data-field="medicine_unit" data-editable="false">penalty</th>
                                        <th data-field="min_stock" data-editable="false">details</th>
                                        <th data-field="status" data-editable="false">status</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ @$data->delivery->name }}</td>
                                        <td>{{ @$data->parkingGroup->name }}</td>
                                        <td>{{ @$data->vehicleCategory->name }}</td>
                                        <td>{{ @$data->price }}</td>
                                        <td>{{ @$data->penalty }}</td>
                                        <td>{{ @$data->details }}</td>
                                        <td>@if(@$data->status == 1)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                        <td class="datatable-ct w-25">
                                            <a href="{{route('parking_price.edit',$data->id)}}"class="btn btn-primary ediT btn-xs"><i class="fa fa-edit"></i></a>
                                            @if($data->status == "1")
                                                <a href="{{route('parking_price.status',['id'=>$data->id])}}" 
                                                    class="btn btn-warning btn-xs"
                                                    onclick="return confirm('Are You Sure You Want To Change Product Status ??')">
                                                    <i class="fa fa-arrow-down" 
                                                    title="Change Product Status to Inactive ??"></i>
                                                </a>
                                            @elseif($data->status == "0")
                                                <a href="{{route('parking_price.status',['id'=>$data->id])}}" 
                                                    class="btn btn-success btn-xs"
                                                    onclick="return confirm('Are You Sure You Want To Change Product Status ??')">
                                                    <i class="fa fa-arrow-up" 
                                                    title="Change Product Status to Active ??"></i>
                                                </a>
                                            @endif
                                            @can('admin')
                                            <button class="btn btn-danger deletE btn-xs"
                                                data-id="{{ $data->id }}">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                            @endcan
                                        </td>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('.deletE').on('click', function () {
        var id = $(this).data("id");
        $.ajax(
            {
                url: "{{ route('parking_price.destroy') }}",
                type: 'GET',
                data: {
                    "id": id,
                },
                success: function (){
                    console.log("Data Deleted Successfully");
                    location.reload();
                }
            });
        });  
    });
</script>

@endsection