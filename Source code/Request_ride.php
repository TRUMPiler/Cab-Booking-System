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
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
  .form-control {
    border: 1px solid black;
  }
  .split {
    height: 100%;
    width: 50%;
    position: fixed;
    top: 65px;
    overflow-x: hidden;
    padding-top: 20px;
  }
  .left {
    left: 0;
    background-color: white;
  }
  .right {
    right: 0;
  }
  .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
  }
  h1 {
    color: rgb(255, 174, 0);
  }
</style>
</head>
<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">
  
        <div class="logo">
         
          <h1 class="text-light"><a href="index.html"><span>Taxi Booking</span></a></h1>
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
        <div class="centered">
            <!-- Upload the map here -->
        </div>
        </div><br><br>
    <div class="split right">
        <div class="container">
            <h1>Request Ride</h1>
            <hr>
            <form>
                <div class="form-group">
                    <label for="First name">Source Location:</label>
                    <input type="text" class="form-control" name="fname" placeholder="Enter from where you are going to travel">
                </div><br>
                <div class="form-group">
                    <label for="Last name">Destination Location:</label>
                    <input type="text" class="form-control" name="lname" placeholder="Enter where do you wish to reach">
                </div><br>
                <div class="form-group">
                    <label for="Email">From Date:</label>
                    <input type="datetime-local" class="form-control" name="email" placeholder="Enter your email">
                </div><br>
                <div class="form-group">
                    <label for="Password">To Date:</label>
                    <input type="datetime-local" class="form-control" name="password" placeholder="Enter password">
                </div><br>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>      
        </div>
        </div>
</body>
</html>