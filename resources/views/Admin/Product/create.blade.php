@extends('Master.main')
@section('title')
    Services
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">              
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Add Service</h1>

                            <div class="container col-lg-3">
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
                            
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="all-form-element-inner">
                                        <form action="{{ route('product.store') }}" method="POST" id="myForm">
                                            @csrf
                                            <div class="sparkline12-list col-md-6" style="width: 550px;">
                                                <div class="form-group-inner">
                                                    <?php
                                                        use App\Admin\Product;
                                                        $count = count(Product::whereDate('created_at', date('Y-m-d'))->get());
                                                        $s = $count + 1;
                                                        $bata = date('Ymd') . $s;
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Id*:</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="number" name="code" class="form-control" value="{{ $bata }}" required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Category*:</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="form-select-list">
                                                                    <select class="form-control custom-select-value" name="category_id" required>
                                                                        <option value="">Select Category</option>
                                                                        @foreach($categories as $category)
                                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Name*:</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="position: relative; display: inline-block; z-index: 1;">
                                                                <input type="text" name="name" class="form-control" id="search" required/>
                                                                <span id="search1" style="position: absolute;display: none;background-color: #f9f9f9;min-width: 390px;padding: 12px 16px;"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Maximum Value:</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="position: relative; display: inline-block; z-index: 1;">
                                                                <input type="text" name="maximum" class="form-control" id="maximum"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Unit:</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="position: relative; display: inline-block; z-index: 1;">
                                                                <input type="text" name="unit" class="form-control" id="unit"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="sparkline12-list col-md-6" style="width: 550px; margin-left: 10px">

                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Price*:</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="number" name="price" class="form-control" required />
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div> 
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Discount:</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="number" name="discount" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">MRP*:</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="number" name="mrp" class="form-control" required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Minimum Value:</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="position: relative; display: inline-block; z-index: 1;">
                                                                <input type="text" name="minimum" class="form-control" id="minimum"/>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Room:</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="position: relative; display: inline-block; z-index: 1;">
                                                                <input type="text" name="room" class="form-control" id="room"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sparkline13-hd">
                                                    <div class="main-sparkline13-hd">
                                                        <button type="submit" name="Submit" class="btn btn-info col-sm-3 Primary" style="margin-left: 5px; float: right;">Save Product
                                                        </button>
                                                        <a class="btn btn-danger col-sm-3 Primary" style="margin-left: 5px; float: right;" href="{{ route('product.index') }}" role="button">Go Back </a>
                                                        <a class="btn btn-primary col-sm-3 Primary" style="margin-left: 5px; float: right;" onclick="myFunction()" href="#" role="button">Clear </a>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#search').on('keyup',function(){
            $value=$(this).val();
            if ($value) {
                $('#search1').show();
                $.ajax({
                    type : 'get',
                    url : '{{URL::to('product/search')}}',
                    data:{'search':$value},
                    success:function(data){
                        $('#search1').html(data);
                    }
                });
            }else{
                $('#search1').hide();
            }     
        });
        $("#search").focusout(function(){
            $('#search1').hide();
        });
    });

    function myFunction(){
        document.getElementById("myForm").reset();
    }
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection