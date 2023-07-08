<?php
require_once '../function.php';
include 'sidebar.php';
//Checking if user is logged in
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

$email = $_SESSION['email'];
$query = "SELECT u.fullnames, u.email, u.contact, t.tender_id, b.quote, b.description, b.status 
FROM users u INNER JOIN bid b ON u.email = b.email INNER JOIN tenders t ON b.tender_id= t.tender_id 
WHERE u.email='" . $_SESSION['email'] . "'";


$result = mysqli_query($db, $query);

?>


<link rel="stylesheet" href="../school/style.css">

<div class="content">
    <?php
    if (isset($_SESSION['user'])) {
        echo "Welcome " . $_SESSION['user'];
    }

    ?>

    <div class="table">
        <table id="bids" class="table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Tender Id</th>
                <th>Quote</th>
                <th>Description</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['fullnames']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['tender_id']; ?></td>
                    <td><?php echo $row['quote']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <!-- <br> -->
</div>
<?php
include '../footer.php';
?>