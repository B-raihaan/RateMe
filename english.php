<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RateMe | English</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="assets/two.png" type="image/png">
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

        .button-container {
            text-align: center;
        }

        .button-container button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 28px;
            transition: 0.2s ease;
        }

        .button-container button:hover {
            transform: scale(1.2);
        }

        .rounded-circle {
            /* border: 3px solid rgba(16, 0, 116, 1); */
            background: none;
            width: 100px;
            height: 100px;
            cursor: pointer;
            border-top-left-radius: 18px;
            border-top-right-radius: 18px;
            border-bottom-left-radius: 18px;
            border-bottom-right-radius: 18px;
            overflow: hidden;
        }

        #btn1 {
            background: rgba(255, 0, 0, 1);
            border: none;
            color: white;
        }

        #btn2 {
            background: rgb(255, 77, 0);
            border: none;
            color: white;
        }

        #btn3 {
            background: #ffc400;
            border: none;
            color: white;
        }

        #btn4 {
            background: rgb(55, 255, 0);
            border: none;
            color: white;
        }

        #btn5 {
            background: rgb(0, 166, 19);
            border: none;
            color: white;
        }

        #number_box {
            margin-top: 25px;
            text-align: center;
        }
    </style>
</head>

<body onload="pageLoad()">



    <form>
        <div class="button-container">
            <div id="number_box" class="d-grid gap-2 mb-5">
                <input type="text" id="mobileNumber" class="form-control form-control-lg" placeholder="Enter your Phone Number">
            </div>

            <button type="button" id="btn1" class="rounded-circle" onclick="btnclick('Weak')">
                1
            </button>
            <button type="button" id="btn2" class="rounded-circle" onclick="btnclick('Fair')">
                2
            </button>

            <button type="button" id="btn3" class="rounded-circle" onclick="btnclick('Good')">
                3
            </button>
            <button type="button" id="btn4" class="rounded-circle" onclick="btnclick('Better')">
                4
            </button>
            <button type="button" id="btn5" class="rounded-circle" onclick="btnclick('Best')">
                5
            </button>
        </div>

        <div class="progress mt-3" style="height: 30px;">
            <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 20%; background: rgba(255, 0, 0, 1) !important; font-size: 15px;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">Weak</div>
            <div class="progress-bar bg-success" role="progressbar" aria-label="Segment two" style="width: 20%; background: rgb(255, 77, 0) !important; font-size: 15px;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Fair</div>
            <div class="progress-bar bg-danger" role="progressbar" aria-label="Segment three" style="width: 20%; background: #ffc400 !important; font-size: 15px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Good</div>
            <div class="progress-bar bg-dark" role="progressbar" aria-label="Segment three" style="width: 20%; background: rgb(55, 255, 0) !important; font-size: 15px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Better</div>
            <div class="progress-bar bg-primary" role="progressbar" aria-label="Segment three" style="width: 20%; background: rgb(0, 166, 19) !important; font-size: 15px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Best</div>
        </div>

    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function pageLoad() {

            var htm = '<p>We are always trying to improve our service. <br>Can you rate your experience with our service on a scale of 1 to 5?</p><br><p>Number 5 means you are satisfied with our service and number 1 indicates that our service needs further improvement.<p>'

            Swal.fire({
                title: "Have A Nice Day",
                html: htm,
                showConfirmButton: false, // Hide the confirm button
            });
        }

        function btnclick(value) {
            console.log("Done");
        

            var numberToSend = $('#mobileNumber').val();

            if (value === 'Weak' || value === 'Fair') {
                window.location.href = "survey.php?value=" + value + "&mobileNumber=" + numberToSend;
            } else {
                var dataToSend = {
                    value: value,
                    mobileNumber: numberToSend
                };

                $.ajax({
                    type: "POST",
                    url: "englishfunc.php",
                    data: dataToSend,
                    success: function(data, status) {
                        console.log("Coding makes me perfect");
                        window.location.href = "english.php";


                    }
                });


            }
            return false;

        }
    </script>

</body>

</html>