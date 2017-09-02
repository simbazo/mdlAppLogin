@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Register: <small>Your Security Details</small></div>
        <div class="panel-body">
            <form  method="POST" action="{{ url('/register') }}" role="form">
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
                <input type="hidden" id="emailVerified" name="emailVerified" value="false" />
                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-mail address</label>
                    <div class="input-group">
                        <input id="email" type="text" class="form-control" name="email" 
                            value="{{ old('email') }}" data-confirmed="false" required />
                        <span class="input-group-btn">
                            <a id="confirmEmail" name="confirmEmail" class="btn btn-primary" disabled data-toggle="modal" data-target="#emailConfirmModal">Confirm</a>
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
                    <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required />
                    @if ($errors->has('mobile'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mobile') }}</strong>
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

    <div class="modal fade" id="emailConfirmModal" tabindex="-1" role="dialog" aria-labelledby="emailConfirmModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="emailConfirmModalLabel">Confirm your email address</h4>
                </div>
                <div class="modal-body">
                    <p>
                        A verification email has been sent to <span id="emailModalLabel">you</span>. Please copy the verication code into the input box below to confirm.
                    </p>
                    <form role="form">
                        <div class="form-group">
                            <label for="verificationCode">Email address</label>
                                <input type="text" class="form-control" id="verificationCode" placeholder="Enter verification code" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    &nbsp;&nbsp;
                    <span class="pull-right">
                      <button type="button" class="btn btn-primary js-verify-email">Confirm</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection