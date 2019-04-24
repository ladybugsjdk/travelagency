<?php

    $a = $_POST["PackageName"];
    $b = $_POST["cost"];
    $c = $_POST["count"];
    $d = "PackageName_" . $c;
    $e = "PackageCost_" . $c;
    $f = "PackageID_" . $c;
    

    setcookie($d, $a, time() + 300, "/");
    setcookie($e, $b, time() + 300, "/");
    setcookie($f, $_POST['id'], time() + 300, "/");

?>