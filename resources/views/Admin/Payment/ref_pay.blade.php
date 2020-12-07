@extends('Master.main')
@section('title')
    Reference Payment 
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-3" style="padding:0px;">Reference Payment</h1>
                            <div class="col-lg-4"></div>
                            <div class="container col-lg-6">
                                @if(session('message'))
                                <div class="alert alert-dismissible alert-success text-center"
                                    style="padding-top: 5px; padding-bottom: 5px;
                                    margin-top: 0px; margin-bottom: 0px;">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ session('message') }}</strong>
                                </div>      
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <form action="{{ route('reference.payment.confirm') }}" method="POST"> 
                        @csrf
                        <div class="col-lg-3">
                            <select class="selectpicker REFER form-control" 
                                name="reference" title="Select Reference ....."  
                                data-style="btn-primary" data-live-search="true" required>
                                @foreach ($reference as $ref)
                                <option value="{{ $ref->mobile }}">{{ $ref->name }}</option>
                                <input name="reference_id" value="{{ $ref->id }}" type="hidden"/>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <select class="REFSHOP form-control" name="shop" required>
                                <option value="">Select Reference Shop ..</option>
                            </select>
                        </div>
                        <div class="col-lg-1">
                            <label class="login2 pull-right pull-right-pro">
                                Mobile
                            </label>
                        </div>
                        <div class="col-lg-2">
                            <input name="mobile" class="form-control mobile" readonly/>
                            <input name="shop_id" class="shop_id" type="hidden"/>
                        </div>
                        <div class="col-lg-1">
                            <label class="pull-right pull-right-pro">
                                Collection
                            </label>
                        </div>
                        <div class="col-lg-2">
                            <input name="collection" class="form-control collection" readonly/>
                        </div>
                        <div class="clearfix"></div><br>
                        <div class="col-lg-1">
                            <label class="pull-right pull-right-pro">
                                Payment
                            </label>
                        </div>
                        <div class="col-lg-2">
                            <input name="payment" class="form-control payment" readonly/>
                        </div>
                        <div class="col-lg-1">
                            <label class="pull-right pull-right-pro">
                                Comment
                            </label>
                        </div>
                        <div class="col-lg-5">
                            <input name="comment" class="form-control" type="text" required/>
                        </div>
                        <button class="btn btn-success" type="submit"
                            onclick="return confirm('Are You Sure You Want To Confirm this Payment ??')">
                            <i class="fa fa-check-circle"></i> Submit
                        </button>
                    </form>  
                    <div class="clearfix"></div>
                    <hr>
                   
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
                                        <th data-field="SL" data-editable="false">SL.</th> 
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
                                    <?php $i = 1;?>
                                    @foreach ($payment as $data)
                                    <tr>
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
        $('.REFER').on('change',function(){
            var id  = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{ route('reference.ref_shop') }}',
                data: { id:id }, 
                success: function(data){ 
                    $('select[name="shop"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="shop"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });
    </script>

    <script>
        $('.REFSHOP').on('change',function(){
            var id  = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{ route('reference.shop.details') }}',
                data: { id:id }, 
                success: function(data){ 
                    $('.shop_id').val(data[0]['shop_id']);
                    $('.mobile').val(data[0]['mobile']);
                    $('.collection').val(data[0]['price']);
                    $('.payment').val(data[0]['price']*0.1);
                }
            });
        });
    </script>

@endsection