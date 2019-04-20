<?php

    setcookie("PackageName", $_POST["PackageName"], time() + 300, "/");
    setcookie("PackageCost", $_POST["cost"], time() + 300, "/");

?>