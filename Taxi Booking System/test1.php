<?php

session_start();

include "ajax_files/autodeleterr.php";
if(!isset($_SESSION["role"]))
{
    echo "<script>alert('You need to login before accessing this page')</script>";
    echo "<script>window.location='login'</script>";
}
else
{
    if($_SESSION["role"]!="passenger")
    {
        echo "<script>alert('ERROR 404:Forbidden Access(You're access is not ideal for using this page)')</script>";
        echo "<script>window.location='index'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Ride</title>
    <!-- Favicons -->
  <link href="taxibooking.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>

    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    #map{
        position: relative;
        top: 20px;
        height: 567px;
    }
    .form-control{
        border: 1px solid black;
    }
    .split {
        height: 100%;
        width: 50%;
        position: fixed;
        z-index: 1;
        top: 65px;
        overflow-x: hidden;
        padding-top: 20px;
    }

        /* Control the left side */
    .left {
        left: 0;
        background-color: white;
    }

        /* Control the right side */
    .right {
        right: 0;
        /* background-color: red; */
    }
    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }
    h1{
        color: rgb(255, 174, 0);
    }
</style>
  <!-- =======================================================
  * Template Name: Ninestars
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://b
  ootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">
  
        <div class="logo">
         
          <h1 class="text-light"><div class="circle"><img src="cab2.png"  alt=""></div><a href="index.html"><span>Taxi Booking</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
  
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About Us</a></li>
            <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li> -->
            <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>
            <li class="dropdown"><a href="#" class="nav-link scrollto active"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#" class="nav-link scrollto active">Request Ride</a></li>
                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Response</a></li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
              </ul>
            </li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a class="getstarted scrollto" href="login.html">Login</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
  
      </div>
    </header><!-- End Header -->
    <div class="split left">
        <!-- <div class="centered"> -->
            <div id="map"></div>
        <!-- </div> -->
        </div><br><br>
    <div class="split right">
        <div class="container">
            <h1>Request Ride</h1>
            <hr>
            <form class="myForm">
                <div class="form-group">
                    <label for="First name">Source Location:</label>
                    <input type="test" class="form-control" value="<?php echo $_SESSION["address"]?>" id="address" name="source_address" placeholder="Enter from where you are going to travel">
                </div><br>
                <input type="text" name="latitude" id="" hidden>
                <input type="text" name="longitude" id="" hidden>
                <div class="form-group">
                    <label for="Last name">Destination Location:</label>
                    <input type="text" class="form-control" id="daddress" name="daddress" placeholder="Enter where do you wish to reach" onchange=overloading()>
                </div><br>
                    <input type="text" name="dlat" id="" hidden>
                    <input type="text" name="dlong" id="" hidden>     
                <div class="form-group">
                    <label for="Email">From Date:</label>
                    <input type="datetime-local" class="form-control" name="from-dt" placeholder="Enter your email">
                </div><br>
                <div class="form-group">
                    <label for="Password">To Date:</label>
                    <input type="datetime-local" class="form-control" name="to-dt" placeholder="Enter password">
                </div><br>
                
    <div class="form-group">
                <label for="">Source:</label>
               
                <?php 
                    $connect=mysqli_connect("localhost","root","","cms");
                    $sql = "SELECT CityGG,tbl_city.City_Name FROM `passenger` Left JOIN tbl_city ON passenger.CityGG=tbl_city.CityID where fname='naishal' LIMIT 1;";
                    $result = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($result)>0){
                        
                        echo '<select name="city" required>';

                        $num_results = mysqli_num_rows($result);
                        for ($i = 0; $i < $num_results; $i++) {
                            $row = mysqli_fetch_array($result);
                            $name = $row['City_Name'];
                            echo "<option value=".$row["CityGG"].">" . $name . "</option>";
                            //echo '<option value="' . $name . '">' . $name . '</option>';
                        }
                        $connect=mysqli_connect("localhost","root","","cms");
                    $sql = "SELECT CityID,City_Name FROM tbl_city where stateid=12";
                    $result = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($result)>0){
                        
                        
                        
                        $num_results = mysqli_num_rows($result);
                        for ($i = 0; $i < $num_results; $i++) {
                            $row = mysqli_fetch_array($result);
                            $name = $row['City_Name'];
                            echo "<option value=".$row["CityID"].">" . $name . "</option>";
                            //echo '<option value="' . $name . '">' . $name . '</option>';
                        }
                        echo '</select>';
                        $connect->close();
                    }
                }
                ?>
                <label for="Destination">Destination</label>
               <?php 
                    $connect=mysqli_connect("localhost","root","","cms");
                    $sql = "SELECT CityID,City_Name FROM tbl_city";
                    $result = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($result)>0){
                        
                        echo '<select name="dcity" id="dcity" required>';
                        echo '<option value="">--Select City--</option>';
                        $num_results = mysqli_num_rows($result);
                        for ($i = 0; $i < $num_results; $i++) {
                            $row = mysqli_fetch_array($result);
                            $name = $row['City_Name'];
                            echo "<option value=".$row["CityID"].">" . $name . "</option>";
                            //echo '<option value="' . $name . '">' . $name . '</option>';
                        }
                        echo '</select>';
                        
                    }
                    
                ?>
                    <br><label for="Distance">Distance</label>
                   <input type="text" name="distance" id='dis' readonly>
                   <label for="Distance">Duration</label>
                    <input type="text" name="duration" id='dur' readonly>
                              </select><br><br>
              </div> 
                <button type="submit" class="btn btn-success">Submit</button>
                <script>
                $("form").on("submit",function(event)
                {
                    event.preventDefault();
                    var formValues=$(this).serialize();
                    $.post(
                        "insertRR.php",
                     formValues,
                    function(data,status)
                    {
                        if(data=="success")
                        {
                            window.location="index";
                        }
                        else
                        {
                            alert('Request failed please make sure you are connected');
                        }
                    }   
                )
                });

    function overloading(){
      
        var address=document.querySelector("#address").value;
        
        const settings = {
	async: true,
	crossDomain: true,
	url: 'https://address-from-to-latitude-longitude.p.rapidapi.com/geolocationapi?address='+address+'',
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '842a523cc9msh70c73b849d2e9dep1069bajsn58b03707c0de',
		'X-RapidAPI-Host': 'address-from-to-latitude-longitude.p.rapidapi.com'
	}
};

$.ajax(settings).done(function (response) {
	console.log(response);
});
console.log("called map");

}
var map=undefined;
async function overloadings()
    {
        try{
            await new Promise(r=>setTimeout(r,2000));
            L.mapquest.key = 'w03p4OcwnfyANcr03u9OE13IfBPPwV1g';
        var baseLayer = L.mapquest.tileLayer('map');
    if(map!=undefined)
    {
        map.remove();
    }
    map = L.mapquest.map('map', {
    center: [21.1702,72.8311],
    layers: baseLayer,
    zoom: 12
}); 


  // Create markers for source and destination
  var sourceMarker = L.mapquest.textMarker([37.7749, -122.4194], {
    text: 'Source',
    position: 'right',
  }).addTo(map);

  var destinationMarker = L.mapquest.textMarker([34.0522, -118.2437], {
    text: 'Destination',
    position: 'right',
  }).addTo(map);
  map.addLayer(L.mapquest.trafficLayer());
        map.addLayer(L.mapquest.incidentsLayer());
        map.addLayer(L.mapquest.marketsLayer());
  map.addControl(L.mapquest.trafficControl());
  L.mapquest.directions().route({
   
    start: ''+document.querySelector(".myForm input[name='latitude']").value+','+document.querySelector(".myForm input[name='longitude']").value+'', // Starting address or location
    end: ''+document.querySelector(".myForm input[name='dlat']").value+','+document.querySelector(".myForm input[name='dlong']").value+'',    // Ending address or location
  });
        }
      finally{
        calculate();
      }  
  
    }
    function calculate()
    {
        
        const settings = {
	async: true,
	crossDomain: true,
	url: 'https://trueway-matrix.p.rapidapi.com/CalculateDrivingMatrix?origins='+document.querySelector(".myForm input[name='latitude']").value+'%2C'+document.querySelector(".myForm input[name='longitude']").value+'&destinations='+document.querySelector(".myForm input[name='dlat']").value+'%2C'+document.querySelector(".myForm input[name='dlong']").value+'',
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
		'X-RapidAPI-Host': 'trueway-matrix.p.rapidapi.com'
	}
};

$.ajax(settings).done(function (response) {
	console.log(response);
    var dis=response.distances[0];
    var dur=response.durations[0];
    document.querySelector(".myForm input[name='distance']").value=dis/1000+"km";
    document.querySelector(".myForm input[name='duration']").value=toTimeString(dur);
    console.log("i was called");
});
    }
    function toTimeString(totalseconds)
    {
        const totalMs=totalseconds * 1000;
        const result=new Date(totalMs).toISOString().slice(11,19);
        return result;
    }
   


    </script>
  
            </form>      
        </div>
        </div>
</body>
</html>