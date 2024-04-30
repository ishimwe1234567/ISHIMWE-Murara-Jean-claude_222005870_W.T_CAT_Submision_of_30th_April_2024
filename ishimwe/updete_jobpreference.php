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

// Check if jobpreference_id is set
if (isset($_REQUEST['jobpreference_id'])) {
    $jobpreference_id = $_REQUEST['jobpreference_id'];

    // Use prepared statement
    $stmt = $connection->prepare("SELECT * FROM jobpreference WHERE jobpreference_id = ?");
    $stmt->bind_param("i", $jobpreference_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $job_type = $row['job_type'];
        $work_schedule = $row['work_schedule'];
        $compansation = $row['compansation'];
        $mobility = $row['mobility'];
        $worker_id = $row['worker_id'];
    } else {
        echo "jobpreference not found.";
    }

    // Close statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update jobpreference</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update jobpreference form -->
    <h2><u>Update Form of jobpreference</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="job_type">job_type:</label>
        <input type="text" name="job_type" value="<?php echo isset($job_type) ? htmlspecialchars($job_type, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="work_schedule">work_schedule:</label>
        <input type="text" name="work_schedule" value="<?php echo isset($work_schedule) ? htmlspecialchars($work_schedule, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="compansation">compansation:</label>
        <input type="text" name="compansation" value="<?php echo isset($compansation) ? htmlspecialchars($compansation, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="mobility">mobility:</label>
        <input type="text" name="mobility" value="<?php echo isset($mobility) ? htmlspecialchars($compansation, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="worker_id">worker_id:</label>
        <input type="text" name="worker_id" value="<?php echo isset($worker_id) ? htmlspecialchars($worker_id, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <input type="submit" name="up" value="Update">
    </form>

</body>
</html>

<?php
// Handle form submission
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $job_type = htmlspecialchars($_POST['job_type'], ENT_QUOTES);
    $work_schedule = htmlspecialchars($_POST['work_schedule'], ENT_QUOTES);
    $compansation = htmlspecialchars($_POST['compansation'], ENT_QUOTES);
    $mobility = htmlspecialchars($_POST['mobility'], ENT_QUOTES);
    $worker_id = htmlspecialchars($_POST['worker_id'], ENT_QUOTES);

    // Use prepared statement for update
    $stmt = $connection->prepare("UPDATE jobpreference SET job_type = ?, work_schedule = ?, compansation = ?, mobility = ?, worker_id = ? WHERE jobpreference_id = ?");
    $stmt->bind_param("sssssi", $job_type, $work_schedule, $compansation, $mobility, $worker_id, $jobpreference_id);
    if ($stmt->execute()) {
        // Redirect to jobpreference.php on successful update
        header('Location: jobpreference.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        // Handle error (e.g., display an error message)
        echo "Failed to update jobpreference. Please try again.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$connection->close();
?>
