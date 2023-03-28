$(document).ready(function() {
	// Get user data from MongoDB
	$.ajax({
		type: 'GET',
		url: 'php/profile.php',
		success: function(data) {
			// function calculateAge(dateString) {
			// 	var today = new Date();
			// 	var birthDate = new Date(dateString);
			// 	var age = today.getFullYear() - birthDate.getFullYear();
			// 	var monthDiff = today.getMonth() - birthDate.getMonth();
			  
			// 	if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
			// 	  age--;
			// 	}
			  
			// 	return age;
			//   }
			// Loop through each user and append to the table
			let json = eval(data);
			$.each(json, function(index, user) {
				var row = $('<tr>');
				row.append($('<td>').text(user.name));
				row.append($('<td>').text(user.dob));
				// var age = calculateAge(user.dob);
				row.append($('<td>').text(user.age));
				row.append($('<td>').text(user.contact));
				$('#user-table tbody').append(row);
				$('#name').val(user.name);
			});
			var age = calculateAge(text(user.dob));
			row.append($('<td>').age);
			$('#user-table tbody').append(data);
		}
	});
});

// function calculateAge(dateString) {
// 	var today = new Date();
// 	var birthDate = new Date(dateString);
// 	var age = today.getFullYear() - birthDate.getFullYear();
// 	var monthDiff = today.getMonth() - birthDate.getMonth();
  
// 	if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
// 	  age--;
// 	}
  
// 	return age;
//   }

function updateData() {
	
	var name = $('#name').val();
	var dob = $('#dob').val();
	var age = $('#age').val();
	var mobile = $('#mobile').val();
  
	$.ajax({
	  url: "php/profile.php",
	  type: "POST",
	  data: {
		name: name,
		dob: dob,
		age:age,
		mobile: mobile
	  },
	  success: function(response) {
		alert("Data updated successfully");
		window.location.href = 'profile.html';
	  },
	  error: function(xhr, status, error) {
		// console.log(xhr);
		// console.log(status);
		console.log(error);
	  }
	});
  }

//   $('#logoutbtn').click(function() {
// 	// Send AJAX request to logout.php
// 	$.ajax({
// 		url: 'php/profile.php',
// 		type: 'POST',
// 		success: function(data) {
// 			window.location.href = 'login.html';
// 		}
// 	});
// });
