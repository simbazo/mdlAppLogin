@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
    	<strong>Subscribe: </strong>: <small>Purchase details</small>
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

    	<form  method="POST" action="{{ route('subscriptions.purchase.store') }}" role="form">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('store') ? ' has-error' : '' }}">
                <label for="store" class="control-label">App Store</label>
                <select class="form-control" id="store" name="store">
                    <option value="1">Apple</option>
                    <option value="2">Google</option>
                </select>
                @if ($errors->has('store'))
                    <span class="help-block">
                        <strong>{{ $errors->first('store') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('purchase_number') ? ' has-error' : '' }}">
                    <label for="purchase_number" class="control-label">Purchase number</label>
                    <input id="purchase_number" type="text" class="form-control" name="purchase_number" 
                        value="{{ old('purchase_number') }}" required autofocus />
                    @if ($errors->has('purchase_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('purchase_number') }}</strong>
                        </span>
                    @endif
                </div>

            <button type="submit" class="btn btn-block btn-primary">
                Continue
            </button>
        </form>
	</div>
</div>
@endsection