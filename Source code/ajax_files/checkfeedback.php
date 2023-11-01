<?php 
session_start();
include "../connection.php"; 
$query="select * from feedback where booked_id=".$_POST["booked_id"]."";
$result=mysqli_query($conn,$query);
if($result->num_rows>0){
    echo "feedback exists";
    exit();
}
?>