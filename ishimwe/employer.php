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
            background-color: green;
        }
    
        body {
            background-color: lightskyblue;

            margin: 30px 40px 50px 70px; 

        }

}
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
    <h1>employer Details</h1>
  <form method="post" onsubmit="return confirmInsert();">
        <label for="employer_id">employer_id:</label><br>
        <input type="text" id="employer_id" name="employer_id"><br><br>
        
        <label for="Names">Name:</label><br>
        <input type="text" id="name" name="Names"><br><br>
        
        <label for="identity_number">identity_number:</label><br>
        <input type="identity_number" id="identity_number" name="identity_number"><br><br>
        
        <label for="Phone_number">Phone Number:</label><br>
        <input type="text" id="Phone_number" name="phone_number"><br><br>
        
        <label for="email">email:</label><br>
        <input type="text" id="email" name="email"><br><br>
        
        <label for="address">address:</label><br>
        <input type="text" id="address" name="address"><br><br>

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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
    // Insert section
    $employer_id = $_POST['employer_id'];
    $Names = $_POST['Names'];
    $identity_number = $_POST['identity_number'];
    $phone_number = $_POST['phone_number']; // Corrected variable name
    $email = $_POST['email'];
    $address = $_POST['address'];

    $wc = $connection->prepare("INSERT INTO employer (employer_id, Names, identity_number, phone_number, email, address) VALUES (?, ?, ?, ?, ?, ?)");
    $wc->bind_param("isssss", $employer_id, $Names, $identity_number, $phone_number, $email, $address);

    if ($wc->execute()) {
        echo "New record has been added successfully.<br><br>
             <a href='home.html'>Back to Form</a>";
    } else {
        echo "Error inserting data: " . $wc->error;
    }

    $wc->close();
} 
?>
 <h2>Job Listings</h2>
    <table>
        <tr>
            <th>employer_id</th>
            <th>Names</th>
            <th>identity_number</th>
            <th>Phone_number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

        <?php
        // SQL query to fetch data from the employer table
        $sql = "SELECT * FROM employer";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["employer_id"] . "</td>
                    <td>" . $row["Names"] . "</td>
                    <td>" . $row["identity_number"] . "</td>
                    <td>" . $row["phone_number"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["address"] . "</td>
                    <td><a style='padding:4px' href='delete_employer.php?employer_id=" . $row["employer_id"] . "'>Delete</a></td>
                    <td><a style='padding:4px' href='update_employer.php?employer_id=" . $row["employer_id"] . "'>Update</a></td>
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