 <?php
include "db.php";
session_start();

// variable declaration
$email    = "";
$fullnames= "";
$contact="";
$location="";
$password="";
$address="";
$password_1="";
$password_2="";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['Register'])) {
	register();
   
}

// REGISTER USER
function register(){
    // call these variables with the global keyword to make them available in function
    global $db, $errors, $email,$fullnames,$contact, $location ,$password,$address, $gender;

    // receive all input values from the form. Call the e() function
    // defined below to escape form values
   //$username    =  e($_POST['username']);
    $email       =  e($_POST['email']);
    $fullnames = e($_POST['fullnames']);
    $contact = e($_POST['contact']);
    $location = e($_POST['location']);
    $gender = e($_POST['gender']);
    $address = e($_POST['address']);
    $password_1  =  e($_POST['password']);
    $password_2  =  e($_POST['cpassword']);

    // form validation: ensure that the form is correctly filled
    // if (empty($username)) { 
    //     array_push($errors, "Username is required"); 
    // }
    if (empty($fullnames)) { 
        array_push($errors, "Full names  is required"); 
    }
    if (empty($contact)) { 
        array_push($errors, "Contact is required"); 
    }
    if (empty($location)) { 
        array_push($errors, "Location is required"); 
    }
    if (empty($gender)) { 
        array_push($errors, "Gender is required"); 
    }
    if (empty($address)) { 
        array_push($errors, "address is required"); 
    }
    if (empty($email)) { 
        array_push($errors, "Email is required"); 
    }
    if (empty($location)) { 
        array_push($errors, "Location is required"); 
    }
    if (empty($password_1)) { 
        array_push($errors, "Password is required"); 
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // check if the username or email already exists in the database
    // $user_check_query = "SELECT * FROM users WHERE  email='$email' LIMIT 1";
    // $result = mysqli_query($db, $user_check_query);
    // $user = mysqli_fetch_assoc($result);

    $email_check = "SELECT * FROM users WHERE email = '$email'";
    $user = mysqli_query($db, $email_check);
    $user = mysqli_fetch_assoc($user);
    // if(mysqli_num_rows($user) > 0){
    //     $errors['email'] = "Email that you have entered is already exist!";
    // }

    if ($user) { // if user exists
        // if ($user['username'] === $username) {
        //     array_push($errors, "Username already exists");
		// 	header('location: register.php');
        // }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
			header('location: register.php');
        }
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
		$code = rand(999999, 111111);
        $status = "notverified";

        if (isset($_POST['user_type'])) {
            // //insert query goes here
            $user_type = e($_POST['user_type']);
            $query = "INSERT INTO users (fullnames, email, contact, address ,location, user_type, password, code, status) 
                      VALUES('$fullnames', '$email', '$contact','$address','$location','$user_type', '$password', '$code','$status')";
            $data_check=mysqli_query($db, $query);
			if($data_check){
				$subject = "Email Verification Code";
				$message = "Your verification code is $code";
				$sender = "From: meshackyegon10@gmail.com";
				if(mail($email, $subject, $message, $sender)){
					$info = "We've sent a verification code to your email - $email";
					$_SESSION['info'] = $info;
					$_SESSION['email'] = $email;
					$_SESSION['password'] = $password;
					header('location: user-otp.php');
					exit();
				}else{
					$errors['otp-error'] = "Failed while sending code!";
				}
			}else{
				$errors['db-error'] = "Failed while inserting data into database!";
			}
          
        }
        else{
			$query = "INSERT INTO users (fullnames, email, contact, address,location,user_type, password, code, status) 
					  VALUES('$fullnames', '$email','$contact','$address','$location' ,'user', '$password', '$code','$status')";
			$data_check=mysqli_query($db, $query);
			if($data_check){
				$subject = "Email Verification Code";
				$message = "Your verification code is $code";
				$sender = "From: meshackyegon10@gmail.com";
				if(mail($email, $subject, $message, $sender)){
					$info = "We've sent a verification code to your email - $email";
					$_SESSION['info'] = $info;
					$_SESSION['email'] = $email;
					$_SESSION['password'] = $password;
					header('location: user-otp.php');
					exit();
				}else{
					$errors['otp-error'] = "Failed while sending code!";
				}
			}else{
				$errors['db-error'] = "Failed while inserting data into database!";
			}

			// // get id of the created user
			// $logged_in_user_id = mysqli_insert_id($db);

			// $_SESSION['logged_in_user'] = getUserById($logged_in_user_id); // put logged in user in session
			// $_SESSION['success']  = "You are now logged in";
			// header('location: home.html');				
		}
	}
	}
// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string


function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
// if (isset($_GET['logout'])) {
// 	session_destroy();
// 	unset($_SESSION['user']);
// 	header("location: login.php");
// }
// call the login() function if register_btn is clicked
if (isset($_POST['login'])) {
	login();
}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($db, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = mysqli_query($db, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE users SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($db, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

// LOGIN USER
function login(){
    global $db, $email, $errors;

    // grab form values
    $email = e($_POST['email']);
    $password = e($_POST['password']);

    // make sure form is filled properly
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // attempt login if no errors on form
    if (count($errors) == 0) {
        $password = md5($password);
       
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
        $results = mysqli_query($db, $query);
        // var_dump($results);

        if (mysqli_num_rows($results) == 1) { // user found
            // check if user's status is verified
            $logged_in_user = mysqli_fetch_assoc($results);
            $status = $logged_in_user['status'];

            if ($status == 'verified') { // proceed with login if user is verified
                $_SESSION['email'] = $email;

                if ($logged_in_user['user_type'] == 'admin') {

                    $_SESSION['user'] = $logged_in_user;
                    $_SESSION['name']= $_POST['fullnames'];
                    $_SESSION['success']  = "You are now logged in";
                    $log['user_id'] = $_SESSION['id'];
                    $log['email']=$_SESSION['email'];
                    $log['action_made'] = "Logged in the system '$_SESSION[email]'.";
                    save_log($log);
                    header('location: admin/view_tenders.php');	
                }
                    if ($logged_in_user['user_type'] == 'procurement') {

                        $_SESSION['user'] = $logged_in_user;
                        $_SESSION['name'] = $_POST['fullnames'];
                        $_SESSION['success']  = "You are now logged in";
                        $log['user_id'] = $_SESSION['id'];
                        $log['email'] = $_SESSION['email'];
                        $log['action_made'] = "Logged in the system '$_SESSION[email]'.";
                        save_log($log);
                        header('location: school/view_tenders.php');
                    }
                // if ($_SESSION['user_type'] == 'admin') {
                //     $_SESSION['user'] = $_POST['email'];
                //     $_SESSION['success']  = "You are now logged in";
                //     header('location: admin/view_tenders.php');
                // } 
                // else if ($logged_in_user['user_type'] == 'baker') {
                //     $_SESSION['user'] = $_POST['email'];
                //     $_SESSION['success']  = "You are now logged in";
                //     header('location: baker/baker_page.php');
                // } else if ($logged_in_user['user_type'] == 'deliver') {
                //     $_SESSION['user'] = $_POST['email'];
                //     $_SESSION['success']  = "You are now logged in";
                //     header('location: delivery/deliver_page.php');
                // } 
                else {
                    $_SESSION['user'] = $_POST['email'];
                    $_SESSION['name']= $_POST['fullnames'];
                    $_SESSION['success']  = "You are now logged in";
                    // header('location: user/tenders.php');
                    $log['user_id'] = $_SESSION['id'];
                    $log['email']=$_SESSION['email'];
                    $log['action_made'] = "Logged in the system '$_SESSION[email]'.";
                    save_log($log);
                    header("location: user/tenders.php");
                    exit();
                }
            } else if ($status == 'notverified') {
                // redirect to reset-code.php if user's status is not verified
                header('location: reset-code.php');
            } else {
                array_push($errors, "Your account has not been verified yet");
                header('Location: login.php');
            }
        } else {
            array_push($errors, "Wrong username/password combination");
            header('Location: login.php');
        }
    }
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
if(isset($_POST['check-email'])){
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$check_email = "SELECT * FROM users WHERE email='$email'";
	$run_sql = mysqli_query($db, $check_email);
	if(mysqli_num_rows($run_sql) > 0){
		$code = rand(999999, 111111);
		$insert_code = "UPDATE users SET code = $code WHERE email = '$email'";
		$run_query =  mysqli_query($db, $insert_code);
		if($run_query){
			$subject = "Password Reset Code";
			$message = "Your password reset code is $code";
			$sender = "From: meshackyegon10@gmail.com";
			if(mail($email, $subject, $message, $sender)){
				$info = "We've sent a passwrod reset otp to your email - $email";
				$_SESSION['info'] = $info;
				$_SESSION['email'] = $email;
				header('location: reset-code.php');
				exit();
			}else{
				$errors['otp-error'] = "Failed while sending code!";
			}
		}else{
			$errors['db-error'] = "Something went wrong!";
		}
	}else{
		$errors['email'] = "This email address does not exist!";
	}
}
if(isset($_POST['check-reset-otp'])){
	$_SESSION['info'] = "";
	$otp_code = mysqli_real_escape_string($db, $_POST['otp']);
	$check_code = "SELECT * FROM users WHERE code = $otp_code";
	$code_res = mysqli_query($db, $check_code);
	if(mysqli_num_rows($code_res) > 0){
		$fetch_data = mysqli_fetch_assoc($code_res);
		$email = $fetch_data['email'];
		$_SESSION['email'] = $email;
		$info = "Please create a new password that you don't use on any other site.";
		$_SESSION['info'] = $info;
		header('location: new-password.php');
		exit();
	}else{
		$errors['otp-error'] = "You've entered incorrect code!";
	}
}
if(isset($_POST['tenders'])){
    tenders();
}
function tenders(){
    global $db, $sectionName, $tenderID, $city, $description, $price, $dateDuration, $tenderImage, $tenderDocument, $start_date, $end_date, $category;
    
    // Retrieve form data
    $sectionName = $_POST["section_name"];
    $tenderID = $_POST["tender_id"];
    $category = $_POST['category'];
    $city = $_POST["city"];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $dateDuration = $_POST["date_duration"];

    $tenderDocument = $_FILES["document_upload"]["name"];
    $tenderImage = $_FILES["desc_upload"]["name"];
    $target = "uploads/" . basename($tenderImage, $tenderDocument);

    $sql = "INSERT INTO tenders (section_name, tender_id, category, city, description, tender_image, tender_document, price, start_date, end_date, date_duration)
            VALUES ('$sectionName', '$tenderID', '$category', '$city', '$description', '$tenderImage', '$tenderDocument', '$price', '$start_date', '$end_date', '$dateDuration')";
    $query = mysqli_query($db, $sql);
    
    if (move_uploaded_file($_FILES['desc_upload']['tmp_name'], $target) && move_uploaded_file($_FILES['document_upload']['tmp_name'], $target)) {
        echo "<h2>Image uploaded successfully!</h2>";
        ?>
        <script>
            alert("Upload was successful");
        </script>
        <?php
        header('location: admin/view_tenders.php');
    } else {
        echo "<h2>Failed to upload image!</h2>";
        header('location: tender.php');
    }

    if ($query) {
        echo "Records inserted successfully.";
        header('Location: admin/view_tenders.php');
    } else {
        echo "Error inserting records: ";
    }
}
if(isset($_POST['change-password'])){
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }else{
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = md5($password);
        $update_pass = "UPDATE users SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($db, $update_pass);
        if($run_query){
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: login.php');
        }else{
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}
function save_log($data = [])
{
    global $db;
    // Data array parameters
    // user_id = user unique id
    // action_made = action made by the user

    if (count($data) > 0) {
        extract($data);
        // Prepare the log entry for insertion
        $email= $db->real_escape_string($email);
        $user_id = $db->real_escape_string($user_id);
        $action_made = $db->real_escape_string($action_made);
        $timestamp = date("Y-m-d H:i:s");

        // Insert the log entry into the database
        $sql = "INSERT INTO logs (user_id, email, action_made, timestamp) VALUES ('$user_id', '$email','$action_made', '$timestamp')";
        if ($db->query($sql) === true) {
            // Log entry successfully saved
            // echo "Log entry saved successfully.";
        } else {
            // Error occurred while saving the log entry
            echo "Error: " . $sql . "<br>" . $db->error;
        }

        // Close the database connection
        $db->close();
    }

    return true;
}
