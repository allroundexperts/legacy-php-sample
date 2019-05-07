<?php
$medicinesForm = '<form action="" method="POST">
  <div class="form-group">
    <label for="name">Name</label>
    <input required type="text" class="form-control" id="name" name="name" placeholder="Enter Medicine Name">
  </div>
  <div class="form-group">
    <label for="mfg_date">Manufacturing Date</label>
    <input required type="text" class="form-control" id="mfg_date" name="mfg_date" placeholder="Manufacturing Date">
  </div>
  <div class="form-group">
  <label for="exp_date">Expiry Date</label>
  <input required type="text" class="form-control" id="exp_date" name="exp_date" placeholder="Expiry Date">
</div>
<div class="form-group">
<label for="price">Price</label>
<input required type="text" class="form-control" id="price" name="price" placeholder="Price">
</div>
<div class="form-group">
<label for="quantity">Quantity</label>
<input required type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
</div>
  <button type="submit" name="submit" class="btn btn-primary">Add</button>
</form>';
