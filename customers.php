<?php
session_start();
require("./db.php");
require("./template/page.php");
require("./template/list.php");
require("./template/forms/customers.php");

if(!isset($_SESSION['email'])){
    header("LOCATION: login.php");
}
$error = "";

if(isset($_GET["add"])){
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $prescription_id = $_POST['prescription_id'];
        if(mysqli_query($link, "INSERT INTO customer (`Name`, `PrescriptionID`) VALUES ('$name', '$prescription_id')")){
            header("LOCATION: customers.php");
        }else{ 
            $error = '<div class="alert alert-danger">Oh Snap! Some error occured.</div>';
        }
    }

    $content = '<div class="row"><div class="col-md-4 offset-md-4">'.$error.$customersForm.'</div></div>';
    echo $getPage($content);
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = mysqli_query($link, "DELETE FROM customer WHERE CustomerID='$id'");
    if($query){
        header("LOCATION: customers.php");
    }else{
        echo '<div class="alert alert-danger">Oh Snap! Some error occured.</div>';
    }
}

if(count($_GET) === 0){
    $customers = [];
    $query = mysqli_query($link, "SELECT *FROM customer");
    while($row = mysqli_fetch_assoc($query)){
        $customers[] = $row;
    }
    echo $getPage('<div class="row"><div class="col-md-6 offset-md-3"><a class="btn btn-success" href="?add" role="button">Add</a><br/><br/>'.listData($customers,["Customer ID", "Name", "Prescription ID", "Delete"]).'</div></div>');
}