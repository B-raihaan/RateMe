<?php
include 'connect.php';

if (isset($_GET['viewid'])) {
    $id = $_GET['viewid'];

    $sql = "SELECT id=$id FROM response";
    $result = mysqli_query($conn, $sql);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RateMe | <?php echo $id;?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="assets/two.png" type="image/png">

    <style>
        .emp-profile {
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
            box-shadow: 12px 12px 7px rgba(0, 0, 0, 0.2);
        }

        .profile-img {
            text-align: center;
        }

        .profile-img img {
            width: 70%;
            height: 100%;
        }

        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
        }

        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .profile-head h5 {
            color: #333;
        }

        .profile-head h6 {
            color: #0062cc;
        }

        .profile-edit-btn {
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }

        .proile-rating {
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }

        .proile-rating span {
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }

        .profile-head .nav-tabs {
            margin-bottom: 5%;
        }

        .profile-head .nav-tabs .nav-link {
            font-weight: 600;
            border: none;
        }

        .profile-head .nav-tabs .nav-link.active {
            border: none;
            border-bottom: 2px solid #0062cc;
        }

        .profile-work {
            padding: 14%;
            margin-top: -15%;
        }

        .profile-work p {
            font-size: 12px;
            color: #818282;
            font-weight: 600;
            margin-top: 10%;
        }

        .profile-work a {
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }

        .profile-work ul {
            list-style: none;
        }

        .profile-tab label {
            font-weight: 600;
        }

        .profile-tab p {
            font-weight: 600;
            color: #72009d;
        }
    </style>


</head>

<body>
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="assets/pic.jpg" alt="User" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <?php

                        $sql = "SELECT * FROM response WHERE id=$id";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $feedback = $row['button_data'];
                                $mobileNum = $row['mobile_num'];

                                if ($mobileNum ===  "") {
                                    $mobileNum = "N/A";
                                }

                                echo '
                                        <h2>' . $feedback . '</h2>
                                        <p class="proile-rating">Mobile Number : <span>' . $mobileNum . '</span></p>
                                    ';
                            }
                        }

                        ?>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="adminpage.php">Back to Panel</a>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">

                                    <?php

                                    $sql = "SELECT * FROM response WHERE id=$id";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id'];
                                            echo '
                                        <p>' . $id . '</p>
                                    ';
                                        }
                                    }

                                    ?>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Feedback Status</label>
                                </div>
                                <div class="col-md-6">
                                    <?php

                                    $sql = "SELECT * FROM response WHERE id=$id";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $feedback = $row['button_data'];
                                            echo '
                                        <p>' . $feedback . '</p>';
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Mobile Number</label>
                                </div>
                                <div class="col-md-6">
                                    <?php

                                    $sql = "SELECT * FROM response WHERE id=$id";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $mobileNum = $row['mobile_num'];

                                            if ($mobileNum ===  "") {
                                                $mobileNum = "N/A";
                                            }

                                            echo '
                                        <p>' . $mobileNum . '</p>
                                    ';
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Engaged Time</label>
                                </div>
                                <div class="col-md-6">
                                    <?php

                                    $sql = "SELECT * FROM response WHERE id=$id";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $tt = $row['times'];
                                            echo '
                                        <p>' . $tt . '</p>
                                    ';
                                        }
                                    }

                                    ?>

                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Satisfaction / Dissatisfaction</label>
                                </div>
                                <div class="col-md-6">
                                    <?php

                                    $sql = "SELECT * FROM response WHERE id=$id";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $reasons = $row['reasons'];

                                            if ($reasons === "") {
                                                $reasons = "Successfully Serviced";
                                            }

                                            echo '
                                        <p>' . $reasons . '</p>
                                    ';
                                        }
                                    }

                                    ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

   


</body>

</html>