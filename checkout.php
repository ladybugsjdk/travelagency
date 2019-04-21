<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<h2>Black Mesa Checkout</h2>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/purchase_complete.php">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
                <div class="col-50">
                  <label for="arrival">Arrival Date</label>
                  <input type="date" name="arrival" id="arrival" class="date_selector">
                </div>
                <div class="col-50">
                  <label for="departure">Departure Date</label>
                  <input type="date" name="departure" id="departure" class="date_selector">
                </div>
              
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Checkout" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b id="cartqty">1</b></span></h4>
      
      <!-- Placeholder items in cart -->
      <!--<p><a href="#">Product 1</a> <span class="price">$15</span></p>
      <p><a href="#">Product 2</a> <span class="price">$5</span></p>
      <p><a href="#">Product 3</a> <span class="price">$8</span></p>
      <p><a href="#">Product 4</a> <span class="price">$2</span></p> 
      -->
      <ul id = "cartitems">
      </ul>

      
      <hr>
      <p id="Total">Total <span class="price" style="color:black"><b>Please enter arrival and departure times</b></span></p>
    </div>
  </div>
</div>

</body>

<script>

  window.onLoad = loadItems();
  var arr = [];

  //gets items the user added and displays them on the cart section on the right
  function loadItems(){
    let count = 0;
    var x = document.cookie;
    var ca = x.split("; ");
    var i = 0;
    while(i < ca.length){
      var c = ca[i].split("=");
      if(c[0].includes("PackageName") && i+1 < ca.length){
        var d = ca[i+1].split("=");

        var destination = String(c[1]);
        destination = destination.split("%2C").join(",");
        destination = destination.split("+").join(" ");
        var price = String(d[1]);
        price = price.split("%24").join("$");
        price = price.split("+").join(" ");
        document.getElementById("cartitems").innerHTML += '<li>' + destination + '<span class="price">' + price + '</span></li>';
        i+=2;
        count++;
      }else{
        i++;
      }
    }
    document.getElementById("cartqty").innerHTML = count;
  }

  //if user is signed in, this autofills the full name and email sections
  var x = document.cookie;
  var ca = x.split("; ");
  for(var i = 0; i < ca.length; i++){
    var c = ca[i].split("=");
    if(c[0] == "firstname"){
      var f = String(c[1]) + " ";
    }else if(c[0] == "lastname"){
      document.getElementById("fname").value = f + '' + String(c[1]);
    }else if(c[0] == "email"){
      var e = String(c[1]);
      var res = e.replace("%40", "@");
      document.getElementById("email").value = res;
    }
  }


  //every time the dates change, calculate the new total cost
  document.getElementById("departure").addEventListener("change", function(){
      var startTime = document.getElementById("arrival").value;
      var endTime = this.value;

      var startDate = new Date(startTime);
      var endDate = new Date(endTime);
      var millisecondsPerDay = 24 * 60 * 60 * 1000;
      
      var days = (treatAsUTC(endDate) - treatAsUTC(startDate)) / millisecondsPerDay;

      window.alert("Difference in days: " + days);
  });

  function treatAsUTC(date){
    date.setMinutes(date.getMinutes() - date.getTimezoneOffset());
    return date;
  }

</script>
</html>
