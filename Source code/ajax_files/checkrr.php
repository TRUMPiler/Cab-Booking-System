<?php 

include "connection.php"; 
$query="select RequestID,driver.id from tbl_interest JOIN tbl_booked JOIN driver where tbl_interest.DriverID=".$_SESSION["id"]." and driver.id=tbl_interest.DriverID and tbl_booked.Booked_ID=tbl_interest.interestID and NOT tbl_booked.RideStatus in ('Ride Completed','Ride Cancelled');";
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