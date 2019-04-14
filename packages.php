<?php
   include('database_connection.php');
?>
<!DOCTYPE html>
<html>
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Packages</title>
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
         margin: auto;
      }
      table {
         border-collapse: collapse;
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
         // build SELECT query
         $query = "select pl.locationname AS Location, pl.country AS Country, pl.description AS Description,
         b.biomename AS Biome, a.activityname1 AS 'Activity 1', a.activityname2 AS 'Activity 2', a.activityname3 AS 'Activity 3',
         pa.priceperday AS 'Price Per Day', DATE_FORMAT(pa.startdate, '%M %d %Y') AS 'Start Date', DATE_FORMAT(pa.enddate, '%M %d %Y') AS 'End Date'
      from premier_locations pl join activities a
               join packages pa
               join biomes b
      where pl.locationid = a.locationid
         AND
         pl.locationid = pa.locationid
         AND
         pl.biomeid = b.biomeid;";

         // Connect to MySQL
         if ( !( $database = mysqli_connect( "localhost",
            "iw3htp", "password" ) ) )                      
            die( "Could not connect to database </body></html>" );
   
         // open Products database
         if ( !mysqli_select_db( $database, "blackmesatravel" ) )
            die( "Could not open products database </body></html>" );

         // query Products database
         if ( !( $result = mysqli_query( $database, $query) ) ) 
         {
            print( "<p>Could not execute query!</p>" );
            die( mysqli_error() . "</body></html>" );
         } // end if

         mysqli_close( $database );
      ?><!-- end PHP script -->
      <h1>Packages</h1>
      <div class="tblwrapper">
         <table>
            <?php
               // fetch each record in result set
               while ( $row = mysqli_fetch_row( $result ) )
               {
                  // build table to display results
                  print( "<tr>" );

                  foreach ( $row as $value ) 
                     print( "<td>$value</td>" );

                  print( "<td><button type='button'>Purchase</button></td>" );
                  print( "</tr>" );
               } // end while
            ?><!-- end PHP script -->
         </table>
      </div>
   </body>
</html>
