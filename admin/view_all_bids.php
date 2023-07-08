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
FROM users u INNER JOIN bid b ON u.email = b.email INNER JOIN tenders t ON b.tender_id= t.tender_id;";
$result = mysqli_query($db, $query);
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
<?php
include "../footer.php";
?>