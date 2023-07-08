<?php
// session_start();
 include "db.php";
 include "function.php";
 include "header.php";


// if (!isset($_SESSION['logged_in_user'])) {
//   header('Location: login.php');
//   exit;
// }

if (isset($_POST['change'] )) {
  $current_password = $_POST['current_password'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];

  // Validate input
  if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
    $error = 'Please fill in all fields.';
  } else if ($new_password !== $confirm_password) {
    $error = 'New password and confirm password do not match.';
  } else {

    // Get the current hashed password from the database
    $query = "SELECT password FROM users WHERE email = '" . $_SESSION['user'] . "'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    // Verify current password
    if (md5($current_password) !== $user['password']) {
      $error = 'Incorrect current password.';
    } else {
      // Update the password in the database
      $query = "UPDATE users SET password = '" . md5($new_password) . "' WHERE email = '" . $_SESSION['user'] . "'";
      mysqli_query($db, $query);

      // Redirect to profile page
      header('Location: profile.php');
      exit;
    }
  }
}
?>


<style>

  .links{
   
    padding: 15px 10px; 
    font-size: 18px; 
    
  }

  #delivery-sidebar{
   
    text-align: left; 
    padding: 10px; 
    padding-left: 12px; 
    
  }


  
</style>
 
<div class="container">
    


        <div class="content">
                    <script type="text/javascript" src="script.js"></script>
                      <button style="
              
                                color:white; 
                                background-color: #4B0082;
                                font-size: 18px; 
                                width: 50%; 
                                height: 45px; 
                                margin-left: 30%; 
                                margin-bottom: 20px;
                                border-radius: 5px;  
                                border: none;"
                      
                      onclick="myFunction()">Change password</button>
      
                      <div style="padding-left: 30px; ">
                      <div id="myDIV">
                        <form action="" method="post" >
                                <label >Current password</label><br>
                                <input  type="text" name="current_password" placeholder="Enter current password" required=""><br> <br>
                                <label>New password</label><br>
                                <input  type="text" name="new_password" placeholder="New Password" required=""><br> <br>
                                <label>Confirm new password</label><br>
                                <input  type="text" name="confirm_password" placeholder=" Confirm New Password" required=""><br> <br><br>
                                <button class="btn btn-default" type="submit" name="change" >Change Password</button>
                        </form>
                      </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>

<script>
    // Check if the URL contains the "register.php" string
    if (window.location.href.indexOf("delivery.php") > -1) {
        // Show the registration sidebar and content
        document.getElementById("delivery-sidebar").style.display = "block";
        document.getElementById("delivery-content").style.display = "block";
    }
</script>

