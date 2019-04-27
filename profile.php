<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mesa Travel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <style>
      /**********
      Table Wrapper
      *************/
      .tblwrapper {
         width: 85%;
		 margin-right: auto;
		 margin-left: auto;
         margin-top: 50px;
      }
	  tr    {
		  width: 85%;
		  text-align: center;
	  }
      table {
         border-collapse: collapse;
		 margin-top: 100px;
      }
      td {
         border-bottom: 1px solid black;
         padding: 30px 15px;
      }

      tr:hover {

      }
    </style>
</head>
<body>


    <!-- Navigation Bar -->
    <ul class="navbar">
            <li id="navbranding" class="navitem"><a href="index.html">Black Mesa Travel</a></li>
            <li class="navitem" id="loginLink"><a href="login.html">Login/Signup</a></li>
            <li class="navitem"><a href="package.php">Premium Packages</a></li>
            <li class="navitem"><a href="#">Trending</a></li>
            <li class="navitem"><a href="index.html">Home</a></li>
    </ul>
    <br>
    <br>
    <br>
    <h1 style="margin-left:150px;margin-top:50px" id = "header"></h1>
	<?php
		if(isset($_COOKIE['email'])){
			$email = $_COOKIE['email'];
			$query = "select * from USER_TRANSACTIONS WHERE EmailAddress = '$email'";
			$connect = new PDO('mysql:host=mysql-bmtravel.cj3sjwqrps9d.us-east-1.rds.amazonaws.com;port=3306;dbname=BlackMesaTravel', 'masterUsername', 'blackmesatravel');
			//prepare the query for execution
			$statement = $connect->prepare($query);
			//execute query
			$statement->execute();
			//store the result
			$result = $statement->fetchAll();
			//gather total rows returned from query
			$total_row = $statement->rowCount();
			//initialize output variable
			$output="";
		
			echo "<table class=tblwrapper>";
			/*echo "<tr><th>Country</th><th>Location</th><th>Date Of Purchase</th><th>Price Per Day</th></tr>";*/
			foreach($result as $row){
			
				echo "<tr>";
				echo "<td>".$row['Country']."<td>";
				echo "<td>".$row['LocationName']."<td>";
				echo "<td>".$row['TransactionDate']."<td>";
				echo "<td>"."$".$row['PricePerDay']." per day"."<td>";
				echo "<tr>";
			}
			echo "<table>";
		}
		else{
		}
		
       ?>

</body>
<script>
	var x = document.cookie;
    var ca = x.split("; ");
    for(var i = 0; i < ca.length; i++){
        var c = ca[i].split("=");
        if(c[0] == "firstname"){
            document.getElementById("header").innerHTML = String(c[1]) + "'s Previous Purchases";
        }
    }
</script>

<script src="checkLogin.js"></script>

</html>