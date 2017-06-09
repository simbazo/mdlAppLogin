@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="alert alert-info alert-dismissible hidden-xs" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Tip:</strong> After registering, complete your profile at <strong><a href="http://www.midigitallife.com" target="_blank" class="alert-link">www.midigitallife.com</a></strong>. 
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="contact" name="contact" type="text" placeholder="Mobile number or email address" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            Register
                        </button>
                    </div>
                </div>
                <p class="text-center"><strong>OR</strong></p>
                <div class="form-group">
                    <div class="col-xs-12">
                        <button class="btn btn-success btn-block">
                            Login to MiDigitalLife
                        </button>
                    </div>
                </div>
                
            </form>
                <!--<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">First Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="first_name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                 <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Last Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="last_name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                 <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Phone</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="phone" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
