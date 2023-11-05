<?php
include "connection.php";
// session_start();

$passengerId = $_SESSION["id"];
$query = "SELECT rr.Request_id 
          FROM tbl_request_ride rr
          WHERE rr.passengerId = $passengerId";
$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
   
    $query = "SELECT rr.Request_id 
              FROM tbl_request_ride rr
              JOIN tbl_interest ti ON rr.Request_id = ti.RequestID
              WHERE rr.passengerId = $passengerId";
    $resultss = mysqli_query($conn, $query);

    if ($resultss->num_rows > 0) {
        
        $query = "SELECT rr.Request_id 
                  FROM tbl_request_ride rr
                  JOIN tbl_interest ti ON rr.Request_id = ti.RequestID
                  JOIN tbl_booked tb ON ti.interestID = tb.InterestID
                  WHERE rr.passengerId = $passengerId
                  AND tb.RideStatus NOT IN ('Ride Completed', 'Ride Completed')";
        $results = mysqli_query($conn, $query);

        if ($results->num_rows > 0) {
            echo "<script>alert('You already have requested rides.')</script>";
            echo "<script>window.location='booked Ride'</script>";
        } else {
            
        }
    } else {
        
        echo "<script>alert('You already have requested for a ride')</script>";
        echo "<script>window.location='booked Ride'</script>";
    }
} else {
 
}


?>
