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
  <h2> Hey <?php echo $_SESSION['first_name']; ?> want to know more about us? </h2>
</div>

</div>
<br>
<div class ="form">
<h2> ‘Digital Deeds’ is a newly launched web platform, which allows users of the site to upload images/videos of designs and projects they make for clients/friends.
  <br>
It is a great way of showing off your talent and experience in the design industry. Most importantly, it is a great way to get your name out there and get some recognition.
<br>
The idea of ‘Digital Deeds’, is to act as a personal portfolio for your work, displaying your projects in crisp quality, and organised in a neat and appealing fashion.
<br>
Creating an account with us is easy, so don’t worry it will only take 5 minutes! Simply enter your details in the registration form, open the email we send to you and verify your account through the link. You are then ready to start uploading designs and start getting some notice.
<br>
If you have any issues with the site, or simply have some feedback you would like to share about the site, go back to the account hub and click contact us. </h2>
</div>
<a class="float-right" href="accounthub.php"> Back </a>

</div>
</body>
</html>
