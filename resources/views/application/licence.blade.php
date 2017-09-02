@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
    	<strong>{{ $application->long_name }}</strong>: <small>Licence</small>
	</div>
    <div class="panel-body">
    	<form  method="POST" action="{{ route('licence.agree') }}" role="form">
            {{ csrf_field() }}

            <input type="hidden" id="licenceUuid" name="licenceUuid" value="{{ $application->licence_uuid}}" />

            <div class="form-group">
                <label for="type" class="control-label">Licence type</label>
                <input id="type" type="text" class="form-control" name="type" 
                    value="{{ $application->licence->type}}" readonly />
            </div>

            <div class="form-group">
                <label for="upload_schedule" class="control-label">Upload schedule</label>
                <input id="upload_schedule" type="text" class="form-control" name="upload_schedule" 
                    value="Every {{ $application->licence->upload_schedule }} day(s)" readonly />
            </div>

            <div class="form-group">
                <label for="download_schedule" class="control-label">Download schedule</label>
                <input id="download_schedule" type="text" class="form-control" name="download_schedule" 
                    value="Every {{ $application->licence->download_schedule }} day(s)" readonly />
            </div>

            <div class="form-group">
        		<label for="terms" class="control-label">Terms and Conditions</label>
        		<textarea id="terms" name="terms" style="width: 100%; max-height: 100px;scrolling:auto;text-align:left;">
        			{{ $application->licence->terms }}
        		</textarea>
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="agree" name="agree"> <strong>Agree to Terms & Conditions</strong>
                    </label>
                </div>
            </div>

            <button id="agree_terms" name="agree_terms" type="submit" class="btn btn-block btn-primary">
                Continue
            </button>
        </form>
	</div>
</div>
@endsection