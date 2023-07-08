<?php
include "header.php";
include "function.php";

?>
<!-- <script src="script.js"></script> -->
<link rel="stylesheet" href="/school/style.css">

    <div class="main">
        <div class="content">
            <div id="order-content" class="visible">
                <form method="post" action="function.php">
                    <label for="full-name">Full Name*:</label><br><br>
                    <input id="fname" type="text" name="fullnames"><br><br><br>
                    <label for="email">Email*:</label><br>
                    <input  id="email" type="email" name="email"><br><br>
                    <label for="contact">Contact*:</label><br>
                    <input id="contact" type="text" name="contact"><br><br>

                    <label for="contact">Address:</label><br><br>
                    <input id="address" type="text" name="address" ></span><br><br>
                
                    <label for="contact">Location:</label><br> 
                    <input id="location" type="text" name="location"><br><br>
                    <label>Gender*</label><br><br>
                        <select  id="" name="gender">
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select><br>
                   
                    <label for="password">Password*:</label><br><br>
                    <input  id="pwd" type="password" name="password"><br><br>
                   
                    <label for="password">Confirm Password*:</label><br><br>
                    <input id="cpwd" type="password" name="cpassword"><br><br>
                    
                    <!-- <button type="submit" value="Submit" name="Register" onclick="return validateForm()">Register</button> -->
                    <button class="button" type="submit" value="Submit" name="Register">Register</button>

                    <span id="submit-error"></span>
                    <p style="text-align: center">Already have an account <a href="login.php">Login</a></p>
                </form>
                <!-- <script src="script.js"></script> -->
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>

