<?php
session_start();
if(isset($_SESSION["otp"]))
{
    $otp=random_int(10000,99999);
    $to_email = $_SESSION["email"];
    $subject = "OTP VERIFICATION";
    $body = "your otp is $otp";
    $headers = "From: dashtaxigg@gmail.com";

    if (mail($to_email, $subject, $body, $headers)) {
        $_SESSION["otp"]=$otp;
        header("location:process");
    } 
    else 
    {
        echo "Email sending failed...";
    }
}
else
{
    header("location:process.php");
}
