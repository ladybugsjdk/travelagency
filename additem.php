<?php

    $a = $_POST["PackageName"];
    $b = $_POST["cost"];
    $c = $_POST["count"];
    $d = "PackageName_" . $c;
    $e = "PackageCost_" . $c;
    

    setcookie($d, $a, time() + 300, "/");
    setcookie($e, $b, time() + 300, "/");

?>