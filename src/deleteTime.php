<?php

if(isset($_COOKIE["username"])) {
  $username = $_COOKIE["username"];
  $password = $_COOKIE["password"];
  $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
  $val = $_GET['id'];
  $sql = "delete from TIMES where ID2='$val'";
  if($conn->query($sql)) {
    echo "<h3>Time Deleted</h3>";
    echo "<br><a href=\"delete_Time.php\">Return</a> back to Time delete Page";
  } else {
    $err = $conn->errno;
    $errtext = $conn->error;
    if($err == 1451) {
      echo "<h3>Cannot delete TIME $_GET[name]!</h3>";
      echo "Something happened and cannot delete $_GET[id]!";
      echo "<br><br><a href=\"delete_Time.php\">Return</a> back to Time delete Page.";
    } else {
      echo "You got error code of $err. $errtext";
      echo "<a href=\"main.php\">Return</a> to Home Page.";
    }
  }
  } else {
      echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
}
?>
