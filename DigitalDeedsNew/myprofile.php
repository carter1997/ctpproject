<?php
/* Displays user information and some useful messages */
session_start();
require 'db.php';
include_once 'dbh.php';


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
<!DOCTYPE html>
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
  <h2> <?php echo $_SESSION['first_name']; ?>'s profile </h2>
</div>

<div class = form>
  <p> Upload a profile picture to be displayed here: </p>
  <img class = "profilepic" img src="profiledefault.png">
<?php
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
            $resultImg = mysqli_query($conn, $sqlImg);
            while ($rowImg = mysqli_fetch_assoc($resultImg)) {
              echo "<div class= 'user-container'>";
                  if ($rowImg['status'] == 0) {
                    echo "<img src='uploads/profile".$id.".jpg'>";
                  }else {
                    echo "<img src='profiledefault.png'>";
                  }

                  echo $row['first_name'];
              echo "</div>";

            }
        }
    } else {
        echo "Account not activated";
    }



    if(isset($_SESSION['active'])) {
      if ($_SESSION['active'] == 1) {
        echo "Acount - Activated";
      }
      echo "<form action= 'upload.php' method='POST' enctype='multipart/form-data'>
            <input type='file' name='file'>
            <button type='submit' name='submit'>Upload</button>
            </form>";
    } else {
      echo "account is not activated";

    }




 ?>

</div>



</div>
<br>
<div class ="form2">








</div>
<div class = "back-button">
<a class="float-right" href="accounthub.php"> Back </a>
</div>
</div>
</body>
</html>
