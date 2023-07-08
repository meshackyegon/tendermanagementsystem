<?php
include "../function.php";
include 'sidebar.php';
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}
if (isset($_SESSION['user'])) {
    echo "Welcome " . $_SESSION['user'];
}

$query = "SELECT * FROM users";
$result = mysqli_query($db, $query);
?>
<link rel="stylesheet" href="../school/style.css">

<table>
    <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Location</th>
        <th>User Type</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['fullnames']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['contact']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td><?php echo $row['user_type']; ?></td>
            <td>
                <button><a href="?edit=<?php echo $row['id']; ?>">Edit</a></button>
                <button><a href="delete_profile.php?id=<?php echo $row['id']; ?>">Delete</a></button>
            </td>
        </tr>
        <?php if (isset($_GET['edit']) && $_GET['edit'] == $row['id']) { ?>
            <tr>
                <td colspan="7">
                    <form method="POST" action="">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <label for="fullname">Full Name:</label>
                        <input type="text" name="fullname" value="<?php echo $row['fullnames']; ?>">
                        <br>
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="<?php echo $row['email']; ?>">
                        <br>
                        <label for="contact">Contact:</label>
                        <input type="text" name="contact" value="<?php echo $row['contact']; ?>">
                        <br>
                        <label for="address">Address:</label>
                        <input type="text" name="address" value="<?php echo $row['address']; ?>">
                        <br>
                        <label for="location">Location:</label>
                        <input type="text" name="location" value="<?php echo $row['location']; ?>">
                        <br>
                        <label for="user_type">User Type:</label>
                        <input type="text" name="user_type" value="<?php echo $row['user_type']; ?>">
                        <br>
                        <button type="submit" name="update_profile">Update</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    <?php } ?>
</table>

<?php
if (isset($_POST['update_profile'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $contact = mysqli_real_escape_string($db, $_POST['contact']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $location = mysqli_real_escape_string($db, $_POST['location']);
    $user_type = mysqli_real_escape_string($db, $_POST['user_type']);

    $updateQuery = "UPDATE users SET fullnames='$fullname', email='$email', contact='$contact', address='$address', location='$location', user_type='$user_type' WHERE id='$id'";
    $updateResult = mysqli_query($db, $updateQuery);

    if ($updateResult) {
        echo "Profile updated successfully!";
        header("Location: view_users.php"); // Redirect to the same page to display the updated profile
        exit();
    } else {
        echo "Error updating profile: " . mysqli_error($db);
    }
}
?>

<?php
include "../footer.php";
?>