@extends('layouts.modal')

@section('content')
<!-- Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Email confirmation</h4>
      </div>
      <div class="modal-body">
        <p>
            <strong>Thank you for registering with MiDigitalLife!</strong>
        </p>
        <p>
            A confirmation email has been sent to <strong>mail.andrew.browne@gmail.com</strong>.
        </p>
        <p>
            Please copy the the confirmation token from that email into the field below and click the <strong>Confirm</strong> button.
        </p>
        <p>
            <input type="text" value="" id="confirmEmail" name="confirmEmail" placeholder="Paste confirmation token" />
        </p>
        <p>
            If you did not receive a email from us with a confirmation token, click the <strong>Resend</strong> button to try again.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Resend</button>
        <button type="button" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>
@endsection