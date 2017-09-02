@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
    	<strong>Register</strong>: <small>Current device</small>
	</div>
    <div class="panel-body">
    	<form  method="POST" action="{{ url('subscribe/devices') }}" role="form">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Device name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="type" class="control-label">Manufacturer</label>
                <input id="manufacturer" name="manufacturer" type="text" class="form-control"  
                    value="{{ session('clientData')['manufacturer'] }}" readonly />
            </div>

            <div class="form-group">
                <label for="type" class="control-label">Model</label>
                <input id="model" name="model" type="text" class="form-control"  
                    value="{{ session('clientData')['model'] }}" readonly />
            </div>

            <div class="form-group">
                <label for="type" class="control-label">Platform</label>
                <input id="platform" name="platform" type="text" class="form-control"  
                    value="{{ session('clientData')['platform'] }}" readonly />
            </div>

            <div class="form-group">
                <label for="type" class="control-label">Version</label>
                <input id="version" name="version" type="text" class="form-control"  
                    value="{{ session('clientData')['version'] }}" readonly />
            </div>

            <div class="form-group">
                <label for="type" class="control-label">Serial no.</label>
                <input id="serial" name="serial" type="text" class="form-control"  
                    value="{{ session('clientData')['serial'] }}" readonly />
            </div>

            <button type="submit" class="btn btn-block btn-primary">
                Continue
            </button>
        </form>
	</div>
</div>
@endsection