<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM response WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location: adminpage.php');

    } else{
        die(mysqli_error($conn));
    }
}

?>