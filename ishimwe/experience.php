<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>

  <style>
          table {
            width: 50%;
            border-collapse: collapse;
        }

        th, td {
            border: 2px solid black;
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: red;
        }
    
        body {
            background-color: lightskyblue;

            margin: 30px 40px 50px 70px; 

        }
  .dropdown {
    position: relative;
    display: inline;
    margin-right: 10px;
  }
  .dropdown-contents {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    left: 0; /* Aligning dropdown contents to the left */
  }
  .dropdown:hover .dropdown-contents {
    display: block;
  }
  .dropdown-contents a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  .dropdown-contents a:hover {
    background-color: #f1f1f1;
  }
  header{
    background-color:orange;
    padding: 50px;
}
  section{
    padding:175px;
    border-bottom: 1px solid #ddd;
}
footer{
    text-align: center;
    padding: 35px;
    background-color:orange;
}
</style>
</style>
  <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>
</head>
<header>
<body style="background-image: url('./image/hp.jpg');">
<body style="background-image: url('.pic.jpeg');">
  <ul style="list-style-type: none; padding: 0;">
    <!-- Navigation items -->
    <!-- Adjusted the margin-right for each li to align the items properly -->
    <li style="display: inline; margin-right: 10px;"><a href="./home.html" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">HOME</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">ABOUT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">CONTACT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./application.php" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">APPLICATION</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./employer.php" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">EMPLOYER</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./experience.php" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">EXPERIENCE</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./job.php" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">JOB</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./jobpreference.php" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">JOB PREFERENCE</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./worker.php" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">WORKER</a></li>
    <!-- Adjusted the margin-right for the dropdown li to align the dropdown properly -->
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: white; background-color: darkgreen; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Login</a>
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li>
  </ul>
  <!-- <div class="col-3 offset">-->
  <form class="d-flex" role="search" action="search.php">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
</header>
<section>
<body>
    <h1>experience Details</h1>
    <form method="post" onsubmit="return confirmInsert();">
        <label for="experience_id">experience_id:</label><br>
        <input type="text" id="experience_id" name="experience_id"><br><br>

        <label for="job_title">job_title:</label><br>
        <input type="text" id="job_title" name="job_title"><br><br>
        
        <label for="duration">duration:</label><br>
        <input type="text" id="duration" name="duration"><br><br>
        
        <label for="reference">reference:</label><br>
        <input type="text" id="reference" name="reference"><br><br>
        
        <label for="worker_id">worker_id:</label><br>
        <input type="Number" id="worker_id" name="worker_id"><br><br>
        

        <input type="submit" name="insert" value="Insert"><br><br>

        <a href="./home.html">Go Back to Home</a>
       </form>
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

    // Check if the form is submitted for insert
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
 
        // Insert section
        $experience_id =$_POST['experience_id'];
        $job_title= $_POST['job_title'];
        $duration = $_POST['duration'];
        $reference = $_POST['reference'];
        $worker_id= $_POST['worker_id']; 

        $wc = $connection->prepare("INSERT INTO experience(experience_id,job_title, duration, reference, worker_id) VALUES (?,?, ?, ?, ?)");
        $wc->bind_param("issss", $experience_id, $job_title, $duration, $reference, $worker_id);

        if ($wc->execute()) {
            echo "New record has been added successfully";
                 
        } else {
            echo "Error inserting data: " . $wc->error;
        }

        $wc->close();
    } 
?>

<h2>experience_id</h2>
<table>
    <tr>
        <th>experience_id</th>
        <th>job_title </th>
        <th>duration</th>
        <th>reference</th>
        <th>worker_id</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>

    <?php
    // SQL query to fetch data from the experience table
    $sql = "SELECT * FROM experience";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["experience_id"] . "</td>
                <td>" . $row["job_title"] . "</td>
                <td>" . $row["duration"] . "</td>
                <td>" . $row["reference"] . "</td>
                <td>" . $row["worker_id"] . "</td>
                <td><a style='padding:4px' href='delete_experience.php?experience_id=" . $row["experience_id"] . "'>Delete</a></td>
                <td><a style='padding:4px' href='update_experience.php?experience_id=" . $row["experience_id"] . "'>Update</a></td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No data found</td></tr>";
    }
    // Close connection
    $connection->close();
    ?>
</table>

   </body>
</section>
   <footer>
  <!-- Footer content here -->
  <marquee><i style="color: green;">&copy; 2024</i><b>WEB TECHNOLOGY CAT</b></marquee>
  </footer>
</body>

</html>
