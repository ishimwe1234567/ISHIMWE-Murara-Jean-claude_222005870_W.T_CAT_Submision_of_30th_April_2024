<?php
    // Connection details
    $host = "localhost";
    $user = "murara";
    $pass = "2220190";
    $database = "workers_for_constructions";

    // Creating connection
    $connection = new mysqli($host, $user, $pass, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }