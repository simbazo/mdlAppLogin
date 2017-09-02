@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
    	<strong>Application</strong>: <small>Licence Agreement</small>
	</div>
    <div class="panel-body">
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Please agree to the <strong>Terms and Conditions</strong> to subscribe to the application.
        </div>
    
    	<form  method="POST" action="{{ route('licences.subscribe') }}" role="form">
            {{ csrf_field() }}

            <input type="hidden" id="applicationToken" name="applicationToken" value="{{ $application->uuid}}" />
            <input type="hidden" id="licenceUuid" name="licenceUuid" value="{{ $application->licence_uuid}}" />

            <div class="form-group">
                <label for="type" class="control-label">Application</label>
                <input id="long_name" type="text" class="form-control" name="long_name" 
                    value="{{ $application->long_name}}" readonly />
            </div>

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
                <iframe id="terms" name="terms" src="{{ asset('terms_conditions.html') }}"style="width:100%; max-height:100px;scrolling:auto;border:1px solid silver;"></iframe>
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="agree" name="agree" /> <strong>Agree to Terms & Conditions</strong>
                    </label>
                </div>
            </div>

            <button id="agree_terms" name="agree_terms" type="submit" class="btn btn-block btn-primary" disabled>
                Continue
            </button>
        </form>
	</div>
</div>
@endsection