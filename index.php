<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RateMe</title>
  <link rel="shortcut icon" href="assets/two.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Noto+Sans+Sinhala:wght@200;400&display=swap");

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      flex-direction: column;
    }

    h2 {
      margin: 15px;
    }

    .button-container {
      text-align: center;
    }

    .button-container button {
      margin: 10px;
      padding: 10px 20px;
      font-size: 28px;
    }

    button {
      border: 3px solid rgba(16, 0, 116, 1);
      background: none;
      width: 320px;
      height: 80px;
      cursor: pointer;
      border-top-left-radius: 18px;
      border-top-right-radius: 18px;
      border-bottom-left-radius: 18px;
      border-bottom-right-radius: 18px;
      overflow: hidden;
    }

    #btn1 {
      border: 3px solid rgba(16, 0, 116, 1);
    }

    #btn2 {
      border: 3px solid rgba(255, 168, 0, 1);
      font-family: "Noto Sans Sinhala", sans-serif;
    }

    #btn3 {
      border: 3px solid rgba(255, 0, 0, 1);
    }
  </style>
</head>

<body>

<header>

    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav mx-5">
      <!-- SideNav slide-out button -->
      
      <ul class="nav navbar-nav nav-flex-icons ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="fas fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block">ADMIN LOGIN</span></a>
        </li>
      </ul>
    </nav>
    <!-- /.Navbar -->
  </header>

  <h2>Select your language</h2>

  <div class="button-container">
    <a href="./english.php"><button id="btn1">Engilsh</button></a>
    <a href="./sinhala.php"><button id="btn2">සිංහල</button></a>
    <a href="./tamil.php"><button id="btn3">தமிழ்</button></a>
  </div>


</body>

</html>