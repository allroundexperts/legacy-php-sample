<?php

$orderForm = '<form action="" method="POST">
  <div class="form-group">
    <label for="customer">Customer</label>
    '.getCustomers($link).'
  </div>
  <div class="form-group">
    <label for="branch_id">Branch ID</label>
    '.getBranches($link).'
  </div>
  <div class="form-group">
  <label for="payment">Payment</label>
  <input required type="text" class="form-control" id="payment" name="payment" placeholder="Amount Paid">
</div>
  <button type="submit" name="submit" class="btn btn-primary">Add</button>
</form>';

function getCustomers($link){
    $select = "<select class='form-control' name='customer_id'>";
    $customers = mysqli_query($link, "SELECT *FROM Customer");
    while($row = mysqli_fetch_assoc($customers)){
        $select .= "<option value='".$row['CustomerID']."'>".$row['Name']."</option>";
    }
    $select .= "</select>";
    return $select;
}

function getBranches($link){
    $select = "<select class='form-control' name='branch_id'>";
    $branches = mysqli_query($link, "SELECT *FROM Branch");
    while($row = mysqli_fetch_assoc($branches)){
        $select .= "<option value='".$row['BranchID']."'>".$row['Location'].", ".$row['City']."</option>";
    }
    $select .= "</select>";
    return $select;
}