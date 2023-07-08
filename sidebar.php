<html>

<head>
  <style type="text/css">
    .footer {
      height: 60px;
      background-color: #E6E6FA;
      color: blue;
      margin-bottom: 10px;
    }

    .x {
      display: none;

    }

    .logout :hover:not(.active) {
      background-color: #555;
      color: white;
    }

    .logout {
      float: right;
      width: 30px;
      height: 10px;
      background-color: blue;
      color: white;
      display: block;
      padding: 35px;
      text-decoration: none;




    }

    /*login css*/
    .form2 {
      margin: 50px auto;
      width: 300px;
      padding: 30px 25px;
      background: white;
      float: right;

    }

    .form {
      margin: 50px auto;
      width: 300px;
      padding: 30px 25px;
      background: white;

    }

    .form2 a {

      background-color: #04AA6D;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;

    }

    h1.login-title {
      color: #1b0b52;
      margin: 0px auto 25px;
      font-size: 25px;
      font-weight: 300;
      text-align: center;
    }

    .login-input {
      font-size: 15px;
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 25px;
      height: 25px;
      width: calc(100% - 23px);
    }

    .login-input:focus {
      border-color: #6e8095;
      outline: none;
    }

    .login-button {
      color: #fff;
      background: blue;
      border: 0;
      outline: 0;
      width: 100%;
      height: 50px;
      font-size: 16px;
      text-align: center;
      cursor: pointer;
    }

    .login-button:hover {
      background-color: #c9ffe5;
    }

    .link {
      color: #666;
      font-size: 15px;
      text-align: center;
      margin-bottom: 0px;
    }

    .link a {
      color: #666;
    }

    .mobileIcone {
      display: none;
    }

    .logo {
      color: blue;
      font-size: 25px;
      font-family: verdana;
      text-align: left;
      margin-top: 0px;
      float: left;
      margin: 0px;
      line-height: 50px;
      padding-left: 9px;
    }

    .header {
      width: 100%;
      height: 150px;
      background-color: #E6E6FA;


    }

    body {
      overflow: auto;
      margin: 0;
      font-family: "Lato", sans-serif;
    }

    .sidebar {
      margin-top: 60;
      padding: 0;
      width: 200px;
      background-color: #f1f1f1;
      position: fixed;
      height: 100%;
      overflow: auto;
    }

    .sidebar a {
      display: block;
      color: black;
      padding: 16px;
      text-decoration: none;
    }

    .sidebar a.active {
      background-color: blue;
      color: white;
    }

    .sidebar a:hover:not(.active) {
      background-color: blue;
      color: white;
    }

    div.content {
      margin-left: 200px;
      margin-right: 0px;
      padding: 1px 16px;
      height: fit-content;

    }

    #changepassword {
      opacity: 0.8;
      float: right;
      width: 50%;
      z-index: -1;
      background: blue;
      color: white;
      display: none;
    }

    #hiddenlogout {
      display: none;
      float: right;
    }
  </style>

  <script type="text/javascript" src="validate.js"></script>
  <script type="text/javascript" src="view_jobs.js"></script>
  <link rel="stylesheet" type="text/css" href="jobview.css">
  <script type="text/javascript" src="changepass.js"></script>
  <script type="text/javascript" src="update.js"> </script>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script type="text/javascript" src="script.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles_df.css">
  <link rel="stylesheet" type="text/css" href="styles_cards.css">
  <link rel="stylesheet" href="about us.css">
</head>

<body>
  <div style="position: sticky;top: 0;width: 100%;margin-right: 0; z-index: 1;">
    <div class="header">
      <button style="float:right;"><a class="logout" href="logout.php" onclick="return confirmLogout()">Logout </a></button>
      <button style="float:right;" onclick="changepassword();"><a class="logout">Change Password </a></button><br>

      <center>
        <img src="logo.png" width="10%">
        <h1 class="logo"> CUEA Tender Management Syatem</h1>

    </div>
    <div class="mobileIcone">
      <a href="javascript:void(0);" onclick="myFunction()">
        <i style="font-size: 40px;"> <img src="menu.png"> </i>
      </a>
    </div>
    <div style="opacity: 0.8; float:right;width: 50%;z-index: -1;background: blue;color: white;display: none; " id="changepassword">
      <div style="float:right;clear: both;"><i style="font-size:40px" onclick="closeChangePass();"> <img src="x.png"> </i> </div>
      <center>
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>

        <form action="" method="post">
          <div class="form-group ">
            <label>New Password</label>
            <input style="width:50%;" type="password" name="new_password" class="form-control" required><br><br><br>
            <span class="help-block"></span>
          </div>
          <div class="form-group ">
            <label>Confirm Password</label>
            <input style="width:50%;" type="password" name="confirm_password" class="form-control" required><br><br><br>
            <span class="help-block"></span>
          </div>
          <div class="form-group">

            <p> <input name="changePassword" type="submit" style="width:25%" value="Change">

            </p>
          </div>
        </form>
      </center>
    </div>

  </div>


  <div class="sidebar" id="sidebar">
    <div class="x"><i style="font-size:40px" onclick="myFunction();"> <img src="x.png"> </i> </div>
    <a href="jobseeker_index.php">Venders</a>
    <a href="createtenders.php">Tenders</a>
    <a href="">bids</a>
    <!-- <a href="">CV Templetes</a> -->
    <a href="">Interviews</a>
    <a class="active" href="about_us.php">About</a>
    <a href="contact_us.php">Contact US</a>
  </div>
  <div class="content">


    <div class="about-section">
      <h1>About Us Page</h1>
      <p> Ajira digital is an online jobsearching app
      </p>
      <p>Our mission is to connect job seekers with their dream jobs and to provide employers with the best talent available in the market. We believe that finding the right job or the right employee can change someone's life, and that's why we're dedicated to making the job search process as easy and seamless as possible.

        Our team is composed of experienced professionals who are passionate about creating a platform that benefits both job seekers and employers. We understand the challenges and frustrations that come with finding a job or hiring the right candidate, and we're committed to providing a solution that simplifies the process.
      </p>
      <p>
        Our platform offers a wide range of job opportunities in various industries and locations, and we're constantly updating our database to ensure that our users have access to the latest job openings. We also provide tools and resources to help job seekers improve their skills and increase their chances of landing their dream job.
      </p>
      <p>
        For employers, we offer a range of services that help them find the best talent for their organizations. Our platform provides access to a pool of qualified candidates, and we offer features like resume screening, candidate filtering, and interview scheduling to streamline the hiring process.
      </p>
      <p>
        At our web job portal, we're dedicated to making the job search and hiring process as smooth and efficient as possible. We're committed to helping job seekers and employers achieve their goals, and we're excited to be a part of their journey.</p>
    </div>
    <h2 style="text-align:center">Our Management team</h2>
    <div class="row">
      <div class="column">
        <div class="card">
          <img src="grafffounder.jpg" alt="director" style="width:100%">
          <div class="container">
            <h2>my director</h2>
            <p class="title">CEO & Founder</p>
            <p>quote</p>
            <p>director@gmail.com</p>
            <p><button style="background-color:blue;" class="button">Contact</button></p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img src="mohagraphics.jpg" alt="director" style="width:100%">
          <div class="container">
            <h2>Name</h2>
            <p class="title">Director</p>
            <p>Quote </p>
            <p>director@gmail.com</p>
            <p><button style="background-color:blue;" class="button">Contact</button></p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img src="dsc_0041.jpg" alt="manager" style="width:100%">
          <div class="container">
            <h2>name </h2>
            <p class="title">Manager</p>
            <p>quote</p>
            <p>manager@gmail.com</p>
            <p><button style="background-color:blue;" class="button">Contact</button></p>
          </div>
        </div>
      </div>
    </div>


  </div>
  <div class="footer">
    <h1 class="footer">&copy CUEA Tender Management System 2022</h1>

  </div>
</body>

</html>