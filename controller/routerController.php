<?php
/*
Notre router
*/
// s'il existe la variable get section
if (isset($_GET['section'])) {
    switch ($_GET['section']) {
        case "travaux":
            $route = "travaux.html.php";
            break;
        case "contact":
            $route = "contact.html.php";
            break;
        case "livredor":
            require "livredorController.php";
            $route = "livredor.html.php";
            break;
        default:
            $route = "error404.html.php";
    }
} else {
    $route = "homepage.html.php";
}