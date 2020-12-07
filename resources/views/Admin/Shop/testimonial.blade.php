@extends('Master.main')
@section('title')
    Testimonial List 
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-2" style="padding:0px;">Testimonial List</h1>
                            <div class="container col-lg-4">
                                @if(session('message'))
                                    <div class="alert alert-dismissible alert-success"
                                        style="padding-top: 0px; padding-bottom: 0px; 
                                        margin-top: 0px; margin-bottom: 0px;">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ session('message') }}</strong>
                                    </div>      
                                @endif
                            </div>
                            @can('admin')
                                <button type="button" class="btn btn-info col-lg-2" style="float:right;" 
                                    data-toggle="modal" data-target="#PrimaryModalalert">Add Testimonial
                                </button>
                            @endcan
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div id="PrimaryModalalert" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <form action="{{ route('testimonial.store') }}" method="POST" 
                                    enctype="multipart/form-data"> @csrf
                                <div class="modal-close-area modal-close-df">
                                    <a class="close" data-dismiss="modal" href="#">
                                        <i class="fa fa-close"></i></a>
                                </div>
                                <div class="modal-header header-color-modal bg-color-1">
                                    <h4 class="modal-title">Add Testimonial</h4>
                                </div>
                                <div class="modal-body">
                                    {{-- <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Business Name
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input value="{{ Auth::user()->business_name }}"
                                                    name="b_name" class="form-control" readonly/>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Owner Name <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input value="{{ Auth::user()->name }}" name="name" 
                                                    class="form-control" type="text" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Comment <span class="table-project-n">*</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <textarea name="comment" class="form-control" 
                                                    style="height: 120px;" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">
                                                    Picture
                                                </label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input type="file" name="picture" class="form-control"> 
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
                                    <tr style="text-align:center;">
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th  data-field="sl">SL.</th>
                                        @can('superAdmin')
                                        <th data-field="b_name" data-editable="false">Business Name</th>
                                        <th data-field="name" data-editable="false">Owner Name</th>
                                        @endcan
                                        <th data-field="comment" data-editable="false">Comment</th>
                                        <th data-field="picture" data-editable="false">Picture</th>
                                        <th data-field="status" data-editable="false">Status</th>
                                        @can('superAdmin')
                                        <th data-field="action">Action</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    @foreach ($data as $data)
                                    <tr class="text-center" style="text-align:center;">
                                        <td></td>
                                        <td style="text-align:center;">{{ $i++ }}.</td>
                                        @can('superAdmin')
                                        <td style="text-align:center;">{{ $data->b_name }}</td>
                                        <td style="text-align:center;">{{ $data->name }}</td>
                                        @endcan
                                        <td style="text-align:center;">{{ $data->comment }}</td>
                                        <td class="text-center" style="text-align:center;">
                                            <img src="{{ asset($data->picture) }}" alt="Testimonial Picture"
                                                style="height:80px; width:160px;"/>
                                        </td>
                                        <td class="text-center">
                                            @if($data->status == 0)Inactive
                                            @elseif($data->status == 1)Active
                                            @endif
                                        </td>
                                        @can('superAdmin')
                                        <td class="datatable-ct" class="text-center">
                                            @if($data->status == 1)
                                                <a href="{{ route('testimonial.status',['id'=>$data->id])}}" 
                                                    class="btn btn-warning btn-xs"
                                                    onclick="return confirm('Are You Sure You Want To Change Testimonial Status ??')">
                                                    <i class="fa fa-arrow-down" 
                                                    title="Change Testimonial Status to Inactive ??"></i>
                                                </a>
                                            @elseif($data->status == 0)
                                                <a href="{{ route('testimonial.status',['id'=>$data->id])}}" 
                                                    class="btn btn-success btn-xs"
                                                    onclick="return confirm('Are You Sure You Want To Change Testimonial Status ??')">
                                                    <i class="fa fa-arrow-up" 
                                                    title="Change Testimonial Status to Active ??"></i>
                                                </a>
                                            @endif
                                        </td>
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
                url: "{{ route('shop.edit') }}",
                data: { id: id  },
                success: function (data) {
                    {{-- alert(id); --}}
                    $('.id').val(data[0]['id']);
                    $('.name').val(data[0]['name']);
                    $('.role').val(data[0]['role']);
                }
            });
        });
        $('#updatE').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('shop.update') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id'    : $(".id").val(),
                    'name'  : $(".name").val(),
                    'role'  : $(".role").val(),
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
                url: "{{ route('shop.destroy') }}",
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