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

		$email = $_POST["email"];
		$password = $_POST["password"];
        
        
        $query = "SELECT * FROM Users WHERE EmailAddress = '$email' AND uPassword ='$password'";
        //build query
        if( !($database = mysqli_connect("localhost", "iw3htp", "password"))) {
            echo("<script>console.log('Could not connect to database');</script>");
            die("Could not connect to database</body></html>");
        }

        if ( !mysqli_select_db( $database, "BlackMesaTravel" ) ) {
           echo("<script>console.log('Could not open database');</script>");
           die("Could not open database</body></html>");
        }
        
        /*
        if ( !( $result = mysqli_query( $database, $query ) ) ) {
            print("<p>Could not execute $query!</p>");
            die(mysqli_error() . "</body></html>");
            echo("<script>console.log('Could not execute $query!');</script>");
        }
        */

        $result = mysqli_query($database, $query);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();

            if($email == $row["EmailAddress"] && $password == $row["uPassword"]){
                $cookie_firstname = $row["FirstName"];
                $cookie_lastname = $row["LastName"];

                setcookie("email", $email, time() + 300, "/"); //time + 300 = cookie lasts for 5 minutes
                setcookie("firstname", $cookie_firstname, time() + 300, "/");
                setcookie("lastname", $cookie_lastname, time() + 300, "/");
                echo("<script>console.log('cookies created!');</script>");
            }else{
                echo("<script>console.log('No user found, cookies not created.');</script>");
            }
        }
        
        echo("<script>console.log('success?');</script>");

        mysqli_close( $database );
        
    ?>
  <!-- Navigation Bar -->
  <ul class="navbar">
    <li id="navbranding" class="navitem"><a href="index.html">Black Mesa Travel</a></li>
    <li class="navitem"><a href="login.html">Login/Signup</a></li>
    <li class="navitem"><a href="packages.php">Premium Packages</a></li>
    <li class="navitem"><a href="#">Trending</a></li>
    <li class="navitem"><a href="index.html">Home</a></li>
  </ul>
  <h1>Welcome</h1>
</body>
</html>
