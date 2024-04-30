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

// Check if application_id is set
if (isset($_REQUEST['application_id'])) {
    $accid = $_REQUEST['application_id'];

    // Use prepared statement
    $stmt = $connection->prepare("SELECT * FROM application WHERE application_id = ?");
    $stmt->bind_param("i", $accid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = htmlspecialchars($row['Date'], ENT_QUOTES);
        $c = htmlspecialchars($row['status'], ENT_QUOTES);
        $d = htmlspecialchars($row['cover_letter'], ENT_QUOTES);
        $e = htmlspecialchars($row['job_id'], ENT_QUOTES);
        $f = htmlspecialchars($row['worker_id'], ENT_QUOTES);
    } else {
        echo "Page not found.";
        exit();
    }

    // Close statement
    $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update application</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update products form -->
    <h2><u>Update Form of products</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="Date">Date:</label>
        <input type="text" name="Date" value="<?php echo isset($b) ? $b : ''; ?>" required>
        <br><br>

        <label for="status">Status:</label>
        <input type="text" name="status" value="<?php echo isset($c) ? $c : ''; ?>" required>
        <br><br>

        <label for="cover_letter">Cover Letter:</label>
        <input type="text" name="cover_letter" value="<?php echo isset($d) ? $d : ''; ?>" required>
        <br><br>

        <label for="job_id">Job ID:</label>
        <input type="text" name="job_id" value="<?php echo isset($e) ? $e : ''; ?>" required>
        <br><br>

        <label for="worker_id">Worker ID:</label>
        <input type="text" name="worker_id" value="<?php echo isset($f) ? $f : ''; ?>" required>
        <br><br>

        <input type="submit" name="up" value="Update">
    </form>

</body>
</html>

<?php
// Handle form submission
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $Date = htmlspecialchars($_POST['Date'], ENT_QUOTES);
    $status = htmlspecialchars($_POST['status'], ENT_QUOTES);
    $cover_letter = htmlspecialchars($_POST['cover_letter'], ENT_QUOTES);
    $job_id = htmlspecialchars($_POST['job_id'], ENT_QUOTES);
    $worker_id = htmlspecialchars($_POST['worker_id'], ENT_QUOTES);

    // Use prepared statement for update
    $stmt = $connection->prepare("UPDATE application SET Date = ?, status = ?, cover_letter = ?, job_id = ?, worker_id = ? WHERE application_id = ?");
    $stmt->bind_param("sssssi", $Date, $status, $cover_letter, $job_id, $worker_id, $accid);

    if ($stmt->execute()) {
        // Redirect to worker.php on successful update
        header('Location: application.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        // Handle error (e.g., display an error message)
        echo "Failed to update. Please try again.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$connection->close();
?> 
