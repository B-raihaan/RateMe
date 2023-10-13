<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RateMe | SURVEY</title>
    <link rel="shortcut icon" href="assets/two.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Noto+Sans+Sinhala:wght@200;400&display=swap");
        body {
            margin: 0;
            font-family: sans-serif;
            background-color: #fff;
        }

        * {
            box-sizing: border-box;
        }

        .form-box {
            max-width: 553px;
            background-color: rgb(255, 255, 255);
            margin: 150px auto;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 12px 12px 7px rgba(0, 0, 0, 0.2);
        }

        .form-box label input {
            display: none;
        }

        .form-box label {
            display: block;
            cursor: pointer;
            margin-bottom: 30px;
            padding-left: 55px;
            position: relative;
        }

        .form-box label .circle {
            height: 40px;
            width: 40px;
            border: 5px solid #001d54;
            border-radius: 50%;
            display: inline-block;
            position: absolute;
            left: 0;
            top: -5px;
            transition: border-color .5s ease;
        }

        .form-box label .circle::before {
            content: '';
            height: 16px;
            width: 16px;
            background-color: #001d54;
            position: absolute;
            left: 0;
            top: 0;
            border-radius: 50%;
            box-sizing: border-box;
            margin-left: 7px;
            margin-top: 7px;
            transition: transform .5s ease;
            transform: scale(0);
        }

        .form-box label span {
            font-size: 20px;
            color: #001d54;
            display: inline-block;
            font-style: "Noto Sans Sinhala", sans-serif;
            transition: color .5s ease;
        }

        .form-box label input:checked+.circle {
            border-color: #001d54;
        }

        .form-box label input:checked+.circle::before {
            transform: scale(1);
        }

        .form-box label input:checked+.circle+span {
            color: #001d54;
        }
    </style>

</head>

<body>

    <form action="surveyFunc.php" method="post">
        <div class="form-box">
            <h4 class="my-3 pb-3" style="font-family: 'Noto Sans Sinhala', sans-serif;">ඔබේ අතෘප්තියට හේතු...</h4>
            <input type="hidden" name="button_value" value="<?php echo $_GET['value']; ?>">
            <input type="hidden" name="mobile_value" value="<?php echo $_GET['mobileNumber']; ?>">
            <label>
                <input type="radio" name="satisfaction" value="Spending Time">
                <div class="circle"></div>
                <span style="font-family: 'Noto Sans Sinhala', sans-serif;">ගතවූ කාලය</span>
            </label>
            <label>
                <input type="radio" name="satisfaction" value="Staff Evolvement">
                <div class="circle"></div>
                <span style="font-family: 'Noto Sans Sinhala', sans-serif;">කාර්‍යමණ්ඩල දායකත්වය</span>
            </label>
            <label>
                <input type="radio" name="satisfaction" value="Lack Of Documentation">
                <div class="circle"></div>
                <span style="font-family: 'Noto Sans Sinhala', sans-serif;">ලිපි ලේඛනවල ගැටලු සහ අස්ථාන ගතවීම්</span>
            </label>
            <div class="d-grid gap-2">
                <input class="btn btn-primary" value="Submit" type="submit" style="background: #001d54 !important; border: none; height: 50px; font-size: 20px">
            </div>
        </div>
    </form>
    <script>

    </script>

</body>

</html>