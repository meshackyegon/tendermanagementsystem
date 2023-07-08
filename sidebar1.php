<!DOCTYPE html>
<html>
<head>
  <title>Dynamic Content Change</title>
  <style>
    /* CSS for sidebar */
    .sidebar {
      width: 200px;
      float: left;
    }
    
    /* CSS for main content */
    .content {
      margin-left: 220px;
    }
    
    /* CSS for active sidebar link */
    .active {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <!-- Sidebar Links -->
    <ul>
      <li><a href="#" onclick="changeContent('home')">Home</a></li>
      <li><a href="#" onclick="changeContent('about')">About</a></li>
      <li><a href="#" onclick="changeContent('contact')">Contact</a></li>
    </ul>
  </div>
  
  <div class="content">
    <!-- Content Area -->
    <div id="home" style="display: block;">
      <h1>Welcome to the Home Page!</h1>
      <p>This is the content for the home page.</p>
    </div>
  
    <div id="about" style="display: none;">
      <h1>About Us</h1>
      <p>This is the content for the about page.</p>
    </div>
  
    <div id="contact" style="display: none;">
      <h1>Contact Us</h1>
      <p>This is the content for the contact page.</p>
    </div>
  </div>
  
  <script>
    function changeContent(pageId) {
      // Hide all content divs
      var contentDivs = document.getElementsByClassName("content")[0].children;
      for (var i = 0; i < contentDivs.length; i++) {
        contentDivs[i].style.display = "none";
      }
      
      // Show the selected content div
      var selectedDiv = document.getElementById(pageId);
      selectedDiv.style.display = "block";
      
      // Set active class to the clicked sidebar link
      var sidebarLinks = document.getElementsByClassName("sidebar")[0].getElementsByTagName("a");
      for (var i = 0; i < sidebarLinks.length; i++) {
        sidebarLinks[i].classList.remove("active");
      }
      event.target.classList.add("active");
    }
  </script>
</body>
</html>
