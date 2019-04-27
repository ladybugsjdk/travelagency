var x = document.cookie;
var ca = x.split("; ");

for(var i = 0; i < ca.length; i++){
    var c = ca[i].split("=");
    if(c[0] == "firstname"){
    document.getElementById("loginLink").innerHTML= '<a href="profile.php" </a> Profile';
    }
}