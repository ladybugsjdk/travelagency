<?php 


//storing info from form into variables

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$pass = $_POST["password"];
$verPass = $_POST["verpassword"];
//verify passwords here

$host = "local"

$conn = new mysqli($)

$query = "INSERT INTO Users (UserID, FirstName, LastName, Email, uPassword)
VALUES (2," . $fname . "," . $lname . "," . $email . "," . $pass . ");";

if(!($database = mysql_connect("localhost", "root", "password")))
    die("Could not connect");

if(!mysql_select_db("Blackmesatravel", $database))
    die("Could not open database");

if(!($result = mysql_query($query, $database))) {
    die("ahhhh");
}

mysql_close($database);

?>