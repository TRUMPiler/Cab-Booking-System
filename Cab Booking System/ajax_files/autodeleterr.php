<?php 
include "C:/xampp/htdocs/Cab Booking System/connection.php";
$query="select requestCreation,Request_id from tbl_request_ride where requestCreation<= CURRENT_TIMESTAMP-1030000;";
$result=mysqli_query($conn,$query);
if($result->num_rows>0)
{
    while($row=$result->fetch_array())
    {
        $query="delete from tbl_interest where RequestID=".$row["Request_id"]."";
        $results=mysqli_query($conn,$query);
      
        $query="delete from tbl_request_ride where Request_id=".$row["Request_id"]."";
        $resultss=mysqli_query($conn,$query);
        
        break;
    }
}
?>