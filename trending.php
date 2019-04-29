<!--package.php allows the user to 
--  search through all available packages
--  via ajax-enabled filtering.
-->
<?php
    //echo include('http://localhost/Project/database_connection.php');
    //$connect = new PDO('mysql:host=localhost;dbname=BlackMesaTravel', 'iw3htp', 'password');
    //connecting to AWS instance of database
    $connect = new PDO('mysql:host=mysql-bmtravel.cj3sjwqrps9d.us-east-1.rds.amazonaws.com;port=3306;dbname=BlackMesaTravel', 'masterUsername', 'blackmesatravel');
    //echo $connect;
?>
<!DOCTYPE html>
<html>
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Packages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://localhost/Project/jquery-3.3.1.min.js"></script>
    <script src="http://localhost/Project/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="http://localhost/Project/jquery-ui.css">
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
      Buttons
      ***********/
      button {
         background-color: white;
         border: none;
         color: black;
         border: 2px solid #1CCAD8;
         border-radius: 5px;
         padding: 12px 14px;
         text-align: center;
         text-decoration: none;
         font-size: 16px;
         -webkit-transition-duration: 0.4s;
         transition-duration: 0.4s;
         cursor: pointer;
         margin-left: 150px;
      }
      button:hover {
         background-color: #1CCAD8;
         color: white;
      }
      /**********
      Filter
      ***********/
      .searched_package {
          display: grid;
          grid-template-columns: auto auto;
            padding: 0px 10px;
      }

     img {
         width: 400px;
         height: 200px;
     }

    </style>
   </head>
   <body>

      <!-- Navigation Bar -->
      <ul class="navbar">
         <li id="navbranding" class="navitem"><a href="index.php">Black Mesa Travel</a></li>
         <li class="navitem"><a href="login.html">Login/Signup</a></li>
         <li class="navitem"><a href="package.php">Premium Packages</a></li>
         <li class="navitem"><a href="trending.php">Trending</a></li>
         <li class="navitem"><a href="index.php">Home</a></li>
      </ul>

      <!-- Packages header -->
    <h1 style="text-align:center;">Trending Packages</h1>
    
    <div class="searched_package">
    <?php
        $query2 = "select DISTINCT i.url, l.locationname, l.country, b.biomename, p.priceperday, p.packageid, DATE_FORMAT(p.startdate, '%M %d, %Y') as startdate, DATE_FORMAT(p.enddate, '%M %d, %Y') as enddate from PREMIER_LOCATIONS l join BIOMES b on l.biomeid = b.biomeid join PACKAGES p on l.locationid = p.locationid join IMAGES i on l.locationid = i.locationid join PTRANSACTIONS pt on p.packageid = pt.packageid WHERE pt.transactiondate >= '2019-03-28';";
        //prepare the query for execution
        $statement = $connect->prepare($query2);
        //execute query
        $statement->execute();
        //store the result
        $result = $statement->fetchAll();
        //gather total rows returned from query
        $total_row = $statement->rowCount();
        //initialize output variable
        $output="";
        if($total_row > 0) {
            foreach($result as $row) {
                //create and output div for each package
                $output .= '
                    <div class="package">
                    <div style="border:1px solid #ccc; border-radius:5px;
                        padding:20px; margin:auto; margin-bottom:16px; height:400px; width:400px;">
                    <img src="'.$row['url'].'">
                    <h4 align="center">'. $row['locationname'] .', ' . $row['country'] . '</h4>
                    <p>'. $row['biomename'] .'<br/>
                    Start Date: '. $row['startdate'] .'<br/>
                    End Date: '. $row['enddate'] .'</p>
                    <p>$'. $row['priceperday'] .' per day</p>            
                    <button type="button" class="addtocart">Purchase</button>
                    <b id=' . $row['packageid'] . '></b>
                    </div>
                    </div>
                    
                ';
            }
        } else {
            $output = '<h3>No Data Found</h3>';
        }
        echo $output;
    ?>
    </div>
    <script>
        $(document).ready(function() {
            //Grabs whatever package you clicked, adds information as cookies
            var itemCount = 0;
            function foobar(){
                $('.addtocart').click(function() {
                    var p = this.parentNode;
                    var c = p.children;
                    itemCount++;
                    var PackageName = c[1].innerHTML;
                    var cost = c[3].innerHTML;
                    var id = c[5].id;
                    $.ajax({
                        url:"http://localhost/Project/additem.php",
                        method:"POST",
                        data:{
                            PackageName:PackageName,
                            cost:cost,
                            count:itemCount,
                            id:id
                        },
                        success:function(){
                            window.alert("Item added to cart!");
                            window.location.href = "http://localhost/Project/checkout.php";
                        }
                    });
                });
            }
            foobar();
        });
        
    </script>
   </body>
   
</html>