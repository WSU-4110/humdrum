
<?php 
if(!isset($_SESSION))
    {
	session_start();
    }
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
 
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  
  
  <!-- Site Title -->
  <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i><i>humdrum</i></a>
  
  
  <!-- Trending Page -->
  <a href="trending.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  
  
  <!-- Profile Page -->
  <a href="profile.php?user=<?=$_SESSION["user_id"]?>" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Profile"><i class="fa fa-user"></i></a>
  
  
  <!-- Notifications -->
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
	
      <a href="#" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
    </div>
  </div>
  
  <!-- Search for a user -->
  <form action="profile.php" method="GET" id= "nav">
  Search for a user: 
  <input type="text" name="user">
  <input type="submit" value="Submit">
    </form>

  
  <div class="w3-dropdown-hover w3-hide-small w3-right">
    <button class="w3-button w3-padding-large" title="Notifications">
		<?php
		$pic = "../profile_pics/". $_SESSION["user_id"] . ".jpeg";
		?>
		<img src=<?=$pic?> alt="Profile Picture." width="24" height="24">
		<?=$_SESSION["user_id"]?>
		</button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
	
      <a href="logout.php" class="w3-bar-item w3-button">Log Out</a>
    </div>
  </div>
  
  
 </div>
</div>




</body>
