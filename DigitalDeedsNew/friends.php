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
  <p> Hey <?php echo $_SESSION['first_name']; ?>, once you find friends/clients on the site,  they'll be displayed here: </p>
</div>

</div>
<br>
<div class ="form">


<img class = "profilepic" img src="profiledefault.png">
<img class = "profilepic" img src="profiledefault2.png">
<img class = "profilepic" img src="profiledefault3.png">
<img class = "profilepic" img src="profiledefault4.png">




</div>
  <a class="float-right" href="accounthub.php"> Back </a>
</div>
</body>
</html>
