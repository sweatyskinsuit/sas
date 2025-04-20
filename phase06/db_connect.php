<?php
$host = 'localhost';
$username = 'your_username';
$password = 'your_password';
$dbname = 'test_db';
// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Prepare an insert statement
$sql = "INSERT INTO test_users (username, email) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "ss", $username, $email);
// Set parameters and execute
$username = 'testUser';
$email = 'test@example.com';
mysqli_stmt_execute($stmt);
echo "New record created successfully";
// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);