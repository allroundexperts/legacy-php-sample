<?php
session_start();
require("./db.php");
require("./template/forms/login.php");
require("./template/page.php");
$error = "";
if(isset($_SESSION['email'])){
    header("LOCATION: dashboard.php");
}
if(isset($_POST["submit"])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($link, "SELECT *FROM employee WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($query) === 1){
        $_SESSION['email'] = $email;
        header("LOCATION: dashboard.php");
    }else{
        $error = '<div class="alert alert-danger">Invalid username/password.</div>';
    }
}
$content = '<div class="row"><div class="col-md-4 offset-md-4">'.$error.$loginForm.'</div></div>';
echo $getPage($content);
?>