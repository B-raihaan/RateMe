<?php
include "connect.php";
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}

$username = $_SESSION["username"];

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <link rel="shortcut icon" href="assets/two.png" type="image/png">

  <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


  <title>RateMe | <?php echo $username; ?></title>

  <style>
    #logout_btn {
      text-decoration: none !important;
      transition: ease-in 0.2s;
    }

    #logout_btn:hover{
      color: red !important;
    }

  </style>

</head>

<body>
  <!-- top navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
      </button>
      <a class="navbar-brand me-auto ms-lg-0 ms-3 fw-bold" href="#">RateMe</a>

      <div class="dropdown">
        <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Export
        </a>

        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="./exportsubmissions.php">All Submissions</a></li>
          <li><a class="dropdown-item" href="./export.php">All Records</a></li>
        </ul>
      </div>



      <a href="logout.php" class="text-light p-3" id="logout_btn">LOGOUT</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>
  </nav>
  <main class="mt-5 pt-3">
    <div class="container-fluid">

      <div class="row">
        <h2 class="p-4">Welcome <?php echo $username; ?> !</h2>
        <hr>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span> All Submissions
              </div>
              <div class="card-body">
                <div class="table-responsive" id="subtt">
                  <table id="dataTable" class="table table-striped table-bordered table-hover pt-3">
                    <thead class="table-light">
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Feedback Status</th>
                        <th class="text-center">Mobile Number</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM response";
                      $result = mysqli_query($conn, $sql);
                      if ($result) {

                        while ($row = mysqli_fetch_assoc($result)) {
                          $id = $row['id'];
                          $feedback = $row['button_data'];
                          $mobileNum = $row['mobile_num'];


                          if ($mobileNum ===  "") {
                            $mobileNum = "N/A";
                          }

                          echo '
                            <tr>
                                <th class="text-center">' . $id . '</th>
                                <td class="text-center">' . $feedback . '</td>
                                <td class="text-center">' . $mobileNum . '</td>
                                <td class="text-center"><a href="view.php?viewid=' . $id . '"><i class="bi bi-eye-fill text-dark"></i></a>
                                <a href="delete.php?deleteid=' . $id . '"><i class="bi bi-trash text-danger"></i></a></td>
                            </tr>
                            ';
                        }
                      } else {
                        echo 'No data found';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-md-6 mb-3">
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span> Reasons for Satisfaction / Dissatisfaction
              </div>
              <div class="card-body">
                <div class="table-responsive" id="subtm">
                  <table id="dataTable" class="table table-striped table-bordered table-hover pt-3">
                    <thead class="table-light">
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Mobile Number</th>
                        <th class="text-center">Satisfaction / Dissatisfaction</th>
                        <th class="text-center">Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT id, mobile_num, reasons, times FROM response";
                      $result = mysqli_query($conn, $sql);
                      if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                          $user_id = $row['id'];
                          $mobile_number = $row['mobile_num'];
                          $want_data = $row['reasons'];
                          $timex = $row['times'];

                          if ($mobile_number === "") {
                            $mobile_number = 'N/A';
                          }

                          if ($want_data === "") {
                            $want_data = 'Well Serviced';
                          }

                          echo '
                            <tr>
                                <td class="text-center">' . $user_id . '</td>
                                <td class="text-center">' . $mobile_number . '</td>
                                <td class="text-center">' . $want_data . '</td>
                                <td class="text-center">' . $timex . '</td>

                            </tr>
                            ';
                        }
                      } else {
                        echo 'No data found';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="card-header">
              <span><i class="bi bi-people me-2"></i></span> Add New Admins
            </div>
            <div class="card-body" id="subty">
              <form action="newadmin.php" method="POST" class="row g-3">
                <h4>Add New Admin</h4>
                <hr>
                <div class="col-md-4">
                  <label id="icon" for="name"><i class="fas fa-user"></i></label>
                  <input type="text" name="name" id="name" placeholder="User Name" class="form-control" autocomplete="off" required />
                </div>

                <div class="col-md-4">
                  <label id="icon"><i class="fas fa-envelope"></i></label>
                  <input type="email" name="email" id="name" placeholder="Email" class="form-control" autocomplete="off" required />
                </div>

                <div class="col-md-4">
                  <label id="icon"><i class="fas fa-unlock-alt"></i></label>
                  <input type="text" name="pin" id="name" placeholder="Pin Code" class="form-control" autocomplete="off" required />
                </div>
                <div class="d-grid">

                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">

          <div class="card">
            <div class="card-header">
              <span><i class="bi bi-table me-2"></i></span> Admins
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered table-hover pt-3">
                  <thead class="table-light">
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Enrolled Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT id, name, email, timez FROM admins";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        $user_id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $timez = $row['timez'];


                        echo '
                            <tr>
                                <td class="text-center">' . $user_id . '</td>
                                <td class="text-center">' . $name . '</td>
                                <td class="text-center">' . $email . '</td>
                                <td class="text-center">' . $timez . '</td>

                            </tr>
                            ';
                      }
                    } else {
                      echo 'No data found';
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </main>

  <footer class="bg-light text-light text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3 text-center" style="background-color: #21081a;">
      © <?php echo date("Y"); ?> Copyright:
      <a class="text-light" href="https://github.com/B-raihaan/">Dev Kings</a>
    </div>
    <!-- Copyright -->
  </footer>

  <script type="text/javascript">
    $(document).ready(function() {
      $('table').DataTable();
    });
  </script>

</body>

</html>