<?php

if(isset($_SESSION["fname"]))
{
    if($_SESSION["fname"]=="")
    {
        echo "<script>window.location='login.php'</script>";
    }
}

include "connection.php";
$query="SELECT rr.interestID,rr.RequestID, 
driver.fname as DriverName,
vehicle.company_name as VechicleCompany,
vehicle.model as model,
rr.Cost as Cost,tbl_booked.RideStatus
,driver.image As Image 
FROM tbl_interest as rr
JOIN tbl_booked
JOIN tbl_request_ride as trr on trr.Request_id=rr.RequestID
JOIN driver 
JOIN vehicle
where trr.passengerId=".$_SESSION["id"]." and (rr.RequestID=trr.Request_id and tbl_booked.InterestID=rr.interestID) and NOT  tbl_booked.RideStatus in ('Ride Completed','Ride Booked');";
$result=mysqli_query($conn,$query);
// echo $query;
?>