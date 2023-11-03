<?php

if(isset($_SESSION["fname"]))
{
    if($_SESSION["fname"]=="")
    {
        echo "<script>window.location='login.php'</script>";
    }
}

include "connection.php";
$query="SELECT Request_id, SourceAddress,DestinationAddress,rr.From,rr.To, 
passenger.fname as passengername, 
source_city.City_name AS source_city_name, 
destination_city.City_name AS destination_city_name 
FROM tbl_request_ride AS rr 
JOIN tbl_city AS source_city ON rr.SourceCity = source_city.CityID 
JOIN tbl_city AS destination_city ON rr.DestinationCity = destination_city.CityID 
JOIN passenger as passenger on rr.passengerId=passenger.id 
JOIN tbl_interest 
JOIN tbl_booked 
where SourceCity=".$_SESSION["city"]." 
AND NOT (tbl_interest.RequestID=rr.Request_id 
and tbl_booked.InterestID=tbl_interest.InterestID);";
$result=mysqli_query($conn,$query);

?>