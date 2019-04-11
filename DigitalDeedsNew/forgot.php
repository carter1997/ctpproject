<?php
/* Reset your password form, sends reset.php password link */
require 'db.php';
session_start();

//check the form has been posted to the database
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )

{
  $email = $mysqli->escape_string($_POST['email']);
  $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

  if ( $result->num_rows == 0 ) // user does not exist in Database
  {

      $_SESSION['message'] = "user with that email does not exist!";
      header("location: error.php");
  }
  else { // user does exist if (num_rows != 0)

    $user = $result->fetch_assoc();

    $email = $user['email'];
    $hash = $user['hash'];
    $first_name = $user['first_name'];

    $_SESSION['message'] = "<p> Please check your email <span>$email</span>"
    . " for a confirmation link to complete your password reset!</p>";

    //send password reset link
    $to      = $email;
    $subject = 'Password Reset Link (digitaldeeds.co.uk)';
    $message_body = '
    Hello'.$first_name.',

    Please follow the link below to reset your password:

    http://www.digitaldeeds.co.uk/reset.php?email='.$email. '&hash='.$hash;

    mail($to, $subject, $message_body);

    header("location: success.php");

  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Reset Your Password</title>
  <?php include 'css/css.html'; ?>
</head>
<body>

  <div class="form">

    <h1>Reset Your Password</h1>

    <form action="forgot.php" method="post">
     <div class="field-wrap">
      <label>
        Email Address<span class="req">*</span>
      </label>
      <input type="email"required autocomplete="off" name="email"/>
    </div>
    <button class="button button-block"/>Reset</button>
    </form>
  </div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>

</html>