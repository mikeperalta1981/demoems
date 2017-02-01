@extends('layouts.app')


@section('content')
<div>
  <a class="hiddenanchor" id="signup"></a>
  <a class="hiddenanchor" id="signin"></a>

  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

         @if (count($errors) > 0)
            
            <div class="alert alert-warning" style="color: none; text-shadow: none">
              <strong style="float: left"><i class="fa fa-warning"></i>Oooppss!</strong><br>
               @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
               @endforeach
            </div>
        @endif


          <h1>Employee Management System</h1>
          <div>
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" />
            
          </div>
          <div>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="" />
          </div>
          <div>
            <!-- <a class="btn btn-default submit" href="index.html">Log in</a> -->
             <button type="submit" class="btn btn-default">
                <i class="fa fa-btn fa-sign-in"></i> Login
            </button>
            <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
          </div>

          <div class="clearfix"></div>

          <div class="separator">
            <!-- <p class="change_link">New to site?
              <a href="#signup" class="to_register"> Create Account </a>
            </p> -->

            <div class="clearfix"></div>
            <br />

            <div>
              <h1>Camalig Credit Corporation</h1>
              <p>©2016 All Rights Reserved</p>
              <p>Author: Michael Peralta</p>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
</div>


@endsection

@section('content_orig')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
