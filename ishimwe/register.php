<?php

$host = "localhost";
$user = "murara";
$pass = "222005870";
$database = "workers_for_constructions";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname  = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $activation_code = $_POST['activation_code'];
    
    $sql = "INSERT INTO user (Firstname, Lastname, Username, Email, Telephone, Password, Activation_code ) 
    VALUES ('$fname','$lname','$username','$email','$telephone','$password','$activation_code')";

    if ($connection->query($sql) === TRUE) {
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
$connection->close();
?>