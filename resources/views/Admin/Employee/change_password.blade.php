@extends('Master.loginlayout')
@section('title')
    Change Password
@endsection
@section('content')

    <br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-6 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3>{{ config('app.name') }} Change Password</h3>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        {{--  @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif  --}}
                        <form method="POST" action="{{ route('employee.changePassword') }}"  id="loginForm">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">New Password</label>
                                <input id="password" type="password" name="password" autocomplete="new-password" 
                                class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" 
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-3 text-left">
                                    <button class="btn btn-primary">
                                        <a href="{{ route('home') }}" style="color:white;">Back</a>
                                    </button>
                                </div>
                                <div class="col-md-9 text-right">
                                    <button type="submit" class="btn btn-success">
                                        Change Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12"></div>
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
