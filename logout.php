<?php
session_start();
unset($_SESSION["email"]);
header("LOCATION: login.php");