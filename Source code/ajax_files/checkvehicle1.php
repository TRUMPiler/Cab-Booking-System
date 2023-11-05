<?php
session_start();
include "../connection.php"; 
$query="select * from vehicle where `vehicle-number`='".$_POST["platenumber"]."' and not `vehicle-number`='".$_POST["platenumber"]."'";
$result=mysqli_query($conn,$query);
if($result->num_rows>0){
    echo "vehicle exists";
    exit();
}
?>