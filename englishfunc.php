<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value = $_POST["value"];
    $mobileNumber = $_POST["mobileNumber"];

    // Replace with your database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "feedback_app";

    // Create a new MySQLi connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check for database connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Define your SQL query to insert the value into the user_data table
    $sql = "INSERT INTO response (button_data, mobile_num) VALUES ('$value','$mobileNumber')";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Value inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
