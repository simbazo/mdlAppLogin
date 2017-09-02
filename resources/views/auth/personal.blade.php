@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Register:</strong> <small>Your Details</small></div>
        <div class="panel-body">
            <form  method="POST" action="{{ route('register.security') }}" role="form">
                {{ csrf_field() }}

                <!-- Store Application token -->
                <input type="hidden" id="applicationToken" name="applicationToken" value="1" />

                <!-- Store POSTed Device details in hidden fields for saving after the user is created -->
                <input type="hidden" id="manufacturer" name="manufacturer" value="Apple" />
                <input type="hidden" id="model" name="model" value="iPhone 4" />
                <input type="hidden" id="platform" name="platform" value="iOS" />
                <input type="hidden" id="version" name="version" value="8.2" />
                <input type="hidden" id="serial" name="serial" value="123456789" />

                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <label for="first_name" class="control-label">First name</label>
                    <input id="first_name" type="text" class="form-control" name="first_name" 
                        value="{{ old('first_name') }}" required autofocus />
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif                            
                </div>

                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <label for="last_name" class="control-label">Surname</label>
                    <input id="last_name" type="text" class="form-control" name="last_name" 
                        value="{{ old('last_name') }}" required autofocus />
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                    <label for="dob" class="control-label">Birth date</label>
                    <input id="dob" type="text" class="form-control" name="dob" 
                        value="{{ old('dob') }}" required autofocus />
                    @if ($errors->has('dob'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dob') }}</strong>
                        </span>
                    @endif
                </div>               

                <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                    <label for="sex" class="control-label">Sex</label>
                    <select class="form-control" id="sex" name="sex">
                        @foreach($sexes as $sex)
                            <option value="{{ $sex->uuid }}">{{ $sex->sex }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('sex'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sex') }}</strong>
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
