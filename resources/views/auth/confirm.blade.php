@extends('layouts.app')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Register: <small>Email Confirmation</small></div>
                <div class="panel-body">
                    <p>
                        Dear {{ $name }}
                    </p>
                    <p>
                        A confirmation email has been sent to <strong>{{ $email }}</strong> and it should arrive in your inbox shortly. 
                    </p>
                    <p>
                        <strong>Note:</strong> If the email does not show in your inbox, your mail client may have moved it to your <strong>Spam</strong> or <strong>Junk</strong> folders.
                    </p>
                    <p>
                        Please read the email instructions carefully and click on the link in the body of the message to complete you <strong>MidigitalLife</strong> registration online.
                    </p>
                    <p>
                        Regards,
                        <br/>
                        The MiDigitalLife Team
                    </p>
                </div>
            </div>
@endsection