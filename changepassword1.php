<?php
session_start();
error_reporting(0);
if (isset($_SESSION["verified"])) {
    if (isset($_SESSION["passwordVerified"])) {
        if ($_SESSION["passwordVerified"] == true) {
            header("location:index");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="assets/js/loader.js"></script>
    <title>Change Password</title>
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
            width: 700px;
            height: 350px;
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

    <div id="preloader"></div>
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header text-center">Change Password</h1>
                    <div class="card-body">
                        <form id="myform">
                            <section class="registration-section" id="personal-info-section">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="password">Set Password:</label>
                                        <input type="password" class="form-control" id="newpassword" name="newpassword" required>
                                        <span class="error" id="password_err"> </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password:</label>
                                        <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                                        <span class="error" id="cpassword_err"> </span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="profile"><button type="button" class="btn custom-button">Back to Profile</button></a>
                                    <button type="submit" name="submit" class="btn custom-button">Submit</button>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["newpassword"])) {
        if ($_POST["newpassword"] != $_POST["cpassword"]) {
            echo "password does not match";
        }
    }

    ?>
    <?php
    if (isset($_POST["submit"])) {
        if ($_POST["newpassword"] == $_POST["cpassword"]) {
            $email = $_SESSION["email"];
            require("connection.php");
            $sql = "select email from passenger where email='" . $email . "'";
            $ret = mysqli_query($conn, $sql);
            if ($ret->num_rows > 0) {
                require("connection.php");
                echo "passenger called";
                echo "$email";
                $sqls = "UPDATE `passenger` SET `password`='" . $_POST["newpassword"] . "' WHERE email='" . $email . "'";
                $rets = mysqli_query($conn, $sqls);
                if ($ret->num_rows > 0) {
                    echo "$email";
                    $sql = "SELECT * FROM passenger where email='" . $email . "' limit 1";
                    $ret = mysqli_query($conn, $sql);
                    if ($ret->num_rows > 0)
                        while ($row = $ret->fetch_array()) {

                            echo "function called";
                            $_SESSION["fname"] = $row["fname"];
                            $_SESSION["lname"] = $row["lname"];
                            $_SESSION["dob"] = $row["dob"];
                            $_SESSION["gender"] = $row["gender"];
                            $_SESSION["contact"] = $row["contact"];
                            $_SESSION["address"] = $row["address"];
                            $_SESSION["email"] = $row["email"];
                            $_SESSION["password"] = $row["password"];
                            $_SESSION["role"] = "passenger";
                            $_SESSION["verified"] = true;
                            header("location:index");
                        }
                }
            } else {
                $sql = "select email from admin where email='" . $email . "'";
                $ret = mysqli_query($conn, $sql);
                if ($ret->num_rows > 0) {
                    $sql = "SELECT * FROM adminr where email='" . $_POST["email"] . "' limit 1";
                    $_SESSION["fname"] = $row["fname"];
                    $_SESSION["lname"] = $row["lname"];
                    $_SESSION["dob"] = $row["dob"];
                    $_SESSION["gender"] = $row["gender"];
                    $_SESSION["contact"] = $row["contact"];
                    $_SESSION["address"] = $row["address"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["password"] = $row["password"];
                    $_SESSION["role"] = "passenger";
                    $_SESSION["verified"] = true;
                    header("location:index");
                }
            }
        }
    }

    ?>

    </div>
    <script>
        window.addEventListener("load", function() {
            HH();
        })
        loading();
    </script>
</body>

</html>
