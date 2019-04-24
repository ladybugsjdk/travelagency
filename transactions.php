<!DOCTYPE html>
<html>
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Your Transactions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" type="text/css" media="screen" href="package.css">-->
    <style>
      body {
         font-family: Arial, Helvetica, sans-serif;
         margin: 0;
         padding: 0;
      }

      /***********
      Nav Bar section
      ***********/
      .navbar {
         list-style-type: none;
         margin: 0;
         padding: 0;
         position: fixed;
         top: 0;
         width: 100%;
         overflow: auto;
         z-index: 1000;
         background-color: #1CCAD8;
         -webkit-box-shadow: 0px 3px 7px 0px rgba(0,0,0,0.55);
         -moz-box-shadow: 0px 3px 7px 0px rgba(0,0,0,0.55);
         box-shadow: 0px 3px 7px 0px rgba(0,0,0,0.55);
      }

      #navbranding {
         float: left;
         font-size: 21px;
      }

      .navitem {
         float: right;
         font-size: 18px;
      }


      .navbar li a {
         text-decoration: none;
         display: block;
         color: white;
         text-align: center;
         padding: 15px 18px;
      }

      h1 {
         margin-top: 100px;
         text-align: center;
      }

      /**********
      Table Wrapper
      *************/
      .tblwrapper {
         width: 85%;
		 margin-right: auto;
		 margin-left: auto;
         margin-top: 100px;
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

      /**********
      Buttons
      ***********/
      button {
         background-color: white;
         border: none;
         color: black;
         border: 2px solid #1CCAD8;
         border-radius: 5px;
         padding: 12px 12px;
         text-align: center;
         text-decoration: none;
         font-size: 16px;
         -webkit-transition-duration: 0.4s;
         transition-duration: 0.4s;
         cursor: pointer;
      }
      button:hover {
         background-color: #1CCAD8;
         color: white;
      }
    </style>
   </head>
   <body>
      <!-- Navigation Bar -->
      <ul class="navbar">
         <li id="navbranding" class="navitem"><a href="index.html">Black Mesa Travel</a></li>
         <li class="navitem"><a href="login.html">Login/Signup</a></li>
         <li class="navitem"><a href="packages.php">Premium Packages</a></li>
         <li class="navitem"><a href="#">Trending</a></li>
         <li class="navitem"><a href="index.html">Home</a></li>
      </ul>
	
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
				echo "<td>".$row['PricePerDay']."<td>";
				echo "<tr>";
			}
			echo "<table>";
		}
		else{
		}
		
       ?>
		<!-- end PHP script -->
        
				
	</body>
</html>