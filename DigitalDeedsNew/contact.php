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
  <h2> Hey <?php echo $_SESSION['first_name']; ?> anything we can help with? </h2>
  <br>
  <h2> Write an email to us, and a member from our support team will get back to you </h2>
</div>

</div>
<br>
<div class ="form">
<h2>
compose an email to: accountsupport@digitaldeeds.co.uk , explaining in short what issues you are experiencing with the site
<br>
We hope to get back to you as soon as possible and fix your problems. </h2>






</div>
  <a class="float-right" href="accounthub.php"> Back </a>
</div>
</body>
</html>
