<?php
include "function.php";
?>



<head>
<link rel="stylesheet" type="text/css" href="style1.css"> 
</head>
<main>
<div class="form-group">
<div id="login-content">
    <form method="post" action="function.php">
      <?php echo display_error(); ?>

      <h2 style="color: gray;">Tender Management Syatem</h2><br><br>
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required><br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" required><br>
      <input type="submit" value="Login" name="login">
      <p ><a href="forgot_password.php">Forgot password</a></p>
      <p style="text-align: center">Do not have an account <a href="register.php">Sign Up</a></p>
    </form>
  </div>
</div>
</main>