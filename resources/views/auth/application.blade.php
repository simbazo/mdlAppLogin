@extends('layouts.app')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Register: <small>Your Application</small></div>
                <div class="panel-body">
                    <form  method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <!-- Store Application token -->
                        <input type="hidden" id="applicationToken" name="applicationToken" value="" />

                        <!-- Store user details -->
                        <input type="hidden" id="userID" name="userID" value="{{$user->uuid}}" />

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Name</label>
                                <input id="name" type="text" class="form-control" name="name" 
                                    value="{{ old('name') }}" placeholder="E.g., PACK" disabled />
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('promotion') ? ' has-error' : '' }}">
                            <label for="promotion" class="control-label">Promotion code</label>
                            <input id="promotion" type="text" class="form-control" name="promotion" 
                                value="{{ old('promotion') }}" required>
                            @if ($errors->has('promotion'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('promotion') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Continue
                        </button>

                        <p>
                            <hr />
                            No promotion code? 
                            <a href="{{ route('login') }}">
                                Purchase now
                            </a>
                        </p>
                    </form>
                </div>
            </div>
@endsection