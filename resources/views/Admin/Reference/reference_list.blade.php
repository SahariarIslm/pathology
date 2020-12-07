@extends('Master.main')
@section('title')
    Reference
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-3" style="padding:0px;">Shop Reference List</h1>
                            <div class="container col-lg-5">
                                @if(session('message'))
                                <div class="alert alert-dismissible alert-success text-center"
                                    style="padding-top:0px; padding-bottom:0px; margin:0px;">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ session('message') }}</strong>
                                </div>      
                                @endif
                            </div>
                            <button type="button" class="btn btn-info col-lg-2" style="float:right;" 
                                data-toggle="modal" data-target="#PrimaryModalalert">Register Reference
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div id="PrimaryModalalert" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <form action="{{ route('shop.reference.store') }}" method="POST">
                                @csrf
                                <div class="modal-close-area modal-close-df">
                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                </div>
                                <div class="modal-header header-color-modal bg-color-1">
                                    <h4 class="modal-title">Register Shop Reference</h4>
                                </div>
                                <div class="modal-body" style="padding-bottom:0px; margin-bottom:0px; padding-top:20px;">
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Reference Name <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="name" autocomplete="name"
                                                    class="form-control" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Mobile <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input id="mobile" type="number" name="mobile"
                                                    class="form-control" 
                                                    value="{{ old('mobile') }}" required 
                                                    autocomplete="mobile" placeholder="016100000000">
                                                {{--  @error('mobile')
                                                    <span class="invalid-feedback help-block small" role="alert">
                                                        <strong style="color:red;">{{ $message }}</strong>
                                                    </span>
                                                @enderror  --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Area <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <select name="area" class="form-control" required>
                                                    <option value="">----- Select Area -----</option>
                                                    @foreach ($districts as $district)
                                                    <option value="{{ $district->name }}">{{ $district->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Address <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="address" autocomplete="address"
                                                    class="form-control" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Bkash <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input id="bkash" type="number" name="bkash"
                                                    class="form-control" value="{{ old('bkash') }}" required 
                                                    autocomplete="bkash" placeholder="014100000000">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Email <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input id="email" type="email" name="email"
                                                    class="form-control" value="{{ old('email') }}" required 
                                                    autocomplete="email" placeholder="example@gmail.com">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Password <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input id="password" type="password" name="password" 
                                                    class="form-control @error('password') is-invalid @enderror" 
                                                    placeholder="Password at least 8 character" 
                                                    required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback help-block small" role="alert">
                                                        <strong style="color:red;">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Confirm Password<span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input id="password-confirm" type="password" 
                                                    required placeholder="Confirm Password" 
                                                    name="password_confirmation" class="form-control" 
                                                    autocomplete="new-password">
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
                                    <h4 class="modal-title">Edit Reference Info</h4>
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#">
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </div>
                                </div>
                            <form action="{{ route('reference.update') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" class="id" name="id"/>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Name <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="name" required 
                                                    class="name form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Area <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <select name="area" class="form-control area" required>
                                                    <option value="">----- Select Area -----</option>
                                                    @foreach ($districts as $district)
                                                    <option value="{{ $district->name }}">{{ $district->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Address <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="address"
                                                    class="form-control address" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Bkash <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input type="number" name="bkash"
                                                    class="form-control bkash" required 
                                                    autocomplete="bkash" placeholder="017177000000">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    New Password <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input id="password" type="password" name="password" 
                                                    class="form-control @error('password') is-invalid @enderror" 
                                                    placeholder="Password at least 8 character" 
                                                    required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback help-block small" role="alert">
                                                        <strong style="color:red;">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Confirm Password<span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input id="password-confirm" type="password" 
                                                    required placeholder="Confirm Password" 
                                                    name="password_confirmation" class="form-control" 
                                                    autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                                    <button class="btn btn-success btn-sm" type="submit">Update</button>
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
                                        <th data-field="sl">SL</th>
                                        <th data-field="name" data-editable="false">Name</th>
                                        <th data-field="mobile" data-editable="false">Mobile</th>
                                        <th data-field="email" data-editable="false">Email</th>
                                        <th data-field="reference_no" data-editable="false">Bkash</th>
                                        <th data-field="area" data-editable="false">Area</th>
                                        <th data-field="address" data-editable="false">Address</th>
                                        <th data-field="status" data-editable="false">Status</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    @foreach ($data as $data)
                                    <tr>
                                        <td></td>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->mobile }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->bkash_no }}</td>
                                        <td>{{ $data->area }}</td>
                                        <td>{{ $data->address }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td class="datatable-ct">
                                            <button type="button" value="{{ $data->id }}"
                                                class="btn btn-primary ediT btn-xs" data-toggle="modal" 
                                                data-target="#InformationproModalhdbgcl">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            @if($data->status == "Active")
                                                <a href="{{ route('shop.reference.status',['id'=>$data->id])}}" 
                                                    class="btn btn-warning btn-xs"
                                                    onclick="return confirm('Are You Sure You Want To Change Reference Status ??')">
                                                    <i class="fa fa-arrow-down" 
                                                    title="Change Reference Status to Inactive ??"></i>
                                                </a>
                                            @elseif($data->status == "Inactive")
                                                <a href="{{ route('shop.reference.status',['id'=>$data->id])}}" 
                                                    class="btn btn-success btn-xs"
                                                    onclick="return confirm('Are You Sure You Want To Change Reference Status ??')">
                                                    <i class="fa fa-arrow-up" 
                                                    title="Change Reference Status to Active ??"></i>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $('.ediT').on('click', function () {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('reference.edit') }}",
                data: { id: id  },
                success: function (data) {
                    $('.id').val(data[0]['user_id']);
                    $('.name').val(data[0]['name']);
                    $('.area').val(data[0]['area']);
                    $('.address').val(data[0]['address']);
                    $('.bkash').val(data[0]['bkash_no']);
                }
            });
        });
        $('#updatE').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('reference.update') }}",
                data: {
                    '_token'    : $('input[name=_token]').val(),
                    'id'        : $(".id").val(),
                    'name'      : $(".name").val(),
                    'role'      : $(".role").val(),
                    'password'  : $("#password").val(),
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
    $('.deletE').on('click', function () {
        var id = $(this).data("id");
        $.ajax(
            {
                url: "{{ route('employee.destroy') }}",
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
</script>

@endsection