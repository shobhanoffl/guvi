<?php
require "assets/vendor/autoload.php";
// $client = new \MongoDB\Client("mongodb://localhost:27017/");
// // var_dump($result1);
// // Select database and collection
// $database = $client->guvi;
// $collection = $database->users;

// // Get all users from MongoDB
// $users = $collection->find();

// // Convert users to array
// $usersArray = iterator_to_array($users);

// // Echo users as JSON
// echo json_encode($usersArray);
$redis = new Predis\client();
echo $redis->ping();

// Start Redis session
session_start();

// Set Redis server information
$redisHost = 'localhost';
$redisPort = 6379;

// Connect to Redis server
$redis = new Redis();
$redis->connect($redisHost, $redisPort);

// Set session ID as Redis key
$key = 'session:' . session_id();

// Check if session exists in Redis
if ($redis->exists($key)) {
    // Retrieve session data from Redis
    $sessionData = $redis->get($key);

    // Unserialize session data into array
    $sessionArray = unserialize($sessionData);

    // Set session variables from Redis data
    $_SESSION['username'] = $sessionArray['username'];
    $_SESSION['email'] = $sessionArray['email'];
} else {
    // Set session variables from SQL database
    // ...
    
    // Store session data in Redis
    $sessionData = serialize($_SESSION);
    $redis->set($key, $sessionData);
}

// Update session data in Redis
$sessionData = serialize($_SESSION);
$redis->set($key, $sessionData);

// End Redis session
session_write_close();
?>