@extends('Master.loginlayout')
@section('title')
    Login
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="back-link back-backend">
                    <a href="{{ route('register') }}" class="btn btn-primary">Go to Register</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="back-link back-backend" style="float:right;">
                    <a href="{{ url('/') }}" class="btn btn-primary" style="float:right;">Go Back to Website</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12"></div>
            <div class="col-md-4 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3>{{ config('app.name') }} Login</h3>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class="control-label" for="mobile">Mobile Number</label>
                                <input id="mobile" type="number" name="mobile" value="{{ old('mobile') }}"  
                                    class="form-control @error('mobile') is-invalid @enderror" autofocus
                                    required autocomplete="null" placeholder="Enter Mobile Number">
                                @error('mobile')
                                    <span class="invalid-feedback help-block small" role="alert">
                                        <strong style="color:red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label" for="password">Password</label>
                                <input id="password" type="password" name="password" 
                                    autocomplete="current-password" placeholder="Enter Password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="invalid-feedback help-block small" role="alert">
                                        <strong style="color:red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-12">
                                <input class="i- checks" type="checkbox" name="remember" checked 
                                    {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </div>
                        </div>

                            <div class="text-center">
                                <button type="submit" class="col-lg-12 btn btn-success loginbtn">Login</button>
                            </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-default loginbtn" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-2 col-sm-3 col-xs-12"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Copyright © <script>document.write(new Date().getFullYear());</script>
                    <u><a href="http://www.dokanpos.com">{{ config('app.name') }}</a></u> All rights reserved.
                    &nbsp;
                    Develop by <u><a href="http://www.creativesoftware.com.bd">Creative Software Ltd</u>.</a>
                </p>
            </div>
        </div>
    </div>

@endsection
