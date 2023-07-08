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
if (isset($_GET['tender_id'])) {
    $tender_id = $_GET['tender_id'];
    $sql = "SELECT u.fullnames, u.email, u.contact
            FROM users u
            INNER JOIN bid b ON u.email = b.email
            WHERE b.tender_id = '$tender_id'";
    $query = mysqli_query($db, $sql);

    if (mysqli_num_rows($query) > 0) {
?>
        <link rel="stylesheet" href="../school/style.css">
        <div class="table">
            <table class="table">
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td><?php echo $row['fullnames']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
<?php
    } else {
        echo "No vendors have applied for this tender.";
    }
}

$sql = "SELECT * FROM tenders";
$query = mysqli_query($db, $sql);
?>
<link rel="stylesheet" href="../school/style.css">
<div class="table">
    <table class="table">
        <tr>
            <th>Tender ID</th>
            <th>Category</th>
            <th>Description</th>
            <th>Price</th>
            <th>Duration Date</th>
            <th>View</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?php echo $row['tender_id']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['date_duration']; ?></td>
                <td>
                    <button><a href="?tender_id=<?php echo $row['tender_id']; ?>">View</a></button>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<?php
include "../footer.php";
?>