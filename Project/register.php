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
        if( !($database = mysqli_connect("localhost", "iw3htp", "password"))) {
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
    ?>
  <!-- Navigation Bar -->
  <ul class="navbar">
    <li id="navbranding" class="navitem"><a href="index.html">Black Mesa Travel</a></li>
    <li class="navitem"><a href="login.html">Login/Signup</a></li>
    <li class="navitem"><a href="packages.html">Premium Packages</a></li>
    <li class="navitem"><a href="#">Trending</a></li>
    <li class="navitem"><a href="index.html">Home</a></li>
  </ul>
  <h1 style="top: 500px;">Welcome, <?php print($fname . " " . $lname . ".") ?></h1>
</body>
</html>
