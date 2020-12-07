<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }} || Inactive</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/public')}}/Master/img/logo/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/owl.theme.css">
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/morrisjs/morris.css">
    <!-- modals CSS ============================================ -->
      <link rel="stylesheet" href="{{asset('/public')}}/Master/css/modals.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/public')}}/Master/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('/public')}}/Master/css/responsive.css">
    
</head>

<body>
    <div class="color-line"></div>
    
    <div class="container-fluid">
        @if(session('message'))
        <div class="container" style="padding-top: 20px; ">
          <div class="col-lg-4"></div>
          <div class="col-lg-4 text-center alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session('message') }}</strong>
          </div>  
          <div class="col-lg-4"></div>
        </div>
        @endif
        <div class="row" style="padding-top: 150px;">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center login-footer">
             
              <h1 style="font-size: 50px; margin:30px;">
                Your Account Is Now Inactive !! 
                <br>
                <small>Please Contact www.dokanpos.com</small>
              </h1>
              <p>
                @can('admin')
                <button type="button" class="btn btn-success"
                    data-toggle="modal" data-target="#PrimaryModalalert">Payment
                </button>
                &nbsp;&nbsp; 
                <a class="btn btn-warning" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" 
                  style="display: none;"> @csrf 
                </form>
                <div id="PrimaryModalalert" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
                  <div class="modal-dialog">
                      <div class="modal-content">
                      <form action="{{ route('shop.payment.store') }}" method="POST">
                          @csrf
                          <div class="modal-close-area modal-close-df">
                              <a class="close" data-dismiss="modal" href="#">
                                  <i class="fa fa-close"></i></a>
                          </div>
                          <div class="modal-header header-color-modal bg-color-1">
                              <h4 class="modal-title">Add Shop Payment Info</h4>
                          </div>
                          <div class="modal-body">
                              <div class="form-group-inner">
                                  <div class="row">
                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                          <label class="login2 pull-right pull-right-pro">
                                              Date <span class="table-project-n">*</span>
                                          </label>
                                      </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                          <input type="date" name="date" class="form-control" 
                                          value="{{ $today }}" required/>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group-inner">
                                  <div class="row">
                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                          <label class="login2 pull-right pull-right-pro">
                                              Package Name <span class="table-project-n">*</span>
                                          </label>
                                      </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                          <select class="form-control pkg" name="package" required>
                                              <option value="">----- Select Package -----</option>
                                              @foreach ($package as $package)
                                              <option value="{{ $package->name }}">{{ $package->name }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group-inner">
                                  <div class="row">
                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                          <label class="login2 pull-right pull-right-pro">
                                              Price <span class="table-project-n">*</span>
                                          </label>
                                      </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                          <input type="text" name="price" readonly
                                              class="form-control price" required/>
                                      </div>
                                  </div>
                              </div>
                              
                              <div class="form-group-inner">
                                  <div class="row">
                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                          <label class="login2 pull-right pull-right-pro">
                                              Days <span class="table-project-n">*</span>
                                          </label>
                                      </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                          <input type="text" name="days" readonly
                                              class="form-control days" required/>
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group-inner">
                                  <div class="row">
                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                          <label class="login2 pull-right pull-right-pro">
                                              Payment Type <span class="table-project-n">*</span>
                                          </label>
                                      </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                          <select class="form-control" name="type" required>
                                              <option value="Bkash">Bkash</option>
                                              <option value="Bank">Bank</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group-inner">
                                  <div class="row">
                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                          <label class="login2 pull-right pull-right-pro">
                                              Transaction No. <span class="table-project-n">*</span>
                                          </label>
                                      </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                          <input type="text" name="number"
                                              class="form-control" required/>
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group-inner">
                                  <div class="row">
                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                          <label class="login2 pull-right pull-right-pro">
                                              Comment <span class="table-project-n"></span>
                                          </label>
                                      </div>
                                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                          <textarea type="text" name="comment"  
                                              class="form-control"></textarea>
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
                @endcan
              </p>
              <br><br>
              <p>
                Copyright © <script>document.write(new Date().getFullYear());</script>
                <u><a href="http://www.dokanpos.com">{{ config('app.name') }}</a></u> 
                All rights reserved. &nbsp; Develop by 
                <u><a href="http://www.creativesoftware.com.bd">Creative Software Ltd</u>.</a>
              </p>
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
        $(".pkg").change(function () {
            var id = $(this).val();
            $.ajax({
                url: '{{ route('shop.payment.pkg') }}',
                type: 'GET',
                data: { id:id },
                success: function (data) {
                  $('.price').val(data[0]['price']);
                  $('.days').val(data[0]['days']);
                }
            });
        });
      });
  </script>

    <!-- modernizr JS ============================================ -->
    <script src="{{asset('/public')}}/Master/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- jquery
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{asset('/public')}}/Master/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/metisMenu/metisMenu.min.js"></script>
    <script src="{{asset('/public')}}/Master/js/metisMenu/metisMenu-active.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/counterup/jquery.counterup.min.js"></script>
    <script src="{{asset('/public')}}/Master/js/counterup/waypoints.min.js"></script>
    <script src="{{asset('/public')}}/Master/js/counterup/counterup-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{asset('/public')}}/Master/js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/calendar/moment.min.js"></script>
    <script src="{{asset('/public')}}/Master/js/calendar/fullcalendar.min.js"></script>
    <script src="{{asset('/public')}}/Master/js/calendar/fullcalendar-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('/public')}}/Master/js/main.js"></script>
</body>

</html>