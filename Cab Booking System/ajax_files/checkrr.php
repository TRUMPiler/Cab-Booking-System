<?php 

include "C:/xampp/htdocs/Cab Booking System/connection.php"; 
$query="select RequestID,driver.id from tbl_interest JOIN driver where driver.email='".$_SESSION["email"]."'";
$result=mysqli_query($conn,$query);
if($result->num_rows>0)
{
    $_SESSION["rrveri"]=false;
}
else
{
    $_SESSION["rrveri"]=true;
}
?>