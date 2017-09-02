@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Login</div>
        <div class="panel-body">
            <form method="POST" action="{{ route('login') }}" role="form">
                {{ csrf_field() }}

                <!-- Store Application token -->
                <input type="hidden" id="applicationToken" name="applicationToken" value="1" />

                <!-- Store POSTed Device details in hidden fields for saving after the user is created -->
                <input type="hidden" id="manufacturer" name="manufacturer" value="Apple" />
                <input type="hidden" id="model" name="model" value="iPhone 4" />
                <input type="hidden" id="platform" name="platform" value="iOS" />
                <input type="hidden" id="version" name="version" value="8.2" />
                <input type="hidden" id="serial" name="serial" value="PEND0123456789" />

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Login
                </button>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>

                <p>
                    <hr />
                    Don't have an account? <a class="btn btn-primary btn-lg" href="{{ route('register.personal') }}" role="button">Free Registration</a>
                </p>
            </form>
        </div>
    </div>
@endsection
