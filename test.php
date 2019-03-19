<?php
$query = "INSERT INTO Users (UserID, FirstName, LastName, Email, uPassword)
VALUES (2, John, Doe, jdoe@email.com, hello);";

if(!($database = mysql_connect("localhost:3306", "root", "password")))
    die("Could not connect");

if(!mysql_select_db("Blackmesatravel", $database))
    die("Could not open database");

if(!($result = mysql_query($query, $database))) {
    die("ahhhh");
}

mysql_close($database);

?>