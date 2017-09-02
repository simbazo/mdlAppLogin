window.onload = function() {
	// Get a reference to the <div> on the page that will display the
	// message text.
	//var messageEle = document.getElementById('message');

	// A function to process messages received by the window.
	function receiveMessage(e) {
		alert($('#serial').val());
		$('#applicationToken').val(e.data['applicationToken']);
		$('#manufacturer').val(e.data['manufacturer']);
		$('#model').val(e.data['model']);
		$('#platform').val(e.data['platform']);
		$('#version').val(e.data['version']);
		$('#serial').val(e.data['serial']);
		alert($('#serial').val());
	}

	// Setup an event listener that calls receiveMessage() when the window receives a new MessageEvent.
	window.addEventListener('message', receiveMessage);
};

$(document).ready(function() {
	// Date of birth datepicker
	var date = new Date();
	var picker = new Pikaday({ 
		field: $('#dob')[0],
		format: 'YYYY/MM/DD',
		defaultDate: new Date(date.getFullYear() - 20, date.getMonth(), date.getDate())
	});	

	// Handle subscription devices enabled list 
	$(document).on('click', '.js-device-list', function(e) {
		var maxDevices = $('#max_devices').prop('value');
		var enabledDevices = $('input[type="checkbox"]:checked').length;

		if (enabledDevices > maxDevices) {
			alert('Maximum active devices exceeded!\nPlease disable at least ' + (enabledDevices - maxDevices) + ' device(s).');
		} else {
			alert('Proceed - use ajax call');
		}
	});

	// Change state of Confirm button as the user types address
	$(document).on('keyup', '#email', function(e){
		if (isEmailAddress($(e.currentTarget).val())) {
			$('#confirmEmail').attr('disabled', false);
		} else {
			$('#confirmEmail').attr('disabled', true);
		}        
	});

	// Change state of Confirm button if the user changes the address
	$(document).on('change', '#email', function(e){
		if (isEmailAddress($(e.currentTarget).val())) {
			$('#confirmEmail').attr('disabled', false);
		} else {
			$('#confirmEmail').attr('disabled', true);
		}        
	});
	

	//Pass the email address to the modal
    $('#emailConfirmModal').on("show.bs.modal", function (e) {
    	$("#emailModalLabel").html('<strong>' + $(e.relatedTarget).closest('.input-group').find('#email').val() + '</strong>');
    });

    // Update emailVerified hiiden field if verification is successful
    $('#emailConfirmModal').on('click', '.js-verify-email', function(e) {
    	if (confirm('Would you like to test the email as verified?') == true) {
    		$('#emailVerified').val('true');
    	}
    	
    	$('#emailConfirmModal').modal('hide');
    });

	$(document).on('click', '#agree', function(e) {
		if($(this).is(":checked")) {
			$('#agree_terms').attr('disabled', false);
		} else {
			$('#agree_terms').attr('disabled', true);
		}
	});
});

// Regular expression to match valid email addresses
function isEmailAddress(str) {
	var pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; 
	return str.match(pattern);
}

//Test for verified email from the Registration: Complete screen - delete once implemented
function checkForm() {
	if (confirm('Would you like to test the email as verified?') == true) {
		$('#emailVerified').val('true');
	}

	return true;
}
function sendSubscription() {
	// If this page is not in an iframe then continue to Laravel method
	if (!window == top) {
		// Send subscription details to the parent
		var data = {
			"subscription": {
				"user_uuid": $('#user_uuid').val(),
				"subscription_uuid":  $('#subscription_uuid').val(),
				"subscription_status":  $('#subscription_status').val(),
				"licence_type":  $('#licence_type').val(),
				"upload_schedule":  $('#upload_schedule').val(),
				"download_schedule":  $('#download_schedule').val()
			}
		}
		
		window.parent.postMessage(data, "*");
	}
	
	return true;
} 