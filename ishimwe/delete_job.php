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
if(isset($_REQUEST['job_id'])) {
    $job_id = $_REQUEST['job_id'];
    
    // Prepare and execute the DELETE statement
    $wc = $connection->prepare("DELETE FROM job WHERE job_id=?");
    $wc->bind_param("i", $job_id);
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
            <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($wc->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $wc->error;
    }
     }
    ?>
</body>
</html>
<?php

    $wc->close();
} else {
    echo "job_id is not set.";
}

$connection->close();
?>
