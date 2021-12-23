

<?php
include_once "includes/session.php"?> 


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title> Attendance - <?php  echo $tile ?> </title>
  </head>
  <body>

  
  <nav class="navbar">

<!-- NAVIGATION MENU -->
<ul class="nav-links">

  <!-- NAVIGATION MENUS -->
  <div class="menu">
<ti>
<a class="navbar-brand" href="entry.php">
      <div class="logo-image">
            <img src="images/cross.png" class="img-fluid"  width="40px"height="40px" >
      </div>
</a>

</ti>

  <li>
<a  href="index.php">Registration</a>
</li>

<li>
<a  href="records.php">View Attendees</a>
</li>
<li>
<a  href="search.php">Search Attendees</a>
</li>

</ul>
  </div>
</ul>
</nav>

<ul class="nav justify-content-left nav-pills">
  <?php
  if(!isset($_SESSION['userid'])){
?>
    <li class="nav-item">
    <a class="nav-link" href="login.php">Login</a>
  </li>
  <?php } else { ?>
    <a class="nav-item nav-link" href="#"><span>Hello <?php echo $_SESSION['username'] ?>! </span> <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
          <?php } ?>

</ul>

      <div class="container">

     
</br>


