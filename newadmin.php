<?php

include "connect.php";

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pin = $_POST['pin'];

  $sql = "INSERT INTO admins (name, email, pin_code) values('$name', '$email', '$pin')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    header('Location: adminpage.php');
  } else {
    die(mysqli_error($conn));
  }
}

?>
