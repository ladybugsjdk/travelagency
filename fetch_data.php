<?php
/*************************
 * fetch_data.php collects filtering data from package.php asynchronously
 * and creates a query to query the database based on the filtering selections
 * then sends this information back to the package page so that the updates can be applied
 */

//connection created
$connect = new PDO('mysql:host=rds-mysql-10mintutorial.cj3sjwqrps9d.us-east-1.rds.amazonaws.com;port=3306;dbname=BlackMesaTravel', 'masterUsername', 'blackmesatravel');

//setting base query
if(isset($_POST["action"])) {
    $query = "select i.url, l.locationname, l.country, b.biomename, p.priceperday, DATE_FORMAT(p.startdate, '%M %d, %Y') as startdate, DATE_FORMAT(p.enddate, '%M %d, %Y') as enddate from PREMIER_LOCATIONS l join BIOMES b on l.biomeid = b.biomeid join PACKAGES p on l.locationid = p.locationid join IMAGES i on l.locationid = i.locationid";
}

//if a min price/max price is set, add to the query
if(isset($_POST["minimum_price"], $_POST["maximum_price"]) &&
!empty($_POST["minimum_price"] && !empty($_POST["maximum_price"]))) {
    $query .= " AND p.priceperday BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'";
}

//if arrival date is selected, add to the query
if(isset($_POST["arrival_date"]) && !empty($_POST["arrival_date"])) {
    //$start = date("Y-m-d", strtotime($_POST["arrival_date"]));
    $query .= " AND p.startdate >= '".$_POST["arrival_date"]."'";
}

//if departure date is selected, add to the query
if(isset($_POST["departure_date"]) && !empty($_POST["departure_date"])) {
    //$end = date("Y-m-d", strtotime($_POST["departure_date"]));
    $query .= " AND p.enddate <= '".$_POST["departure_date"]."'";
}

//if biome(s) is/are chosen, add to the query
if(isset($_POST["biome"])) {
    $biome_filter = implode("','", $_POST["biome"]);
    $query .= " AND b.biomename IN ('".$biome_filter."')";
}

//if country(ies) is/are chosen, add to the query
if(isset($_POST["country"])) {
    $country_filter = implode("','", $_POST["country"]);
    $query .= " AND l.country IN ('".$country_filter."')";
}

//add final semicolon to query
$query .= ";";

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
if($total_row > 0) {
    foreach($result as $row) {
        //create and output div for each package
        $output .= '
            <div class="package">
            <div style="border:1px solid #ccc; border-radius:5px;
                padding:16px; margin:auto; margin-bottom:16px; height:400px; width:400px;">
            <img src="'.$row['url'].'">
            <h4 align="center">'. $row['locationname'] .', ' . $row['country'] . '</h4>
            <p>'. $row['biomename'] .'<br/>
            $'. $row['priceperday'] .' per day<br/>
            Start Date: '. $row['startdate'] .'<br/>
            End Date: '. $row['enddate'] .'</p>
            <button type="button">Purchase</button>
            </div>
            </div>
        ';
    }
} else {
    $output = '<h3>No Data Found</h3>';
}
//sending output back to package.php
echo $output;
?>