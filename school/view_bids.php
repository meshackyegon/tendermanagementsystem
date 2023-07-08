<?php
include '../function.php';
include 'sidebar.php';
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}
if (isset($_SESSION['user'])) {
    echo "Welcome " . $_SESSION['user'];
}
// require_once "sidebar.php";
$query = "SELECT u.fullnames, u.email, u.contact, t.tender_id, b.quote, b.description, b.status 
FROM users u INNER JOIN bid b ON u.email = b.email INNER JOIN tenders t ON b.tender_id= t.tender_id 
WHERE b.status = 'pending';";
$result = mysqli_query($db, $query);
if (isset($_POST['update'])) {
    $tender_id = $_POST['tender_id'];
    $status = $_POST['status'];

    // Retrieve the email address from the query result
    $email = $_POST['email'];

    $update_query = "UPDATE bid SET status='$status' WHERE tender_id='$tender_id'";
    $update_result = mysqli_query($db, $update_query);
    if ($update_result) {
        $subject = "Tender bid status has been updated. Please check.";
        $message = "Your bid status is $status";
        $sender = "From: meshackyegon10@gmail.com";
        if (mail($email, $subject, $message, $sender)) {
            $info = "We've sent a bid staus email - $email";
            $_SESSION['info'] = $info;
            // header('location: user-otp.php');
            exit();
        } else {
            $errors['status-error'] = "Failed while sending the status!";
        }
    } else {
        echo "<script>alert('Failed to update bid status.')</script>";
        $errors['db-error'] = "Failed while inserting status data into the database!";
    }
    mysqli_close($db);
}
?>
<div class="table">
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Tender ID</th>
            <th>Contact</th>
            <th>Quote</th>
            <th>Explanation</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['fullnames']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['tender_id']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td><?php echo $row['quote']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                    <form method="POST" id="bid-status-form">
                        <input type="hidden" name="tender_id" value="<?php echo $row['tender_id']; ?>">
                        <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                        <label for="status">Change bid status:</label>
                        <select name="status" id="status">
                            <option value="approved" <?php if ($row['status'] === 'approved') {
                                                            echo 'selected';
                                                        } ?>>Approved</option>
                            <option value="rejected" <?php if ($row['status'] === 'rejected') {
                                                            echo 'selected';
                                                        } ?>>Rejected</option>
                        </select>
                        <button type="submit" name="update" onclick="return confirm('Are you sure you want to update the bid status?')">Submit</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<?php
include "../footer.php";
?>