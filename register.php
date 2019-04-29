<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="profile.css">
    <script src="http://localhost/Project/jquery-3.3.1.min.js"></script>
</head>
<body>
    <?php
        $fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		
		$query = "INSERT INTO Users (FirstName, LastName, EmailAddress, 
			uPassword) VALUES ('" . $fname . "', '" . $lname . "', '" . $email . "', '" . $password . "');";

        //build query
        if( !($database = mysqli_connect("mysql-bmtravel.cj3sjwqrps9d.us-east-1.rds.amazonaws.com:3306", "masterUsername", "blackmesatravel"))) {
            die("Could not connect to database</body></html>");
        }

        if ( !mysqli_select_db( $database, "BlackMesaTravel" ) ) {
            die("Could not open database</body></html>");
        }

        if ( !( $result = mysqli_query( $database, $query ) ) ) {
            print("<p>Could not execute $query!</p>");
            die(mysqli_error() . "</body></html>");
        }

        mysqli_close( $database );

        echo "<h1>Account Created Successfully</h1>";
        echo "<p style='margin-left: 200px'>Please login</p>";
    ?>
  <!-- Navigation Bar -->
  <ul class="navbar">
    <li id="navbranding" class="navitem"><a href="index.php">Black Mesa Travel</a></li>
    <li class="navitem"><a href="login.html">Login/Signup</a></li>
    <li class="navitem"><a href="package.php">Premium Packages</a></li>
    <li class="navitem"><a href="#">Trending</a></li>
    <li class="navitem"><a href="index.php">Home</a></li>
  </ul>

</body>
</html>
