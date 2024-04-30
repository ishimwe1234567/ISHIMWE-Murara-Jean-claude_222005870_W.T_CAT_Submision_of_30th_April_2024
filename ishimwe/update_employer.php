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

// Check if employer_id is set
if (isset($_REQUEST['employer_id'])) {
    $accid = $_REQUEST['employer_id'];

    // Use prepared statement
    $stmt = $connection->prepare("SELECT * FROM employer WHERE employer_id = ?");
    $stmt->bind_param("i", $accid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['Names'];
        $c = $row['identity_number'];
        $d = $row['phone_number'];
        $e = $row['email'];
        $f = $row['address'];
    } else {
        echo "Employer not found.";
        exit();
    }

    // Close statement
    $stmt->close();
}
?>

<html>
<body>
    <form method="POST">
        <label for="Names">Names:</label>
        <input type="text" name="Names" value="<?php echo isset($b) ? htmlspecialchars($b, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="identity_number">Identity number:</label>
        <input type="text" name="identity_number" value="<?php echo isset($c) ? htmlspecialchars($c, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="Phone_number">Phone number:</label>
        <input type="text" name="Phone_number" value="<?php echo isset($d) ? htmlspecialchars($d, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="Email">Email:</label>
        <input type="text" name="Email" value="<?php echo isset($e) ? htmlspecialchars($e, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="Address">Address:</label>
        <input type="text" name="Address" value="<?php echo isset($f) ? htmlspecialchars($f, ENT_QUOTES) : ''; ?>" required>
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
    $identity_number = htmlspecialchars($_POST['identity_number'], ENT_QUOTES);
    $Phone_number = htmlspecialchars($_POST['Phone_number'], ENT_QUOTES);
    $Email = htmlspecialchars($_POST['Email'], ENT_QUOTES);
    $Address = htmlspecialchars($_POST['Address'], ENT_QUOTES);

    // Use prepared statement for update
    $stmt = $connection->prepare("UPDATE employer SET Names = ?, identity_number = ?, Phone_number = ?, Email = ?, Address = ? WHERE employer_id = ?");
    $stmt->bind_param("sssssi", $Names, $identity_number, $Phone_number, $Email, $Address, $accid);

    if ($stmt->execute()) {
        // Redirect to employer.php on successful update
        header('Location: employer.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        // Handle error (e.g., display an error message)
        echo "Failed to update employer. Please try again.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$connection->close();
?>
