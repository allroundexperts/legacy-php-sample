<?php
session_start();
require("./template/page.php");

if(!isset($_SESSION['email'])){
    header("LOCATION: login.php");
}

echo $getPage("<p>Welcome,  ".$_SESSION["email"]."!</p>");