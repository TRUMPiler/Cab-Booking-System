<?php 

include "connection.php"; 
$query="select RequestID,driver.id from tbl_interest JOIN driver where tbl_interest.DriverID=".$_SESSION["id"]." and driver.id=tbl_interest.DriverID";
$result=mysqli_query($conn,$query);
if($result->num_rows>0)
{
    $_SESSION["rrveri"]=false;
}
else
{
    $_SESSION["rrveri"]=true;
}
?>