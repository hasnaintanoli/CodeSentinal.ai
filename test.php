<?php
// BAD PRACTICE: Hardcoded admin password
$admin_pass = "123456";

// BAD PRACTICE: No input sanitization
$username = $_GET['username'];
$password = $_GET['password'];

// Admin check
if ($username == "admin" && $password == $admin_pass) {
    echo "Welcome admin!<br>";
    echo "Secret: " . file_get_contents("secret.txt");
} else {
    echo "Access denied!<br>";
}

// BAD PRACTICE: Database connection with root user and no password
$conn = mysqli_connect("localhost", "root", "", "test_db");

// BAD PRACTICE: SQL Injection possible
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);

// BAD PRACTICE: No error handling
while ($row = mysqli_fetch_assoc($result)) {
    echo "User: " . $row['username'] . "<br>";
}

// BAD PRACTICE: Connection not closed
?>
