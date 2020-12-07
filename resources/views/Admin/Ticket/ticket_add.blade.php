@extends('Master.main')
@section('title')
    Ticket Add 
@endsection
@section('content')

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 class="col-lg-2" style="padding:0px;">Ticket Add</h1>
                            <div class="col-lg-1"></div>
                            <div class="container col-lg-4">
                                @if(session('message'))
                                <div class="alert alert-dismissible alert-success text-center"
                                    style="margin-top: 0px; margin-bottom: 0px;">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ session('message') }}</strong>
                                </div>      
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>

                    <div class="row">
                        <form action="{{ route('ticket.store') }}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                <label>Business Name</label>
                                <input value="{{ $business_name }}"
                                    name="b_name" class="form-control" readonly/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                <label>Name</label>
                                <input value="{{ Auth::user()->name }}"
                                    name="name" class="form-control" readonly/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                <label>Mobile</label>
                                <input value="{{ Auth::user()->mobile }}"
                                    name="mobile" class="form-control" readonly/>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <label>Subject *</label>
                                <input name="subject" class="form-control" required/>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <label>Department *</label>
                                <select name="department" class="form-control" required>
                                    <option value="">Please Select</option>
                                    <option value="1">Billing Support</option>
                                    <option value="2">Technical Support</option>
                                    <option value="3">Sales Support</option>
                                    <option value="4">Other Support</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <label>Priority *</label>
                                <select name="priority" class="form-control" required>
                                    <option value="1">Medium</option>
                                    <option value="2">High</option>
                                    <option value="3">Low</option>
                                </select>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label>Message *</label>
                                <textarea id="summernote 3" class="form-control" name="message" required></textarea>
                            </div>
                            {{--  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <label>Attachments (1)</label>
                                <input type="file" name="attacthment1" class="form-control"> 
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <label>(2)</label>
                                <input type="file" name="attacthment2" class="form-control"> 
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <label>(3)</label>
                                <input type="file" name="attacthment3" class="form-control"> 
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <label>(4)</label>
                                <input type="file" name="attacthment4" class="form-control"> 
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <label>(5)</label>
                                <input type="file" name="attacthment5" class="form-control"> 
                            </div>  --}}
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label>Attachments</label>
                                <table class="table table-sm table-bordered table-striped imlist">
                                    <form id="ItemImage">
                                        <tr>
                                            <td>
                                                <input name="attachment" class="form-control-sm" 
                                                    type="file"/>
                                            </td>
                                            {{-- <td class="text-center">
                                                <button type="button" id="addim" 
                                                    class="btn btn-primary btn-xs">
                                                    <i class="fa fa-plus-circle"></i>
                                                </button>
                                            </td> --}}
                                        </tr>
                                    </form>
                                </table>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="text-center">
                                <a href="{{ route('ticket.index') }}" class="btn btn-warning btn-sm">Back</a>
                                <a href="{{ route('ticket.add') }}" class="btn btn-danger btn-sm">Clear</a>
                                <button class="btn btn-success btn-sm" type="submit">Submit</button>
                            </div>
                        </form>
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
        $(document).ready(function () {
            var counter = 0;
            $("#addim").on("click", function () {
                if(counter<4){
                    var newRow = $("<tr class='text-center'>");
                    var cols = "";
                    cols += '<td><input name="attachment" class="form-control-sm" type="file" required/></td>';
                    cols += '<td><button type="button" class="ibtnl btn btn-danger btn-xs"><i class="fa fa-times-circle"></i></button></td>';
                    newRow.append(cols);
                    $("table.imlist").append(newRow);
                    counter++;
                }
            });
            $("table.imlist").on("click", ".ibtnl", function (event) {
                $(this).closest("tr").remove();       
                counter -= 1
            });
        });
    </script>

@endsection