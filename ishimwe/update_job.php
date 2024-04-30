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

// Check if job_id is set
if (isset($_REQUEST['job_id'])) {
    $job_id = $_REQUEST['job_id'];

    // Use prepared statement
    $stmt = $connection->prepare("SELECT * FROM job WHERE job_id = ?");
    $stmt->bind_param("i", $job_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $location = $row['location'];
        $description = $row['description'];
        $skills = $row['skills'];
        $compansation = $row['compansation'];
        $employer_id = $row['employer_id'];
    } else {
        echo "Job not found.";
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

<html>
<body>
    <form method="POST">
        <label for="location">Location:</label>
        <input type="text" name="location" value="<?php echo isset($location) ? htmlspecialchars($location, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="description">Description:</label>
        <input type="text" name="description" value="<?php echo isset($description) ? htmlspecialchars($description, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="skills">Skills:</label>
        <input type="text" name="skills" value="<?php echo isset($skills) ? htmlspecialchars($skills, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="compensation">Compansation:</label>
        <input type="text" name="compensation" value="<?php echo isset($compansation) ? htmlspecialchars($compansation, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="employer_id">Employer ID:</label>
        <input type="text" name="employer_id" value="<?php echo isset($employer_id) ? htmlspecialchars($employer_id, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <input type="submit" name="up" value="Update">
    </form>

</body>
</html>

<?php
// Handle form submission
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $location = htmlspecialchars($_POST['location'], ENT_QUOTES);
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES);
    $skills = htmlspecialchars($_POST['skills'], ENT_QUOTES);
    $compansation = htmlspecialchars($_POST['compansation'], ENT_QUOTES);
    $employer_id = htmlspecialchars($_POST['employer_id'], ENT_QUOTES);

    // Use prepared statement for update
    $stmt = $connection->prepare("UPDATE job SET location = ?, description = ?, skills = ?, compansation = ?, employer_id = ? WHERE job_id = ?");
    $stmt->bind_param("sssssi", $location, $description, $skills, $compansation, $employer_id, $job_id);

    if ($stmt->execute()) {
        // Redirect to job.php on successful update
        header('Location: job.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        // Handle error (e.g., display an error message)
        echo "Failed to update job. Please try again.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$connection->close();
?>
