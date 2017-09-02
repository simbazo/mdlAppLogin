@extends('layouts.modal')

@section('content')
<div class="modal-dialog">
	<div class="modal-content">
	    <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h5 class="modal-title">New Licence</h5>
	    </div>
	    <form method="POST" action="/subscribe/licences" class="ajax-submit">
	    	<div class="modal-body">
		        @include('subscribe.licence.partials._form')
		    </div>
	    </form>
    </div>
</div>
@endsection
