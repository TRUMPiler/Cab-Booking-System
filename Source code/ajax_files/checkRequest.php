<?php 
include "connection.php";
// session_start();
$query="select tbl_request_ride.Request_id from tbl_request_ride where tbl_request_ride.passengerId=".$_SESSION["id"]."";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0)
{
    echo "1";
    // $query="select tbl_request_ride.Request_id from tbl_request_ride JOIN tbl_interest on NOT tbl_interest.RequestID=tbl_request_ride.Request_id where tbl_request_ride.passengerId=".$_SESSION["id"]."";
    // $resultk=mysqli_query($conn,$query);
    // if($resultk->num_rows > 0)
    // {
    //     echo "<script>alert('You already have Requested for Ride')</script>"; 
    //         echo "<script>window.location='Booked Ride'</script>";
    //         exit();
    // }
    $query="select tbl_request_ride.Request_id from tbl_request_ride JOIN tbl_interest where tbl_request_ride.passengerId=".$_SESSION["id"]." and tbl_interest.RequestID=tbl_request_ride.Request_id;";
    $resultss=mysqli_query($conn,$query);
    
    if($resultss->num_rows>  0)
    {   
        echo "2";
        $query="select tbl_request_ride.Request_id from tbl_request_ride JOIN tbl_interest on tbl_interest.RequestID=tbl_request_ride.Request_id JOIN tbl_booked on Not (tbl_booked.InterestID=tbl_interest.interestID) or (tbl_booked.InterestID=tbl_interest.interestID and NOT tbl_booked.RideStatus in ('Ride Completed','Ride Completed')) WHERE tbl_request_ride.passengerId=".$_SESSION["id"].";";
        $results=mysqli_query($conn,$query);
        if($results->num_rows >0)
        { 
          
            echo "<script>alert('You already have Requested for Ride')</script>"; 
            echo "<script>window.location='Booked Ride'</script>";    
        }
        else
        {
           
        }
    }
    else
    {
            echo "0";
        echo "<script>alert('You already have Requested for Ride')</script>"; 
        echo "<script>window.location='Booked Ride'</script>"; 
    }
   

}
else
{
   
}
?>