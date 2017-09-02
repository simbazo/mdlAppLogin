@extends('layouts.app')

@section('content')
<div class="panel panel-info">
    <div class="panel-heading">
    	<strong>Subscribe</strong>: <small>Complete</small>
	</div>
    <div class="panel-body">
        <form method="POST" action="{{ route('logout') }}" onSubmit="return sendSubscription()">
            {{ csrf_field() }}

            <input type="hidden" id="user_uuid" name="user_uuid" value="{{ $subscription->user_uuid }}" />
            <input type="hidden" id="subscription_uuid" name="subscription_uuid" value="{{ $subscription->uuid }}" />
            <input type="hidden" id="subscription_status" name="subscription" value="{{ $subscription->status_uuid }}" />
            <input type="hidden" id="licence_type" name="licence_type" value="{{ $application->licence->type }}" />
            <input type="hidden" id="upload_schedule" name="upload_schedule" value="{{ $application->licence->upload_schedule }}" />
            <input type="hidden" id="download_schedule" name="download_schedule" value="{{ $application->licence->download_schedule }}" />

            <p>
                You are now subscribed to the <strong>{{ $subscription->application->long_name }}</strong> application. 
            </p>
            <p>
                The following devices may be used to access this subscription:
            </p>
            <p>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>OS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscription->devices as $device)
                            <tr>
                                <td>{{ $device->name }}</td>
                                <td>{{ $device->manufacturer }}&nbsp;{{ $device->model }}</td>
                                <td>{{ $device->platform }}&nbsp;{{ $device->version }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </p>

            <p>
                Click the <strong>Close</strong> button to continue.
            </p>

            <p>
                <button type="submit" class="btn btn-block btn-primary">
                    Close
                </button>
            </p>
        </form>
	</div>
</div>
@endsection