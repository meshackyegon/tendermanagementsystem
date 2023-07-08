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
?>
<link rel="stylesheet" href="../school/style.css">

<body>

    <h1>Tender Form</h1>
    <form method="POST" action="../function.php" enctype="multipart/form-data">
        <label for="section_name">Section Name:</label><br><br>
        <input type="text" id="section_name" name="section_name" required><br><br>

        <label for="tender_id">Tender ID:</label><br><br>
        <input type="text" id="tender_id" name="tender_id" required><br><br>

        <select class="select" name="category">
            <option>food</option>
            <option>Construction</option>
            <option>Library</option>
            <option>Electronics</option>
        </select><br><br>
        <label for="city">City:</label><br><br>
        <input type="text" id="city" name="city" required><br><br>

        <label for="description">Description:</label><br><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="Image_Upload">Tender image:</label><br><br>
        <input type="file" id="desc_upload" name="desc_upload" accept=".png" required><br><br>

        <label for="Document_Upload">Tender document:</label><br><br>
        <input type="file" id="document_upload" name="document_upload" accept=".pdf" required><br><br>

        <label for="price">Price:</label><br><br>
        <input type="number" id="price" name="price" required><br><br>

        <label for="startdate">Start Date:</label><br><br>
        <input type="date" id="date" name="start_date" required><br><br>

        <label for="enddate">End Date:</label><br><br>
        <input type="date" id="date" name="end_date" required><br><br>

        <label for="date_duration">Date Duration:</label><br><br>
        <input type="text" id="date_duration" name="date_duration" required><br><br>

        <button type="submit" name="tenders">Submit</button>
    </form>





</body>
<?php
include "../footer.php";
?>