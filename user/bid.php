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
// include "sidebar.php";
$email = $_SESSION['email'];
// $name = $_SESSION['fullnames'];
var_dump($_POST);
if (isset($_POST['bid'])) {
    $tender_id = $_GET['tender_id'];
    $user_id = $_SESSION['id'];
    $email = $_SESSION['email'];
    $quote=$_POST['quote'];
    $description=$_POST['description'];
    var_dump($tender_id);
    $sql = "INSERT INTO bid (tender_id,user_id, email, description, quote) 
    VALUES ('$tender_id', '$user_id', '$email', '$description', '$quote')";
    mysqli_query($db, $sql);

    echo "<script>alert('Bid placed Successfully!');</script>";
    header("refresh:0.7; url=mybids.php");

}
?>


<link rel="stylesheet" href="../school/style.css">

<form method="post" action="">

    <!-- <label for="full-name">Name:</label><br>
    <input id="fname" type="text" name="fullnames" value="<?php //echo $fullnames; ?>"><br> -->

    <label for="email">Email:</label><br>
    <input id="email" type="email" name="email" value="<?php echo $email; ?>"> <br>

    <!-- <label for="contact">Contact:</label><br>
    <input id="contact" type="text" name="contact" value="<?php //echo $contact; ?>"><br> -->

    <label for="price">Price:</label><br><br>
    <input type="number" id="price" name="quote" required><br><br>

    <label for="description">Description:</label><br><br>
    <textarea id="description" name="description" required></textarea><br><br>

    <button class="button" type="submit" name="bid">Bid</button>

    <span id="submit-error"></span>
</form>