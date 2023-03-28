<?php

// Change the following variables to match your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guvi";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get email and password from POST data
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare SQL statement
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

// Check if user exists
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	$hashed_password = $row['password'];
	if (password_verify($password, $hashed_password)) {
		// $_SESSION['loggedin']
		echo "success";
	} else {
		echo "error";
	}
} else {
	echo "error";
}

// Close connection
mysqli_close($conn);
?>
