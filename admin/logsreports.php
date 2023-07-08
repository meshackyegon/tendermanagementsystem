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
    $log = $_POST['log'];

    // Prepare the query to filter by input date and status
    $query = "SELECT * FROM logs WHERE date_created >= '$inputDate' AND date_created <='$enddate' AND 1=1 LIMIT 15";

    // Add filter for status if selected
    if (
        $log !== 'all'
    ) {
        $query .= " AND action_made = '$log'";
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
    <label for="log">Log type:</label>
    <select name="log" id="log">
        <option value="all">All</option>
        <!-- <option value="approved">Approved</option>
        <option value="rejected">Rejected</option>
        <option value="pending">Pending</option> -->
    </select>
    <button type="submit" name="report">Generate Report</button>
</form>

<?php if (isset($result)) { ?>
    <div class="table">
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Action</th>
                <th>Timestamp</th>
                <!-- <th>Quote</th>
                <th>Explanation</th>
                <th>Status</th> -->
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['action_made']; ?></td>
                    <td><?php echo $row['timestamp']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } ?>

<?php
include "../footer.php";
?>