<?php 
session_start();
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- <script src="js/loader.js"></script> -->
    <title>Payment</title>
    <link href="Images/Taxibooking.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- <script src="js/loader.js"></script> -->
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        #preloader {
            background: transparent url("images/loading.gif") no-repeat center;
            backdrop-filter: blur(10px);
            background-size: 13%;
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 100;
        }

        .error span {
            color: red;

        }

        span.error {
            color: red;
            border-radius: 2px solid red;
        }

        body {
            background-image: url('Images/Background.jpg');
            /* Set the URL of your background image */
            background-size: cover;
            /* Cover the entire viewport with the image */
            background-repeat: no-repeat;
            /* Prevent image repetition */
            color: rgb(255, 174, 0);
            /* Set text color to white for better visibility */
        }

        .container {
            /* background: rgba(255, 255, 255, 0.8); */
            border-radius: 10px;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            border-radius: 20px;
            width: 500px;
        }

        .custom-button {
            background: white;
            /* White background */
            color: rgb(255, 174, 0);
            /* Text color */
            border: 2px solid rgb(255, 174, 0);
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        /* Button hover effect using Bootstrap classes */
        .custom-button:hover {
            background: rgb(255, 174, 0);
            /* Background color on hover */
            color: white;
            /* Text color on hover */
        }

        .form-control:focus {
            border-color: rgb(255, 174, 0);
            /* Border color when focused */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header text-center">Payment</h1>
                    <div class="card-body">
                        <form id="myform">
                            <?php 
                            include "./connection.php";
                            $query="select tbl_interest.Cost from tbl_booked JOIN tbl_interest JOIN tbl_request_ride WHERE tbl_request_ride.passengerId=56 and tbl_interest.RequestID=tbl_request_ride.Request_id and tbl_booked.InterestID=tbl_interest.interestID limit 1";
                            $result=mysqli_query($conn,$query);
                            if($result->num_rows > 0)
                            {
                                while($row=$result->fetch_array())
                                {
                            ?>
                            <section class="registration-section text-center" id="personal-info-section">
                                <h1>₹<?php echo $row["Cost"]?></h1>
                                <!-- Amount will be displayed here -->
                                <div class="form-row my-5">
                                    <div class="form-group col-md-12">
                                        <label for="description">Your Payable Amount</label>
                                        <!-- <textarea class="form-control" id="description" name="description" placeholder="Provide us your feedback regarding our travel services.." rows="4"></textarea> -->
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <!-- <a href="index"><button type="button" class="btn custom-button">Home</button></a> -->
                                   <button  name="submit" id="pay" class="btn custom-button">Pay</button> 
                                    <!-- Button that user will click to make the payment -->
                                </div>
                            </section>
                            <?php 
                                }
                            }
                            ?>
                            <script>
                                $(document).ready(function(){
                                    $("#myform").submit(function(event)
                                    {
                                        event.preventDefault();
                                        window.location='booked Ride';
                                    })
                                })
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>