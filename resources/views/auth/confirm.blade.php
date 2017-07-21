@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Register:</strong> <small>Confirmation of Contact Details</small></div>
        <div class="panel-body">
            <form  method="POST" action="" role="form">
                {{ csrf_field() }}

                <div class="alert alert-success" role="alert">
                    <p>
                        <strong>Thanks you for registering with MiDigitalLife!</strong>
                    </p>
                    <p>
                        In order to activate your membership an email message has been sent to <strong>here@there.com</strong> containing a unique activation key. A similar message has been sent to your mobile device containing a unique key
                    </p>
                    <p>
                        Please enter both keys below to complete your subscription to the <strong>PACK</strong>strong> mobile application.
                    </p>
                </div>

                <!-- Store Application token -->
                <input type="hidden" id="applicationToken" name="applicationToken" value="123456789" />

                <div class="form-group{{ $errors->has('email_key') ? ' has-error' : '' }}">
                    <label for="email_key" class="control-label">Email activation key</label>
                    <input id="email_key" type="text" class="form-control" name="email_key" 
                        value="{{ old('email_key') }}" required autofocus />
                    @if ($errors->has('email_key'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email_key') }}</strong>
                        </span>
                    @endif                            
                </div>

                <div class="form-group{{ $errors->has('mobile_key') ? ' has-error' : '' }}">
                    <label for="mobile_key" class="control-label">Mobile activation key</label>
                    <input id="mobile_key" type="text" class="form-control" name="mobile_key" 
                        value="{{ old('mobile_key') }}" required autofocus />
                    @if ($errors->has('mobile_key'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mobile_key') }}</strong>
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
