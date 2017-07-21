@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Register: <small>Your Security</small></div>
        <div class="panel-body">
            <form  method="POST" action="{{ route('register') }}" role="form">
                {{ csrf_field() }}
                
                <input type="hidden" id="applicationToken" name="applicationToken" value="{{ $request['applicationToken'] }}" />
                
                <input type="hidden" id="manufacturer" name="manufacturer" value="{{ $request['manufacturer'] }}" />
                <input type="hidden" id="model" name="model" value="{{ $request['model'] }}" />
                <input type="hidden" id="platform" name="platform" value="{{ $request['platform'] }}" />
                <input type="hidden" id="version" name="version" value="{{ $request['version'] }}" />
                <input type="hidden" id="serial" name="serial" value="{{ $request['serial'] }}" />
                
                <input type="hidden" id="first_name" name="first_name" value="{{ $request['first_name'] }}" />
                <input type="hidden" id="last_name" name="last_name" value="{{ $request['last_name'] }}" />
                <input type="hidden" id="dob" name="dob" value="{{ $request['dob'] }}" />
                <input type="hidden" id="sex" name="sex" value="{{ $request['sex'] }}" />
                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-mail address</label>
                    <div class="input-group">
                        <input id="email" type="text" class="form-control" name="email" 
                            value="{{ old('email') }}" data-confirmed="false" required />
                        <span class="input-group-btn">
                            <a class="btn btn-primary" href="{{ route('confirm.show.email', 'mail.andrew.browne@gmail.com') }}" data-toggle="ajax-modal">Confirm</a>
                        </span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                    <label for="mobile" class="control-label">Mobile number</label>
                    <div class="input-group">
                        <input id="mobile" type="text" class="form-control" name="mobile" 
                            value="{{ old('mobile') }}" data-confirmed="false" required />
                         <span class="input-group-btn">
                             <a class="btn btn-primary" href="{{ route('confirm.show.mobile', '076279031') }}" data-toggle="ajax-modal" role="button">Confirm</a>
                         </span>
                        @if ($errors->has('mobile'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                        @endif
                    </div>
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
                    <label for="password-confirm" class="control-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" 
                        name="password_confirmation" required>
                </div>                        

                <div class="form-group{{ $errors->has('security_question') ? ' has-error' : '' }}">
                    <label for="security_question" class="control-label">Security question</label>
                    <input id="security_question" type="text" class="form-control" name="security_question" value="{{ old('security_question') }}" required autofocus>
                    @if ($errors->has('security_question'))
                        <span class="help-block">
                            <strong>{{ $errors->first('security_question') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('security_answer') ? ' has-error' : '' }}">
                    <label for="security_answer" class="control-label">Security answer</label>
                    <input id="security_answer" type="text" class="form-control" name="security_answer" 
                        value="{{ old('security_answer') }}" required autofocus>
                    @if ($errors->has('security_answer'))
                        <span class="help-block">
                            <strong>{{ $errors->first('security_answer') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">
                    Continue
                </button>

                <p>
                    <hr />
                    Already registered? 
                    <a href="{{ route('login') }}">
                        Log In Here
                    </a>
                </p>
            </form>
        </div>
    </div>
@endsection