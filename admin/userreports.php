<?php
include '../function.php';
// require_once "sidebar.php";
include 'sidebar.php';
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}
if (isset($_SESSION['user'])) {
    echo "Welcome " . $_SESSION['user'];
}
// Check if the form is submitted
if (isset($_POST['report'])) {
    // Get the input date and status from the user
    $inputDate = $_POST['start_date'];
    $enddate = $_POST['end_date'];
    $role = $_POST['role'];

    // Prepare the query to filter by input date and status
    $query = "SELECT * FROM users WHERE date_created >= '$inputDate' AND date_created <='$enddate' AND 1=1";

    // Add filter for status if selected
    if ($role !== 'all') {
        $query .= " AND user_type = '$role'";
    }

    // Execute the query
    $result = mysqli_query($db, $query);
}
?>
<link rel="stylesheet" href="../school/style.css">
<form method="POST" action="">
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" id="start_date" required>
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" id="end_date" required>
    <label for="role">Role:</label>
    <select name="role" id="role">
        <option value="all">All</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
        <option value="procument">Procurement</option>
    </select>
    <button type="submit" name="report">Generate Report</button>
</form>

<?php if (isset($result)) { ?>
    <div class="table">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Location</th>
                <th>User Type</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['fullnames']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['user_type']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } ?>

<?php
include "../footer.php";
?>