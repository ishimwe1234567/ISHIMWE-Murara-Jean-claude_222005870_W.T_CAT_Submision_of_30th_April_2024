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

// Check if worker_id is set
if (isset($_REQUEST['worker_id'])) {
    $accid = $_REQUEST['worker_id'];

    // Use prepared statement
    $stmt = $connection->prepare("SELECT * FROM worker WHERE worker_id = ?");
    $stmt->bind_param("i", $accid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $a = $row['worker_id'];
        $b = $row['Names'];
        $c = $row['Email'];
        $d = $row['Phone_number'];
        $e = $row['nationality'];
        $f = $row['experience'];
        $g = $row['certificate'];
    } else {
        echo "Worker not found.";
    }

    // Close statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update worker</title>
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
        <label for="Names">Names:</label>
        <input type="text" name="Names" value="<?php echo isset($b) ? htmlspecialchars($b, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="Email">Email:</label>
        <input type="text" name="Email" value="<?php echo isset($c) ? htmlspecialchars($c, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="Phone_number">Phone number:</label>
        <input type="text" name="Phone_number" value="<?php echo isset($d) ? htmlspecialchars($d, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="nationality">Nationality:</label>
        <input type="text" name="nationality" value="<?php echo isset($e) ? htmlspecialchars($e, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="experience">Experience:</label>
        <input type="text" name="experience" value="<?php echo isset($f) ? htmlspecialchars($f, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="certificate">Certificate:</label>
        <input type="text" name="certificate" value="<?php echo isset($g) ? htmlspecialchars($g, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <input type="submit" name="up" value="Update">
    </form>

</body>
</html>

<?php
// Handle form submission
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $Names = htmlspecialchars($_POST['Names'], ENT_QUOTES);
    $Email = htmlspecialchars($_POST['Email'], ENT_QUOTES);
    $Phone_number = htmlspecialchars($_POST['Phone_number'], ENT_QUOTES);
    $nationality = htmlspecialchars($_POST['nationality'], ENT_QUOTES);
    $experience = htmlspecialchars($_POST['experience'], ENT_QUOTES);
    $certificate = htmlspecialchars($_POST['certificate'], ENT_QUOTES);

    // Use prepared statement for update
    $stmt = $connection->prepare("UPDATE worker SET Names = ?, Email = ?, Phone_number = ?, nationality = ?, experience = ?, certificate = ? WHERE worker_id = ?");
    $stmt->bind_param("ssssssi", $Names, $Email, $Phone_number, $nationality, $experience, $certificate, $accid);

    if ($stmt->execute()) {
        // Redirect to worker.php on successful update
        header('Location: worker.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        // Handle error (e.g., display an error message)
        echo "Failed to update worker. Please try again.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$connection->close();
?> 
