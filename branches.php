<?php
session_start();
require("./db.php");
require("./template/page.php");
require("./template/list.php");
require("./template/forms/branches.php");

if(!isset($_SESSION['email'])){
    header("LOCATION: login.php");
}
$error = "";

if(isset($_GET["add"])){
    if(isset($_POST['submit'])){
        $location = $_POST['location'];
        $city = $_POST['city'];
        if(mysqli_query($link, "INSERT INTO branch (`Location`, `City`) VALUES ('$location', '$city')")){
            header("LOCATION: branches.php");
        }else{ 
            $error = '<div class="alert alert-danger">Oh Snap! Some error occured.</div>';
        }
    }

    $content = '<div class="row"><div class="col-md-4 offset-md-4">'.$error.$branchesForm.'</div></div>';
    echo $getPage($content);
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = mysqli_query($link, "DELETE FROM branch WHERE BranchID='$id'");
    if($query){
        header("LOCATION: branches.php");
    }else{
        echo '<div class="alert alert-danger">Oh Snap! Some error occured.</div>';
    }
}

if(count($_GET) === 0){
    $branches = [];
    $query = mysqli_query($link, "SELECT *FROM branch");
    while($row = mysqli_fetch_assoc($query)){
        $branches[] = $row;
    }
    echo $getPage('<div class="row"><div class="col-md-6 offset-md-3"><a class="btn btn-success" href="?add" role="button">Add</a><br/><br/>'.listData($branches,["Branch ID", "Location", "City", "Delete"]).'</div></div>');
}