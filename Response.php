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
    <div class="container-fluid">
    <table id="requestedrides" class="table table-striped table-bordered" style="width:100%" style="background-color: rgb(255, 174, 0); color: white;">
        <thead>
            <tr>
                <th>Driver Name</th>
                <th>Vehicle</th>
                <th>Cost</th> 
                <th>Image</th>
                <th>Accept</th>
            </tr>
        </thead>
        <tbody>
            <?php include "viewingInterest.php"; 
            while ($row = $result->fetch_array()) {
            ?>
            <tr>
                <td><?php echo $row["DriverName"];?></td>
                <td><?php echo $row["VehicleCompany"]." ".$row["Model"];?></td>
                <td><?php echo $row["Cost"];?></td>
                <td><img src="images/<?php echo $row["Image"];?>" alt="" width="100px"></td>
                <td>
                    <button class="btn btn-primary" style="background-color: rgb(255, 174, 0); border-color: rgb(255, 174, 0);" id="btnintrestRide" name="<?php echo $row["interestID"];?>" onclick="booking(<?php echo $row["interestID"];?>)">Accept Ride</button>
                </td>
            </tr>
            <input type="text" value="<?php echo $row["RequestID"] ?>" id="REQUESTID" hidden>
            <input type="text" value="<?php echo $row["DriverID"] ?>" id="DRIVERID" hidden>
            <?php }?>
        </tbody>
    </table>
    <a href="index"><button class="btn btn-secondary">Back</button></a>
</div>
        <script>
        $(document).ready(function(){
       
       $("#requestedrides").dataTable();
    //    $("button").click(function(){
    //        var x=document.getElementById("btnintrestRide").name;
    //        var xs=document.getElementById("REQUESTID").value;
            
    //        $.post("ajax_files/setBOOKEDRIDE.php",{interestid:x,requestid:xs},function(data){
    //            if(data=="true")
    //            {
    //              alert("ride booked successfully");
    //              window.location="booked ride mail.php";
    //            }   
    //        })    
    //    })
   })
  function booking(name)
   {
    var x=name;
           var xs=document.getElementById("REQUESTID").value;
           var xss=document.getElementById("DRIVERID").value;
           $.post("ajax_files/setBOOKEDRIDE.php",{interestid:x,requestid:xs,driverid:xss},function(data){
               if(data=="truetrue")
               {
                 alert("ride booked successfully");
                 window.location="booked ride mail.php";
               }   
               else
               {
                alert(data);
               }
           }) 
   }
    </script>
</body>
</html>
