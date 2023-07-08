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
    $inputDate = $_POST['input_date'];
    $enddate = $_POST['end_date'];
    $status = $_POST['status'];

    // Prepare the query to filter by input date and status
    $query = "SELECT u.fullnames, u.email, u.contact, t.tender_id, b.quote, b.description, b.status 
              FROM users u
              INNER JOIN bid b ON u.email = b.email
              INNER JOIN tenders t ON b.tender_id= t.tender_id
              WHERE t.start_date >= '$inputDate' AND t.start_date<='$enddate'";

    // Add filter for status if selected
    if ($status !== 'all') {
        $query .= " AND b.status = '$status'";
    }

    // Execute the query
    $result = mysqli_query($db, $query);
}
?>
<link rel="stylesheet" href="../school/style.css">
<form method="POST" action="">
    <label for="input_date">Start Date:</label>
    <input type="date" name="input_date" id="input_date" required>
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" id="end_date" required>
    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value="all">All</option>
        <option value="approved">Approved</option>
        <option value="rejected">Rejected</option>
        <option value="pending">Pending</option>
    </select>
    <button type="submit" name="report">Generate Report</button>
</form>

<?php if (isset($result)) { ?>
    <div class="table">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Tender ID</th>
                <th>Contact</th>
                <th>Quote</th>
                <th>Explanation</th>
                <th>Status</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['fullnames']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['tender_id']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['quote']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } ?>

<?php
include "../footer.php";
?>