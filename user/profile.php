<?php

include "../function.php";
// include "db.php";
include 'sidebar.php';

$logged_in_user = mysqli_real_escape_string($db, $_SESSION['user']);

if (isset($_POST['edit_profile'])) {
    // Retrieve the updated details from the form
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $location = mysqli_real_escape_string($db, $_POST['location']);
    $contact = mysqli_real_escape_string($db, $_POST['contact']);

    // Update the user's profile details in the database
    $updateQuery = "UPDATE users SET fullnames = '$fullname', email = '$email', location = '$location', contact = '$contact' WHERE email = '$logged_in_user'";
    $updateResult = mysqli_query($db, $updateQuery);

    if ($updateResult) {
        echo "Profile updated successfully!";
        // Update the session user details
        $_SESSION['user'] = $email;
    } else {
        echo "Error updating profile: " . mysqli_error($db);
    }
}

// Fetch the user's profile details from the database
$sql = "SELECT fullnames, email, location, contact FROM users WHERE email = '$logged_in_user'";
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
    echo "No user found";
}

mysqli_close($db);
?>

<link rel="stylesheet" href="../school/style.css">

<div class="container">
    <?php
    if(isset($_SESSION['user'])) {
        echo "Welcome ".$_SESSION['user']; 
    }
    ?>

    <form method="post" action="profile.php">
        <br>
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
        <br><br>
        <button class="button" type="submit" value="Save Changes" name="edit_profile">Save Changes</button>
    </form>
</div>

