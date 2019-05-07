<?php
$loginForm = '<form action="" method="POST">
  <div class="form-group">
    <label for="email">Email address</label>
    <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We\'ll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input required type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Login</button>
</form>';
