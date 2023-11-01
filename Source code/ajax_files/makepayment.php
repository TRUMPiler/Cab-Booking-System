<?php 
include "../connection.php";
$query="update tbl_booked set RideStatus='Payment Done' where Booked_ID=".$_POST["booked_id"]."";
$result=mysqli_query($conn,$query);
if($result>0)
{
    echo "true";
}
else
{
    echo "false";
}
?>