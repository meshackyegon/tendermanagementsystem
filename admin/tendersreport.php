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
    $dateduration = $_POST['duration'];
    $category = $_POST['category'];

    // Prepare the query to filter by input date and status
    $query = "SELECT u.fullnames, u.email, u.contact, t.tender_id, b.quote, b.description, t.date_duration, t.category
              FROM users u
              INNER JOIN bid b ON u.email = b.email
              INNER JOIN tenders t ON b.tender_id= t.tender_id
              WHERE t.start_date >= '$inputDate' AND t.start_date<='$enddate'";

    //Add filter for status if selected
    if ($dateduration !== 'all') {
        $query .= " AND t.date_duration = '$dateduration'";
    }
    if ($category !== 'all') {
        $query .= " AND t.category = '$category'";
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
    <label for="duration">Duration:</label>
    <select name="duration" id="duration">
        <option value="all">All</option>
        <option value="3 months">3 months</option>
        <option value="4 months">4 months</option>
        <option value="6 months">6 months</option>
        <option value="9 months">9 months</option>
        <option value="12 months">12 months</option>
    </select>
    <label for="category">Category:</label>
    <select name="category" id="category">
        <option value="all">All</option>
        <?php
        $sql = "select * from tenders group by category";
        $rows = mysqli_query($db, $sql);
        foreach ($rows as $item) {
        ?>
            <option><?= $item['category'] ?></option>
        <?php } ?>
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
                <th>Category</th>
                <th>Duration</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['fullnames']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['tender_id']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['quote']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['date_duration']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } ?>

<?php
include "../footer.php";
?>