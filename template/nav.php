<?php
$navOptions = isset($_SESSION["email"]) ? '<a class="p-2 text-dark" href="branches.php">Branches</a>
<a class="p-2 text-dark" href="medicines.php">Medicines</a>
<a class="p-2 text-dark" href="orders.php">Orders</a>
<a class="p-2 text-dark" href="customers.php">Customers</a>': '';

$signin = isset($_SESSION['email']) ? '<a class="btn btn-outline-primary" href="logout.php">Logout</a>': '<a class="btn btn-outline-primary" href="login.php">Sign in</a>';

$nav = '<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
    <nav class="my-2 my-md-0 mr-md-3">'.$navOptions.
    '</nav>'.$signin.'
</div>';