<?php
    //echo include('http://localhost/Project/database_connection.php');
    $connect = new PDO('mysql:host=localhost;dbname=BlackMesaTravel', 'iw3htp', 'password');
    //echo $connect;
?>
<!DOCTYPE html>
<html>
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Packages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" type="text/css" media="screen" href="package.css">-->
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
      }
      button:hover {
         background-color: #1CCAD8;
         color: white;
      }
      /**********
      Filter
      ***********/
      .filter {
          margin:auto;
      }

      .section {
          margin:auto;
          width:50%;
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
    <h1>Packages</h1>
    <div class="filter">
        <div class="section">
            <h3>Price</h3>
            <input type="hidden" id="hidden_minimum_price" value="0"/>
            <input type="hidden" id="hidden_maximum_price" value="1200"/>
            <p id="price_show">200-1200</p>
            <div id="price_range"></div>
        </div>
        <div class="section">
            <h3>Biome</h3>
            <?php
            $query = "SELECT BiomeName FROM Biomes ORDER BY BiomeName;"; //returns all biomes
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row) {
                ?>
                <label><input type="checkbox" class="common_selector biome"
                value="<?php echo $row['BiomeName']; ?>">
                <?php echo $row['BiomeName']; ?></label>
                <?php

            }
            ?>
        </div>
        <div class="section">
            <h3>Country</h3>
            <?php
            $query = "select distinct(Country) from premier_locations order by locationname;"; //returns all distinct countries
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row) {
                ?>
                <label><input type="checkbox" class="common_selector country"
                value="<?php echo $row['Country']; ?>">
                <?php echo $row['Country']; ?></label>
                <?php

            }
            ?>
        </div>
    </div>
    

    <div class="filter_data">
    </div>

    <script>
        $(document).ready(function() {
            filter_data();

            function filter_data() {
                var action = 'fetch_data';
                var minimum_price = $('#hidden_minimum_price').val();
                var maximum_price = $('#hidden_maximum_price').val();
                var biome = get_filter('biome');
                var country = get_filter('country');
                $.ajax({
                    url:"http://localhost/Project/fetch_data.php",
                    method:"POST",
                    data:{action:action, 
                    minimum_price:minimum_price, 
                    maximum_price:maximum_price, 
                    biome:biome, country:country},
                    success:function(data) {
                        $('.filter_data').html(data);
                    }
                });
            }
            
            function get_filter(class_name) {
                var filter = [];
                $('.'+class_name+':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function(){
                filter_data();
            });

            $('#price_range').slider({
                range:true,
                min:200,
                max:1200,
                values:[200, 1200],
                step:100,
                stop:function(event, ui) {
                    $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);//display min and max price
                    $('#hidden_minimum_price').val(ui.values[0]);
                    $('#hidden_maximum_price').val(ui.values[1]);
                    filter_data();
                }
            });
            
        });
    </script>
   </body>
</html>
