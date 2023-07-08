<?php
include "../function.php";
include "sidebar.php";
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}
if (isset($_SESSION['user'])) {
    echo "Welcome " . $_SESSION['user'];
}
?>

<link rel="stylesheet" type="text/css" href="../school/style.css">

<!-- <div class="main">
    <div class="content">
        <div id="order-content" class="visible"> -->
<?php
$sql = "SELECT * FROM tenders";
$result = mysqli_query($db, $sql);
?>
<table style='border: 3px solid black;'>
    <tr>
        <th style='border: 3px solid black;'>Section Name</th>
        <th style='border: 3px solid black;'>Tender ID</th>
        <th style='border: 3px solid black;'>Category</th>
        <th style='border: 3px solid black;'>City</th>
        <th style='border: 3px solid black;'>Tender Description</th>
        <th style='border: 3px solid black;'>Tender Image</th>
        <th style='border: 3px solid black;'>Tender Document</th>
        <th style='border: 3px solid black;'>Price</th>
        <th style='border: 3px solid black;'>Duration</th>
        <th style='border: 3px solid black;'>Action</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td><?php echo $row['section_name']; ?></td>
            <td><?php echo $row['tender_id']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><img src="../uploads/<?php echo $row['tender_image']; ?>" width="80" height="80"></td>
            <td><a href="view_document.php?document=<?php echo $row['tender_document']; ?>" target="_blank">View Document</a></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['date_duration']; ?></td>
            <td>
                <button><a href="?edit=<?php echo $row['tender_id']; ?>">Edit</a></button>
                <button><a href="delete.php?id=<?php echo $row['tender_id']; ?>">Delete</a></button>
            </td>
        </tr>
    <?php } ?>
</table>

<?php
mysqli_close($db); 
?>
</div>
    </div>
</div>
<?php
include "../footer.php";
?>