@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
    	Licences
    	<a href="{{ route('licences.create') }}" class="btn btn-primary btn-xs pull-right active" data-toggle="ajax-modal">
    		<i class="fa fa-plus-square-o"></i> 
    			New Licence
		</a>
	</div>
    <div class="panel-body">
	    <table class="table table-striped table-hover">
		    <thead>
			    <tr>
			    	<th>Type</th>
			    	<th>Upload interval</th>
			    	<th>Download interval</th>
			    </tr>
		    </thead>
		    <tbody>
		    	@if ($licences->count() == 0)
		    		<tr>
		    			<td colspan="3">
		    				No licences exist.
		    			</td>
	    			</tr>
				@else
			    	@foreach($licences as $licence)
			    		<tr>
				    		<td>
				    			{{$licence->type}}
			    			</td>
				    		<td>
				    			{{$licence->upload_schedule}}
			    			</td>
				    		<td>
				    			{{$licence->download_schedule}}
			    			</td>
				    		<td>
			                   {!!edit_btn('licences.edit', $licence->uuid)!!}
			                   {!!delete_btn('licences.destroy', $licence->uuid)!!}

		                    </td>
			    		</tr>
			    	@endforeach
		    	@endif
		    </tbody>
	    </table>
    </div>
</div>
@endsection