<?php
// Connection details
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

// Check if experience_id is set
if (isset($_REQUEST['experience_id'])) {
    $accid = $_REQUEST['experience_id'];

    // Use prepared statement
    $stmt = $connection->prepare("SELECT * FROM experience WHERE experience_id = ?");
    $stmt->bind_param("i", $accid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['job_title'];
        $c = $row['duration'];
        $d = $row['reference'];
        $e = $row['worker_id'];
    } else {
        echo "page not found.";
        exit();
    }

    // Close statement
    $stmt->close();
}
?>

<html>
<body>
    <form method="POST">
        <label for="job_title">job_title:</label>
        <input type="text" name="job_title" value="<?php echo isset($b) ? htmlspecialchars($b, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="duration"> duration :</label>
        <input type="text" name="duration" value="<?php echo isset($c) ? htmlspecialchars($c, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="reference"> reference :</label>
        <input type="text" name="reference" value="<?php echo isset($d) ? htmlspecialchars($d, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="worker_id"> worker_id:</label>
        <input type="text" name="worker_id" value="<?php echo isset($e) ? htmlspecialchars($e, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <input type="submit" name="up" value="Update">
    </form>

</body>
</html>

<?php
// Handle form submission
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $job_title = htmlspecialchars($_POST['job_title'], ENT_QUOTES);
    $duration = htmlspecialchars($_POST['duration'], ENT_QUOTES);
    $reference = htmlspecialchars($_POST['reference'], ENT_QUOTES);
    $worker_id = htmlspecialchars($_POST['worker_id'], ENT_QUOTES);

    // Use prepared statement for update
    $stmt = $connection->prepare("UPDATE experience SET job_title = ?, duration = ?, reference = ?, worker_id = ? WHERE experience_id = ?");
    $stmt->bind_param("ssssi", $job_title, $duration, $reference, $worker_id, $accid);

    if ($stmt->execute()) {
        // Redirect to employer.php on successful update
        header('Location: experience.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        // Handle error (e.g., display an error message)
        echo "Failed to update page. Please try again.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$connection->close();
?>
