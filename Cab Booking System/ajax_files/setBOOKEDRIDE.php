<?php 
include "../connection.php";
$query="insert into tbl_booked(InterestID,RideStatus) values(".$_POST["interestid"].",'Ride Booked')";
$result=mysqli_query($conn,$query);
if($result>0)
{
    $query="DELETE FROM tbl_interest WHERE NOT InterestID=".$_POST["interestid"]." and  RequestID=".$_POST["requestid"]."";
    $results=mysqli_query($conn,$query);
    if($results > 0)
    {
        echo "true";
    }
}
?>