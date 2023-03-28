<?php
// Create connection
// Create connection
require "../assets/vendor/autoload.php";
$client = new \MongoDB\Client("mongodb://localhost:27017/");

// Select database and collection
$database = $client->guvi;
$collection = $database->users;

// Read MongoDB
$users = $collection->find();
$usersArray = iterator_to_array($users);
echo json_encode($usersArray);


// Update MongoDB
// Retrieve form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = $_POST['name'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$mobile = $_POST['mobile'];

// Update document
$updateResult = $collection->updateOne(
  ['name' => $name],
  ['$set' => ['dob' => $dob, 'age' => $age, 'contact' => $mobile]]
);

// Return success or failure message
if ($updateResult->getModifiedCount() > 0) {
    echo "Data updated successfully";
    // Select database and collection
    $database = $client->guvi;
    $collection = $database->users;

    // Read MongoDB
    $users = $collection->find();
    $usersArray = iterator_to_array($users);
    echo json_encode($usersArray);
} else {
    echo "Error updating data";
}}



?>
