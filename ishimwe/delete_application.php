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
if(isset($_REQUEST['application_id'])) {
    $application_id = $_REQUEST['application_id'];
    
    // Prepare and execute the DELETE statement
    $wc = $connection->prepare("DELETE FROM application WHERE application_id=?");
    $wc->bind_param("i", $application_id);
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
            <input type="hidden" name="application_id" value="<?php echo $application_id; ?>">
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
    echo "application_id is not set.";
}

$connection->close();
?>
