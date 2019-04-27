<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mesa Travel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="http://localhost/Projects/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="main.js"></script>
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

  <!-- Image sliders -->
  <div class="slider">
    <figure>
    <div class="slide">
      <p class="slidertext">Welcome to Black Mesa Travel</p>
      <img src="http://localhost/Project/img/img1.jpeg">
    </div>
    <div class="slide">
      <p class="slidertext">We have the best deals!</p>
      <img src="http://localhost/Project/img/img2.jpeg">
    </div>
    <div class="slide">
      <p class="slidertext">Build your own package!</p>
      <img src="http://localhost/Project/img/img3.jpeg">
    </div>
    <div class="slide">
      <p class="slidertext">Check out the trending page.</p>
      <img src="http://localhost/Project/img/img4.jpeg">
    </div>
    <div class="slide">
      <p class="slidertext">Book your dream destination.</p>
      <img src="http://localhost/Project/img/img5.jpeg">
    </div>
    </figure>
  </div>

  <!-- Search bar -->
  <div class="search">
    <h2>Where you do you want to go?</h2>
    <form method="post" action="index.php?go"  id="searchform">
      <input type="text" name="searchLocation" placeholder="Search for locations...">
      <input type="submit" name="submit" value="Search">
    </form>
    <?php
        //checking to see if submit is clicked and if user has entered a location
  if(isset($_POST['submit'])){
  if(isset($_GET['go'])){
  if(preg_match("/^[A-Z]+/", $_POST['searchLocation'])){
  $locationname=$_POST['searchLocation'];
  //connect  to the database
  $db=new mysqli("mysql-bmtravel.cj3sjwqrps9d.us-east-1.rds.amazonaws.com", "masterUsername",  "blackmesatravel", "BlackMesaTravel") or die ('I cannot connect to the database  because: ' . mysql_error());
  //-query  the database table
  $sql = "select i.url, l.locationname, l.country, b.biomename, p.priceperday, p.packageid, DATE_FORMAT(p.startdate, '%M %d, %Y') as startdate, DATE_FORMAT(p.enddate, '%M %d, %Y') as enddate from PREMIER_LOCATIONS l join BIOMES b on l.biomeid = b.biomeid join PACKAGES p on l.locationid = p.locationid join IMAGES i on l.locationid = i.locationid WHERE l.locationname LIKE '" . $locationname .  "'";
  //$sql="SELECT  ID, FirstName, LastName FROM Contacts WHERE FirstName LIKE '%" . $name .  "%' OR LastName LIKE '%" . $name ."%'";
  //-run  the query against the mysql query function
  $result=$db->query($sql);
  //-create  while loop and loop through result set
  while($row=mysqli_fetch_array($result)){
          $url=$row['url'];
          $locationname=$row['locationname'];
          $country=$row['country'];
          $biome=$row['biomename'];
          $priceperday=$row['priceperday'];
          $packageid=$row['packageid'];
          $startdate=$row['startdate'];
          $enddate=$row['enddate'];
  //-display the result of the array
  echo "<ul>\n";
  echo "<li>" . "<a href=\"package.php?locationname=$locationname\">". $locationname ."</a></li>\n";
  echo "</ul>";
  }
  }
  else{
  echo  "<p>Please enter a search query</p>";
  }
  }
  }
?>
  </div>

  <!-- Advanced search -->
  <div class="advsearch">
    <p id="showForm">Not sure? <a href=#>We can help you choose.</a></p>
      <form>
          <div class="togglesearch">
          <h2>Let's start off by selecting activities that are interesting to you.</h2>
          <div class="gridcontainer">
            <h4>Activity 1</h4>
            <div class="styled-select black rounded griditem">
              <select>
                <option>Biking</option>
                <option>Boating</option>
                <option>Brewery</option>
                <option>Clubbing</option>
                <option>Dining</option>
                <option>Golf</option>
                <option>Hiking</option>
                <option>Shopping</option>
                <option>Snow Sports</option>
                <option>Swimming</option>
                <option>Tourism</option>
                <option>Water Sports</option>
                <option>Yoga</option>
              </select>
            </div>
            <h4>Activity 2</h4>
            <div class="styled-select black rounded griditem">
                <select>
                  <option>Biking</option>
                  <option>Boating</option>
                  <option>Brewery</option>
                  <option>Clubbing</option>
                  <option>Dining</option>
                  <option>Golf</option>
                  <option>Hiking</option>
                  <option>Shopping</option>
                  <option>Snow Sports</option>
                  <option>Swimming</option>
                  <option>Tourism</option>
                  <option>Water Sports</option>
                  <option>Yoga</option>
                </select>
            </div>
            <h4>Activity 3</h4>
            <div class="styled-select black rounded griditem">
                <select>
                  <option>Biking</option>
                  <option>Boating</option>
                  <option>Brewery</option>
                  <option>Clubbing</option>
                  <option>Dining</option>
                  <option>Golf</option>
                  <option>Hiking</option>
                  <option>Shopping</option>
                  <option>Snow Sports</option>
                  <option>Swimming</option>
                  <option>Tourism</option>
                  <option>Water Sports</option>
                  <option>Yoga</option>
                </select>
            </div>
          </div>
          <input type="button" value="I've Thought of a Location" class="locationBtn" id="locationBtn1">
          <input type="button" value="Next Step" class="nextBtn">
          </div>
          <div class="toggleTimeFrame">
            <p>Choose a time frame that works best for you.</p>
            Arrival Date: <input type="date" name="arrival">
            Departure Date: <input type="date" name="departure"><br>
            <input type="button" value="I've Thought of a Location" class="locationBtn" id="locationBtn2">
            <input type="button" value="Search for Packages" class="submitBtn">
        </div>
        </form>
  </div>

  <div class="build"></div>
  <script>
    $(document).ready(function(){
      $("#showForm").click(function(){  //when "Help me Choose" is clicked
      $("#showForm").animate({  //hides the "help me choose"
          height: '0',
          opacity: '0'
        });
        $(".togglesearch").animate({  //shows the advanced search
          height: '100%',
          opacity: '1'
        }, "slow");
        $(".search").animate({  //hides the location search
          height: '0',
          opacity: '0'
        });
      });

      $(".nextBtn").click(function(){  //when "Help me Choose" is clicked
        $(".toggleTimeFrame").animate({  //show the time frame part
          height: '100%',
          opacity: '1'
        }, "slow");
        $(".togglesearch").animate({  //hides the activities part
          height: '0',
          opacity: '0'
        });
      });

      $("#locationBtn1").click(function(){  //when "I've thought of a location (1)" is clicked
        $(".search").animate({  //show the search bar
          height: '100%',
          opacity: '1'
        });
        $(".togglesearch").animate({  //hides the advanced search
          height: '0',
          opacity: '0'
        });
        $("#showForm").animate({  //shows the "help me choose"
          height: '100%',
          opacity: '1'
        });
      });

      $("#locationBtn2").click(function(){  //when "I've thought of a location (2)" is clicked
        $(".search").animate({  //show the search bar
          height: '100%',
          opacity: '1'
        });
        $(".toggleTimeFrame").animate({  //hides the advanced search
          height: '0',
          opacity: '0'
        });
        $("#showForm").animate({  //shows the "help me choose"
          height: '100%',
          opacity: '1'
        });
      });

  });

  var asyncRequest; //holds XMLHttpRequest object

  function getLocations( url ) {
    try {
      asyncRequest = new XMLHttpRequest();

      asyncRequest.addEventListener("readystatechange", processResponse, false);
      asyncRequest.open( "GET", url, true );
      asyncRequest.send( null );
    } catch ( exception ) {
      alert( "Request Failed" );
    }
  }  //end function getLocations

  //parse the XML response and check if entered location
  //is available
  function processResponse() {
    if( asyncRequest.readyState == 4 && asyncRequest.status == 200 && 
      asyncRequest.responseXML) {
               
    //get locations from responseXML
    var locations = asyncRequest.responseXML.getElementsByTagName( "location" );

    //get DOM object that holds location input
    var searchLocation = document.getElementsByName( "searchLocation" )[0];

    //go through locations and see if one matches entered location
    for( var i = 0; i < locations.length; ++i ) {
      var location = locations.item(i);
      var locationName = location.getElementsByTagName( "name" ).
        item(0).firstChild.nodeValue;
      if( searchLocation.value.toLowerCase() == locationName ) {
        searchLocation.style.borderColor = "green";
        break;
      } else if (searchLocation.value == "") {
        searchLocation.style.borderColor = "#ccc";
      } else {
        searchLocation.style.borderColor = "red";
      }
    }  //end for loop
    }  //end if statement
  }  //end function processResponse()

  function registerListener() {
    document.getElementsByName( "searchLocation" )[0].addEventListener( 
    "keypress", function() { getLocations( "locations.xml" ); }, false);
  }

  window.addEventListener( "load", registerListener, false );
  </script>

  <script src="checkLogin.js"></script>
  
</body>
</html>