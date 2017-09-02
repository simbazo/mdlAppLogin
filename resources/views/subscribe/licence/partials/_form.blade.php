<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="type" class="control-label">Type</label>
    <input id="type" type="text" class="form-control" name="text" value="{{ old('text') }}" required autofocus>

    @if ($errors->has('type'))
        <span class="help-block">
            <strong>{{ $errors->first('type') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('upload_schedule') ? ' has-error' : '' }}">
    <label for="upload_schedule" class="control-label">Upload schedule</label>
    <input id="upload_schedule" type="number" class="form-control" name="upload_schedule" value="{{ old('upload_schedule') }}" required autofocus>

    @if ($errors->has('upload_schedule'))
        <span class="help-block">
            <strong>{{ $errors->first('upload_schedule') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('download_schedule') ? ' has-error' : '' }}">
    <label for="download_schedule" class="control-label">Download schedule</label>
    <input id="download_schedule" type="number" class="form-control" name="download_schedule" value="{{ old('download_schedule') }}" required autofocus>

    @if ($errors->has('download_schedule'))
        <span class="help-block">
            <strong>{{ $errors->first('download_schedule') }}</strong>
        </span>
    @endif
</div>