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
if(isset($_REQUEST['jobpreference_id'])) {
    $jobpreference_id = $_REQUEST['jobpreference_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM jobpreference WHERE jobpreference_id=?");
    $stmt->bind_param("i", $jobpreference_id);
     ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="jobpreference" value="<?php echo $jobpreference; ?>">
            <input type="submit" value="Delete">
        </form>
     <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }
}
?>
</body>
</html>
<?php

    $stmt->close();
} else {
    echo "jobpreference_id Id is not set.";
}

$connection->close();
?>
