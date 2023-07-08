<?php
include "../function.php";
include "sidebar.php";
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}
?>
<link rel="stylesheet" href="../school/style.css">
<!-- <div class="nav"> -->

<!-- <div class="container">

    < class="main"> -->
<div class="content">
    <div id="content-area" class="visible">

        <?php
        $sql = "SELECT * FROM tenders WHERE DATEDIFF(end_date, CURDATE()) > 0";
        $result = mysqli_query($db, $sql);
        echo "<table style='width:70%; border: 1px solid black;'>";
        echo "<tr style='border: 1px solid black;'>";
        echo "<th style='border: 1px solid black;'>Section Name</th>";
        echo "<th style='border: 1px solid black;'>Tender ID</th>";
        echo "<th style='border: 1px solid black;'>City</th>";
        echo "<th style='border: 1px solid black;'>Tender Description</th>";
        echo "<th style='border: 1px solid black;'>Tender Image</th>";
        echo "<th style='border: 1px solid black;'>Tender Document</th>";
        echo "<th style='border: 1px solid black;'>Price</th>";
        echo "<th style='border: 1px solid black;'>Status</th>";
        echo "<th style='border: 1px solid black;'>Duration</th>";
        echo "<th style='border: 1px solid black;'>BID</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            $endDate = new DateTime($row['end_date']);
            $currentDate = new DateTime();
            $interval = $currentDate->diff($endDate);
            $daysDifference = $interval->days;
            $status = ($daysDifference > 0) ? 'Open' : 'Closed';
            echo "<tr style='border: 1px solid black;'>";
            echo "<td style='border: 1px solid black;'>" . $row['section_name'] . "</td>";
            echo "<td style='border: 1px solid black;'>" . $row['tender_id'] . "</td>";
            echo "<td style='border: 1px solid black;'>" . $row['city'] . "</td>";
            echo "<td style='border: 1px solid black;'>" . $row['description'] . "</td>";
            echo "<td style='border: 1px solid black;'><img src='../uploads/" . $row['tender_image'] . "' width='100' height='100'></td>";
            echo "<td style='border: 1px solid black;'><button><a href='view_document.php?document=" . $row['tender_document'] . "' target='_blank'>View Document</a></button></td>";
            echo "<td style='border: 1px solid black;'>" . $row['price'] . "</td>";
            echo "<td style='border: 1px solid black;'>" . $status . "</td>";
            echo "<td style='border: 1px solid black;'>" . $row['date_duration'] . "</td>";
            if ($daysDifference > 0) {
                echo "<td style='border: 1px solid black;'> <button><a href='bid.php?tender_id=" . $row['tender_id'] . "'>Place Bid</a></button></td>";
            } else {
                echo "<td style='border: 1px solid black;'>Closed</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($db);
        ?>
    </div>
</div>
<?php //include_once 'footer.php'; 
?>