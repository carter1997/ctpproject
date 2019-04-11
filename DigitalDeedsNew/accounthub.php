<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>

<html>
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $first_name.' '.$last_name ?></title>
  <?php include 'css/css.html'; ?>
</head>
<body>

  <div class ="container2">

    <div class="row2">
      <img src="DDlogo100.png",
       height = 100 width = 100/>
    </div>

    <div class = form>
  <h2> Welcome <?php echo $_SESSION['first_name']; ?> </h2>
</div>

</div>
<br>
<div class ="form">
  <a href="myprofile.php"><button class="button button-block"/>Profile</button></a>
  <a href="friends.php"><button class="button button-block"/>Friends/Clients</button></a>
  <a href="contact.php"><button class="button button-block"/>Contact Digital Deeds</button></a>
  <a href="about.php"><button class="button button-block"/>About Digital Deeds</button></a>
  <a class="float-right" href="logout.php"> LOGOUT </a>
</div>

</div>
</body>
</html>
