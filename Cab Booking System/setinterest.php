<?php 
session_start();

include "ajax_files/checkrr.php";
include "connection.php";
$query="SELECT * FROM `driver`where id=".$_SESSION["id"]."";
include "connection.php";
$result=mysqli_query($conn,$query);
if($result->num_rows>0 && $_SESSION["rrveri"]==true)
{
    while($row=$result->fetch_array())
    {
        $query="insert into tbl_interest(RequestID,DriverID,Cost,date_of_request) values(".$_SESSION["RequestID"].",".$row["id"].",'".$_POST["cost_estimation"]."',CURRENT_TIMESTAMP)";
        $results=mysqli_query($conn,$query);
        echo "true";
    }
}
else
{
  
    echo "false";
}
?>
