<?php
session_start();
require("./db.php");
require("./template/page.php");
require("./template/list.php");
require("./template/forms/orders.php");

if(!isset($_SESSION['email'])){
    header("LOCATION: login.php");
}
$error = "";

if(isset($_GET["add"])){
    if(isset($_POST['submit'])){
        $customer = $_POST['customer_id'];
        $branch = $_POST['branch_id'];
        $payment = $_POST['payment'];
        $date = date("d/m/Y");
        if(mysqli_query($link, "INSERT INTO Orders (`CustomerID`, `BranchID`, `Payment`, `Date`) VALUES ('$customer', '$branch', '$payment', '$date')")){
            header("LOCATION: orders.php");
        }else{ 
            $error = '<div class="alert alert-danger">Oh Snap! Some error occured.</div>';
        }
    }

    $content = '<div class="row"><div class="col-md-4 offset-md-4">'.$error.$orderForm.'</div></div>';
    echo $getPage($content);
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = mysqli_query($link, "DELETE FROM Orders WHERE OrderID='$id'");
    if($query){
        header("LOCATION: orders.php");
    }else{
        echo '<div class="alert alert-danger">Oh Snap! Some error occured.</div>';
    }
}

if(count($_GET) === 0){
    $orders = [];
    $query = mysqli_query($link, "SELECT *FROM Orders");
    while($row = mysqli_fetch_assoc($query)){
        $orders[] = $row;
    }
    echo $getPage('<div class="row"><div class="col-md-6 offset-md-3"><a class="btn btn-success" href="?add" role="button">Add</a><br/><br/>'.listData($orders,["Order ID", "Customer ID", "Branch ID", "Amound Paid", "Date", "Delete"]).'</div></div>');
}