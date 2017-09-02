@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Register:</strong> <small>Confirmation of Email</small></div>
        <div class="panel-body">
            <form  method="POST" action="{{ route('register.confirm') }}" role="form" onSubmit="return checkForm()">
                {{ csrf_field() }}

                <input type="hidden" id="emailVerified" name="emailVerified" value="false" />

                <div class="alert alert-success" role="alert">
                    <p>
                        <strong>Your MiDigitalLife membership was created.</strong>
                    </p>
                    <p>
                        A confirmation email has been sent to <strong>{{ $user->email }}</strong>. Please enter the verification code below to activate your account. 
                    </p>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input id="name" name="name" type="text" class="form-control"  
                        value="{{ $user->first_name }} {{ $user->last_name }}" readonly />
                </div>

                <div class="form-group">
                    <label for="status" class="control-label">Current status</label>
                    <input id="status" name="status" type="text" class="form-control"  
                        value="{{ $user->status->status }}" readonly />
                </div>

                <div class="form-group">
                    <label for="status" class="control-label">Active</label>
                    @if ($user->status->active == 0)
                        <input id="status" name="status" type="text" class="form-control"  
                            value="No" readonly />
                    @else
                        <input id="status" name="status" type="text" class="form-control"  
                            value="Yes" readonly />
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email_code') ? ' has-error' : '' }}">
                    <label for="email_code" class="control-label">Email verification code</label>
                    <input id="email_code" type="text" class="form-control" name="email_code" 
                        value="{{ old('email_code') }}" required autofocus />
                    @if ($errors->has('email_code'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email_code') }}</strong>
                        </span>
                    @endif                            
                </div>

                <button type="submit" class="btn btn-primary">
                    Continue
                </button>
            </form>
        </div>
    </div>
@endsection
