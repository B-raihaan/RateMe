<?php

    include 'connect.php';

    session_start();

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $pin = $_POST['pin_code'];
      
        $sql = "SELECT * FROM admins WHERE name = '$username' AND pin_code = '$pin'";
        $result = mysqli_query($conn, $sql);
      

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RateMe | Login As Admin</title>
    <link rel="shortcut icon" href="assets/two.png" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <style>

        #error_msg {
            font-weight: 500;
            font-size: large;
        }

        .login {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('./assets/img.jfif');
            background-size: cover;
            background-position: center;
        }

        .login-heading {
            font-weight: 300;
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }
    </style>

</head>

<body>

    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Access the Admin Page</h3>

                                <?php
                                
                                if (isset($_POST['submit'])) {
                                    $username = $_POST['username'];
                                    $pin = $_POST['pin_code'];
                                  
                                    $sql = "SELECT * FROM admins WHERE name = '$username' AND pin_code = '$pin'";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result->num_rows == 1) {
                                        $_SESSION["username"] = $username;
                                        header("Location: adminpage.php");
                                    } else {
                                        echo '<p class="text-danger" id="error_msg">Invalid Email or Pin Code</p>';
                                    }
                                  
                            
                                }

                                

                                ?>
                                

                                <!-- Sign In Form -->
                                <form method="POST" action="login.php">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Enter your username" name="username" autocomplete="off">
                                        <label for="floatingInput">User Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Enter your Password" name="pin_code" autocomplete="off">
                                        <label for="floatingPassword">Pin Code</label>
                                    </div>

                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit" name="submit">Redirect</button>
                                        
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>