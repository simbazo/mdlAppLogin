@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
    	<strong>Subscribe: </strong>: <small>Organisation details</small>
	</div>
    <div class="panel-body">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            The following error occurred:
            <br/>
            {{ $message }}
        </div>

    	<form  method="POST" action="{{ route('subscriptions.organisation.store') }}" role="form">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">Email</label>
                <input id="email" type="text" class="form-control" name="email" 
                    value="{{ session('clientData')['email'] }}" readonly />
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('organisation') ? ' has-error' : '' }}">
                <label for="organisation_uuid" class="control-label">Organisation</label>
                <select class="form-control" id="organisation_uuid" name="organisation_uuid">
                    @foreach($organisations as $organisation)
                        <option value="{{ $organisation->uuid }}">{{ $organisation->short_name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('organisation_uuid'))
                    <span class="help-block">
                        <strong>{{ $errors->first('organisation_uuid') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('staff_number') ? ' has-error' : '' }}">
                <label for="staff_number" class="control-label">Staff number</label>
                <input id="staff_number" type="text" class="form-control" name="staff_number" 
                    value="{{ old('staff_number') }}" required autofocus />
                @if ($errors->has('staffNumber'))
                    <span class="help-block">
                        <strong>{{ $errors->first('staff_number') }}</strong>
                    </span>
                @endif
            </div>

            @if ($proceed == 1)
                <button type="submit" class="btn btn-block btn-primary">
                    Continue
                </button>
            @else
                <button type="submit" class="btn btn-block btn-primary" disabled="disabled">
                    Continue
                </button>
            @endif
        </form>
	</div>
</div>
@endsection