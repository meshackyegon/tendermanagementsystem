<?php
include "../header.php";
?>
<style>
    /* Sidebar styles */
    .sidebar {
        width: 200px;
        height: 100vh;
        background-color: #d4d7d9;
        float: left;
    }

    .sidebar a {
        display: block;
        padding: 16px;
        text-decoration: none;
        color: #000;
    }

    .sidebar a:hover {
        background-color: #555;
        color: #fff;
    }

    /* Content area styles */
    .content {
        margin-left: 200px;
        padding: 20px;
    }
</style>
<script>
    // Function to load content into the content area
    function loadContent(page) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("content-area").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", page, true);
        xhttp.send();
    }
</script>
</head>

<body>
    <div class="sidebar">
        <a href="home.php">Dashboard</a>
        <a href="tenders.php">Tenders Available</a>
        <a href="mybids.php">History</a>
        <a href="bid.php">place bid</a>
        <a href="profile.php">Profile</a>
        <a href="change_password.php">Change Password</a>
    </div>
    <div class="content">
        <div id="content-area">

        </div>


    </div>

</body>

</html>