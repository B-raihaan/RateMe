<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $button_value = $_POST["button_value"];
    $satisfaction = $_POST["satisfaction"];
    $mobile_value = $_POST["mobile_value"];

    // Perform database connection and insert the data into the user_data table
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "feedback_app";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO response (button_data, reasons, mobile_num) VALUES ('$button_value', '$satisfaction', '$mobile_value')";

    if ($conn->query($sql) === TRUE) {
        header('Location: success.php');;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>