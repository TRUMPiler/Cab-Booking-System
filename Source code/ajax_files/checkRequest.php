<?php 
include "connection.php";
// session_start();
$query="SELECT tbl_request_ride.Request_id From tbl_booked JOIN tbl_request_ride JOIN tbl_interest where tbl_request_ride.passengerId=".$_SESSION["id"]." and tbl_interest.RequestID=tbl_request_ride.Request_id and tbl_booked.InterestID=tbl_interest.interestID and Not tbl_booked.RideStatus in ('Ride Completed','Ride Cancelled');";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0){ 
    echo "<script>alert('You already have Requested for Ride')</script>"; 
    echo "<script>window.location='Booked Ride'</script>"; 
}
?>