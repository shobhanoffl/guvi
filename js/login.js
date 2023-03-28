$(document).ready(function() {
	$('#login-form').submit(function(event) {
		event.preventDefault();
		var email = $('#email').val();
		var password = $('#password').val();
		$.ajax({
			type: 'POST',
			url: 'php/login.php',
			data: { email: email, password: password },
			success: function(data) {
				if (data == 'success') {
					alert('Login successful!');
					window.location.replace("profile.html");
				} else {
					alert('Incorrect email or password. Please try again.');
				}
			}
		});
	});
});
