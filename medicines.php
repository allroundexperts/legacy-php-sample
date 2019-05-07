<?php
session_start();
require("./db.php");
require("./template/page.php");
require("./template/list.php");
require("./template/forms/medicines.php");

if(!isset($_SESSION['email'])){
    header("LOCATION: login.php");
}
$error = "";

if(isset($_GET["add"])){
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $mfg_date = $_POST['mfg_date'];
        $exp_date = $_POST['exp_date'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        if(mysqli_query($link, "INSERT INTO medicines (`Name`, `MfgDate`, `ExpDate`, `Price`, `Quantity`) VALUES ('$name', '$mfg_date', '$exp_date', '$price', '$quantity')")){
            header("LOCATION: medicines.php");
        }else{ 
            $error = '<div class="alert alert-danger">Oh Snap! Some error occured.</div>';
        }
    }

    $content = '<div class="row"><div class="col-md-4 offset-md-4">'.$error.$medicinesForm.'</div></div>';
    echo $getPage($content);
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = mysqli_query($link, "DELETE FROM medicines WHERE MedNo='$id'");
    if($query){
        header("LOCATION: medicines.php");
    }else{
        echo '<div class="alert alert-danger">Oh Snap! Some error occured.</div>';
    }
}

if(count($_GET) === 0){
    $medicines = [];
    $query = mysqli_query($link, "SELECT *FROM medicines");
    while($row = mysqli_fetch_assoc($query)){
        $medicines[] = $row;
    }
    echo $getPage('<div class="row"><div class="col-md-6 offset-md-3"><a class="btn btn-success" href="?add" role="button">Add</a><br/><br/>'.listData($medicines,["Medicine ID", "Name", "Manufacturing Date", "Expiry Date", "Price", "Quantity", "Delete"]).'</div></div>');
}