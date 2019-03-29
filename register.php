<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inserted</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <p>Inserted.</p>
    </table>
</body>
</html>
