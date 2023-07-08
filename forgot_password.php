<?php 
require_once "db.php";
include "function.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="function.php" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Continue">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php
//  if(isset($_POST['check-email'])){
//     $email = mysqli_real_escape_string($db, $_POST['email']);
//     $check_email = "SELECT * FROM users WHERE email='$email'";
//     $run_sql = mysqli_query($con, $check_email);
//     if(mysqli_num_rows($run_sql) > 0){
//         $code = rand(999999, 111111);
//         $insert_code = "UPDATE users SET code = $code WHERE email = '$email'";
//         $run_query =  mysqli_query($con, $insert_code);
//         if($run_query){
//             $subject = "Password Reset Code";
//             $message = "Your password reset code is $code";
//             $sender = "From: shahiprem7890@gmail.com";
//             if(mail($email, $subject, $message, $sender)){
//                 $info = "We've sent a passwrod reset otp to your email - $email";
//                 $_SESSION['info'] = $info;
//                 $_SESSION['email'] = $email;
//                 header('location: reset-code.php');
//                 exit();
//             }else{
//                 $errors['otp-error'] = "Failed while sending code!";
//             }
//         }else{
//             $errors['db-error'] = "Something went wrong!";
//         }
//     }else{
//         $errors['email'] = "This email address does not exist!";
//     }
// }
?>