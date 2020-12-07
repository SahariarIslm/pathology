@extends('Master.main')
@section('title')
    Generate Barcode
@endsection
@section('content')
<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-3" style="padding:0px;">
                                Generate Barcode 
                            </h1>
                            <form action="{{ route('barcode.index') }}" method="get"> @csrf
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label style="float:right;">From :</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="date" name="fromdate" required
                                                value="{{ $fromdate }}" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label style="float:right;">To :</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="date" value="{{ $todate }}" 
                                                class="form-control" name="todate" required/>
                                        </div>
                                        <button type="submit"class="btn btn-success btn-sm">Load</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>

                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright row">
                            <div class="col-lg-6" style="overflow: scroll; height: 350px;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Code</th>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Sales Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;?>
                                        @foreach ($barcode as $data)
                                        <tr>
                                            <td>{{ $i++ }}.</td>
                                            <td>{{ $data->code }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->qty }}</td>
                                            <td>{{ $data->price }}</td>
                                            <td>
                                                {{--  <button type="button" value="{{ $data->id }}"
                                                    class="btn btn-primary ediT btn-xs" >
                                                    <i class="fa fa-plus"></i>
                                                </button>  --}}
                                                <button type="button" value="{{ $data->id }}"
                                                    class="btn btn-info ediT btn-xs" data-toggle="modal" 
                                                    data-target="#InformationproModalhdbgcl">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-lg-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>SL.</th>
                                            <th>Code</th>
                                            <th>Product</th>
                                            <th>Sales Price</th>
                                            <th>Print Qty</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $j = 1; ?>
                                        @foreach(Cart::getContent() as $item) 
                                        <tr>
                                            <td>{{ $j++ }}.</td>
                                            <td>{{ $item->attributes->code }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>
                                                <a class="btn btn-danger btn-xs" 
                                                    href="{{ route('barcode.remove',['id'=>$item->id]) }}"
                                                    onclick="return confirm('You want to Remove Barcode from the Cart ??');">
                                                    <i class="fa fa-remove"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>

                            <div class="clearfix"></div>
                            <hr>
                            <div class="col-lg-12 text-center">
                                <a href="{{ route('barcode.generate') }}" target="_blank"
                                    class="btn btn-success btn-sm" type="GET">Print Barcode
                                </a>
                                <a class=" btn btn-warning btn-sm"
                                    onclick="return confirm('Are you sure You want to clear this Cart ??');"
                                    href="{{ route('barcode.clean') }}" type="GET">Clear
                                </a>
                            </div>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="InformationproModalhdbgcl" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title">Add Barcode</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
            <form id="updatE">  @csrf
                <div class="modal-body" style="padding-bottom: 0px; padding-top: 20px; padding-left: 20px;">
                    <input name="id" class="id" type="hidden"/>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">
                                    Code <span class="table-project-n"></span>
                                </label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input class="code form-control" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">
                                    Name <span class="table-project-n"></span>
                                </label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input class="name form-control" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">
                                    Sales Price <span class="table-project-n">*</span>
                                </label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="number" class="price form-control" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">
                                    Print Quantity <span class="table-project-n">*</span>
                                </label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="number" class="qty form-control" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                    <button class="btn btn-success btn-sm" type="submit">Confirm</button>
                </div>
            </form>
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
                    url: "{{ route('barcode.edit') }}",
                    data: { id: id },
                    success: function (data) {
                        $('.id').val(data[0]['id']);
                        $('.code').val(data[0]['code']);
                        $('.name').val(data[0]['name']);
                        $('.price').val(data[0]['price']);
                        $('.qty').val(data[0]['qty']);
                    }
                });
            });
            $('#updatE').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('barcode.update') }}",
                    data: {
                        '_token'    : $('input[name=_token]').val(),
                        'id'        : $(".id").val(),
                        'code'      : $(".code").val(),
                        'name'      : $(".name").val(),
                        'price'     : $(".price").val(),
                        'qty'       : $(".qty").val(),
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
                url: "{{ route('category.destroy') }}",
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