<?php
session_start();
include "ajax_files/autodeleterr.php";

if (!isset($_SESSION["role"])) {
    echo "<script>alert('You need to login before accessing this page')</script>";
    echo "<script>window.location='login'</script>";
} else {
    if ($_SESSION["role"] != "driver") {
        echo "<script>alert('ERROR 404: Forbidden Access (Your access is not ideal for using this page)')</script>";
        echo "<script>window.location='index'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Requested Rides</title>

    <!-- Include Bootstrap CSS with custom color theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* Custom color theme with black accents */
        body {
            background-color: rgb(255, 174, 0);
            color: black;
        }

        /* Change table and button styles */
        .table {
            background-color: white;
            border: 1px solid rgb(255, 174, 0);
        }

        .table thead th {
            background-color: rgb(255, 174, 0);
            color: black;
            border: 1px solid rgb(255, 174, 0);
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 174, 0, 0.2);
        }

        .btn-primary {
            background-color: rgb(255, 174, 0);
            border: 1px solid rgb(255, 174, 0);
        }

        .btn-primary:hover {
            background-color: rgb(255, 140, 0);
            border: 1px solid rgb(255, 140, 0);
        }

        .btn-secondary {
            background-color: white;
            border: 1px solid rgb(255, 174, 0);
            color: rgb(255, 174, 0);
        }

        .btn-secondary:hover {
            background-color: rgb(255, 174, 0);
            color: white;
        }
    </style>

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="assets/js/loader.js"></script>
    <!-- Favicons -->
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
    <script src="js/loader.js"></script>
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.jqueryui.min.js"></script>
</head>

<body>
    <!-- <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1 class="text-light"><a href="index.html"><span>Taxi Booking</span></a></h1>
                Uncomment below if you prefer to use an image logo
                <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class a class="nav-link scrollto" href="#about">About Us</a></li>
                    <li class="dropdown"><a href="#services"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="Request ride">Request Ride</a></li>
                            <li><a href="#">Response</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li>
                    <?php
                    // if (isset($_SESSION["fname"])) {
                    //     if ($_SESSION["fname"] == "") {
                    //         echo "<li><a class='getstarted scrollto' href='login'>Login</a></li>";
                    //     } elseif (isset($_SESSION["filename"])) {
                    //         echo "<li><a  href='profile1'>" . "<img src='images/" . $_SESSION["filename"] . "' alt='" . $_SESSION["fname"] . "' style='border-radius:360%;'>" . "</a></li>";
                    //     } elseif (!isset($_SESSION["filename"]) && $_SESSION["fname"] != "") {
                    //         echo "<li><a class='getstarted scrollto' href='profile1'>" . $_SESSION["fname"] . "</a></li>";
                    //     }
                    // } else {
                    //     echo "<li><a class='getstarted scrollto' href='login'>Login</a></li>";
                    // }
                    ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header> -->

    <div class="content-container">
        <table id="requestedrides" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Passenger Name</th>
                    <th>Interest Request</th>
                </tr>
            </thead>
            <tbody>
                <?php include "viewing.php";
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $row["SourceAddress"] . " " . $row["source_city_name"] . " "; ?></td>
                        <td><?php echo $row["DestinationAddress"] . " " . $row["destination_city_name"]; ?></td>
                        <td><?php echo $row["From"]; ?></td>
                        <td><?php echo $row["To"]; ?></td>
                        <td><?php echo $row["passengername"]; ?></td>
                        <td>
                            <button class="btn btn-primary btnintrestRide" name="<?php echo $row["Request_id"]; ?>" onclick='requestride(<?php echo $row["Request_id"]; ?>,"<?php echo $row["From"]; ?>","<?php echo $row["To"]; ?>")'>Give Cost estimation</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index_driver"><button class="btn btn-secondary">Back</button></a>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#requestedrides").dataTable();
        // $(".btnintrestRide").click(function() {
        //     var requestID = $(this).data("requestid");
        //     $.post("InterestPage.php", {
        //         RequestID: requestID
        //     }, function() {
        //         window.location = "Cost_Estimation.php";
        //     });
        // });
    });
    function requestride(id,from,to)
    {
        var requestID = id;
            $.post("InterestPage.php", {
                RequestID: requestID,From:from,to:to
            }, function(data) {
                if(data=="true")
                {
                    window.location = "Cost_Estimation.php";
                }
                else if(data=="false")
                {
                     alert("you already have a schduled rides on these days");
                }
                else
                {
                    alert(data);
                }
            });
    }
</script>

</html>
