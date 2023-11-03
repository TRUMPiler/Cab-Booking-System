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
rr.Cost as Cost
,Driver.image As Image 
FROM tbl_interest AS rr 
JOIN tbl_request_ride AS trr 
JOIN tbl_booked
JOIN driver AS Driver ON driver.ID = rr.Driverid 
JOIN vehicle AS vehicle ON vehicle.driver_id = driver.id 
where trr.passengerId=".$_SESSION["id"]."
and rr.RequestID=trr.Request_id and not tbl_booked.InterestID=rr.interestID;";
$result=mysqli_query($conn,$query);
// echo $query;
?>