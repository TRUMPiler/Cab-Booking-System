<?php 
include "connection.php";

$query="select * from tbl_request_ride where passengerid=".$_SESSION["id"]."";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0){ 
    echo "<script>alert('You already have Requested for Ride')</script>"; 
    echo "<script>window.location='Booked Ride'</script>"; 
}
?>