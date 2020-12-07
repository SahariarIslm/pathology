@extends('Master.main')
@section('title')
    Patients
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-4 p-0" style="padding:0px;">
                                Patient<span class="table-project-n"></span> List
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
                            @can('admin')
                            <button type="button" class="btn btn-info col-lg-2 Primary" style="float:right;" 
                                data-toggle="modal" data-target="#PrimaryModalalert">Add Patient
                            </button>
                            @endcan
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div id="PrimaryModalalert" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('customer.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#">
                                            <i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">Add Patient Info</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">
                                                        ID <span class="table-project-n">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" name="p_id" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">
                                                        Name <span class="table-project-n">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" name="name" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">
                                                        Address <span class="table-project-n"></span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" name="address" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">
                                                       Age <span class="table-project-n"></span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="number" name="age" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">
                                                       Gender <span class="table-project-n">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <select class="form-control custom-select-value" name="gender" required>
                                                        <option value="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">
                                                        Mobile *<span class="table-project-n"></span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" name="mobile" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">
                                                        District <span class="table-project-n"></span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" name="district" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-warning btn-sm" type="button"data-dismiss="modal">Close</button>
                                        <button class="btn btn-danger btn-sm" type="reset">Clear</button>
                                        <button class="btn btn-success btn-sm" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="InformationproModalhdbgcl" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header header-color-modal bg-color-1">
                                    <h4 class="modal-title">Edit Patient Info</h4>
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                </div>
                                <form action="{{ route('customer.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#">
                                            <i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">
                                                        ID <span class="table-project-n">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" name="name" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">
                                                        Name <span class="table-project-n">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" name="name" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">
                                                        Address <span class="table-project-n">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" name="licence" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">
                                                       Age <span class="table-project-n"></span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" name="model_no" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">
                                                       Gender <span class="table-project-n">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <select class="form-control custom-select-value" name="vehicle_type_id" required>
                                                        <option value="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">
                                                        Mobile <span class="table-project-n">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" name="mobile" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">
                                                        District <span class="table-project-n"></span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" name="mobile" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-warning btn-sm" type="button"data-dismiss="modal">Close</button>
                                        <button class="btn btn-danger btn-sm" type="reset">Clear</button>
                                        <button class="btn btn-success btn-sm" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

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
                                    data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="sl">Id</th>
                                        <th data-field="name" data-editable="false">Name</th>
                                        <th data-field="address" data-editable="false">Address</th>
                                        <th data-field="age" data-editable="false">Age</th>
                                        <th data-field="gender" data-editable="false">Gender</th>
                                        <th data-field="mobile" data-editable="false">Mobile</th>
                                        <th data-field="address" data-editable="false">District</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    @foreach ($data as $data)
                                    <tr>
                                        <td></td>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ @$data->name }}</td>
                                        <td>{{ @$data->address }}</td>
                                        <td>{{ @$data->age}}</td>
                                        <td>{{ @$data->gender }}</td>
                                        <td>{{ @$data->mobile }}</td>
                                        <td>{{ @$data->district }}</td>
                                        <td class="datatable-ct w-25" style="width:25%;">
                                            <button type="button" value="{{ $data->id }}"
                                                class="btn btn-primary ediT btn-xs" 
                                                data-toggle="modal" 
                                                data-target="#InformationproModalhdbgcl">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            
                                            <a href="{{route('customer.destroy',$data->id)}}" class="btn btn-danger deletE btn-xs"><i class="fa fa-trash-o"></i></a>
                                            @if($data->status == "1")
                                                <a href="{{route('customer.status',['id'=>$data->id])}}" 
                                                    class="btn btn-warning btn-xs"
                                                    onclick="return confirm('Are You Sure You Want To Change Customer Status ??')">
                                                    <i class="fa fa-arrow-down" 
                                                    title="Change Customer Status to Inactive ??"></i>
                                                </a>
                                            @elseif($data->status == "0")
                                                <a href="{{route('customer.status',['id'=>$data->id])}}" 
                                                    class="btn btn-success btn-xs"
                                                    onclick="return confirm('Are You Sure You Want To Change Customer Status ??')">
                                                    <i class="fa fa-arrow-up" 
                                                    title="Change Customer Status to Active ??"></i>
                                                </a>
                                            @endif
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
        $('.ediT').on('click', function () {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('customer.edit') }}",
                data: {id: id},
                success: function (data) {
                    $('.id').val(data[0]['id']);
                    $('.name').val(data[0]['name']);
                    $('.licence').val(data[0]['licence']);
                    $('.model_no').val(data[0]['model_no']);
                    $('.vehicle_type_id').val(data[0]['vehicle_type_id']);
                    $('.parking_group_id').val(data[0]['parking_group_id']);
                    $('.mobile').val(data[0]['mobile']);
                    $('.color').val(data[0]['color']);
                    $('.address').val(data[0]['address']);
                }
            });
        });
        $('#updatE').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('customer.update') }}",
                data: {
                    '_token'         : $('input[name=_token]').val(),
                    'id'             : $(".id").val(),
                    'name'           : $(".name").val(),
                    'licence'        : $(".licence").val(),
                    'model_no'       : $(".model_no").val(),
                    'vehicle_type_id': $(".vehicle_type_id").val(),
                    'mobile'         : $(".mobile").val(),
                    'color'          : $(".color").val(),
                    'address'        : $(".address").val(),
                },
                success: function () {
                    $('#InformationproModalhdbgcl').modal('hide');
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                    alert('Data Not Saved');
                }
            });
        });
    });
</script>



@endsection