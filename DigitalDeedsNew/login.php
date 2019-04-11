<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protext against sql injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
  $_SESSION['message'] = "User with that email does not exist, sorry!";
  header("location: error.php");
}
else{ // User Exists
  $user = $result->fetch_assoc();

  if ( password_verify($_POST['password'], $user['password']) ) {

    $_SESSION['email'] = $user['email'];
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['last_name'] = $user['last_name'];
    $_SESSION['active'] = $user['active'];

    //this will let the system know when a user has logged in
    $_SESSION['logged_in'] = true;

    header("location: accounthub.php");


  }

  else {
    $_SESSION['message'] = "Wrong password, please try again!";
    header("location: error.php");
  }
}
