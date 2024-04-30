<?php
// Check if the 'query' GET parameter is set and not empty
if (isset($_GET['query']) && !empty($_GET['query'])) {
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

    // Prepare a statement to prevent SQL injection
    $searchTerm = "%" . $connection->real_escape_string($_GET['query']) . "%";

    // Queries for different tables
    $queries = [
        'worker' => "SELECT Names FROM worker WHERE Names LIKE ?",
        'jobpreference' => "SELECT mobility FROM jobpreference WHERE mobility LIKE ?",
        'job' => "SELECT skills FROM job WHERE skills LIKE ?",
        'experience' => "SELECT job_title FROM experience WHERE job_title LIKE ?",
        'employer' => "SELECT address FROM employer WHERE address LIKE ?",
        'application' => "SELECT status FROM application WHERE status LIKE ?",
    ];

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            echo "<p>Error executing query for table $table: " . $connection->error . "</p>";
            continue; // Skip to the next query
        }

        echo "<h3>Table: $table</h3>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row[array_keys($row)[0]] . "</p>"; // Dynamic field extraction from result
            }
        } else {
            echo "<p>No results found in $table matching the search term: '" . $_GET['query'] . "'</p>";
        }

        $stmt->close();
    }

    // Close the connection
    $connection->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>
