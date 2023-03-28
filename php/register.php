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

// Hash the password using bcrypt
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare SQL statement
$sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

// Execute SQL statement
if (mysqli_query($conn, $sql)) {
    echo "success";
} else {
    echo "error";
}

// Close connection
mysqli_close($conn);
?>
