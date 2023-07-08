<?php
// session_start();
include "function.php";
include "db.php";
// include "function.php";
// include "function.php";
// include "function.php";
// $logged_in_user = $_SESSION['user'];
?>
<?php
// $sql = "SELECT fullnames, username, email, location, contact FROM users WHERE username = '$logged_in_user'";
// $result = mysqli_query($db, $sql);
$logged_in_user = mysqli_real_escape_string($db, $_SESSION['user']);
// $sql = "SELECT fullnames, username, email, location, contact FROM users WHERE username = '".$logged_in_user."'";
$sql = "SELECT fullnames, email, location, contact FROM users WHERE email = '".$_SESSION['user']."'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $fullname = $row["fullnames"];
        $email = $row["email"];
        $location = $row["location"];
        $contact = $row["contact"];
    }
} else {
    echo "no user found";
}

mysqli_close($db);
?>
<?php

include "header.php";
?>

<div class="container">
        
                <?php
                if(isset($_SESSION['user']))

                {
                    echo "Welcome ".$_SESSION['user']; 
                }
                ?>

               
           
                <form method="post" action="profile.php"> <br>
                <label for="name">Full Name:</label>
                  <input type="text" name="fullname" value="<?php echo $fullname; ?>">
                  <br> <br>
                  <label for="email">Email:</label>
                  <input type="email" name="email" value="<?php echo $email; ?>">
                  <br> <br>
                  <label for="location">Location:</label>
                  <input type="text" name="location" value="<?php echo $location; ?>">
                  <br><br>
                  <label for="contact">Contact:</label>
                  <input type="text" name="contact" value="<?php echo $contact; ?>">
                  <br>
                  <br>
                
                  <button class="button" type="submit" value="Save Changes" name="edit_profile">Save Changes</button>
                </form>
              
      
</div>
<?php
include "footer.php";
?>


<?php
