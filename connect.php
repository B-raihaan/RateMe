<?php

// Step 1: Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_app"; // Name of your database

// Step 2: Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn){
    echo "";
}

else{
    die(mysqli_error($conn));
};

?>