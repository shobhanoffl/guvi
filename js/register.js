$(document).ready(function() {
	$('#signup-form').submit(function(event) {
		event.preventDefault();
		var email = $('#email').val();
		var password = $('#password').val();
		$.ajax({
			type: 'POST',
			url: 'php/register.php',
			data: { email: email, password: password },
			success: function(data) {
				if (data == 'success') {
					alert('Signup successful!');
					$('#signup-form')[0].reset();
					window.location.replace("profile.html");
				} else {
					alert('Signup failed. Please try again.');
				}
			}
		});
	});
});