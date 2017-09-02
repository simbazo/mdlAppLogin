@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
	    <div class="panel-heading">
	    	<strong>Subscribe: </strong>: <small>Devices (Max {{ $application->max_devices }} Enabled)</small>
		</div>
	    <div class="panel-body" style="margin:0; padding:0;">
	    	<input type="hidden" id="max_devices" name="max_devices" value="{{ $application->max_devices }}" />
	    	
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Phone</th>
							<th>Serial</th>
							<th>Enabled</th>
						</tr>
					</thead>
					<tbody>
						@foreach($devices as $device)
							<tr>
								<td>{{ $device->name }}</td>
								<td>{{ $device->manufacturer }}&nbsp;{{ $device->model }}</td>
								<td>{{ $device->serial }}</td>
								<td>
									<div class="checkbox">
									    <label>
											@if ($device->serial == session('clientData')["serial"])
												<input id="active" name="active" type="checkbox" value="{{ $device->uuid }}" checked disabled>
											@elseif ($device->pivot->active == 1) 
												<input id="active" name="active" type="checkbox" value="{{ $device->uuid }}" checked>
											@else
												<input id="active" name="active" type="checkbox" value="{{ $device->uuid }}" >
											@endif
										</label>
								  	</div>
								</td>
							</tr>
						@endforeach
						<tr>
							<td colspan="4" align="right">
								<button type="button" class="btn btn-primary js-device-list">Finish</button>
							</td>
						</tr>
					</tbody>
				</table>
			
		</div>
	</div>
@endsection