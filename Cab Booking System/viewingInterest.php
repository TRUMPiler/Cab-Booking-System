<?php

if(isset($_SESSION["fname"]))
{
    if($_SESSION["fname"]=="")
    {
        echo "<script>window.location='login.php'</script>";
    }
}

include "connection.php";
$query="SELECT 
rr.interestID,rr.RequestID, driver.fname as DriverName,vehicle.company_name as VechicleCompany,vehicle.model as model,rr.Cost as Cost,Driver.image As Image
FROM tbl_interest AS rr 
JOIN tbl_request_ride AS trr 
JOIN driver AS Driver ON driver.ID = rr.Driverid 
JOIN vehicle AS vehicle ON vehicle.driver_id = driver.id
where trr.passengerid=".$_SESSION["id"]."";
$result=mysqli_query($conn,$query);
// echo $query;
?>