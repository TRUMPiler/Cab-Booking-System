<?php 
include "../connection.php";
$_SESSION["booked_id"];
$transcation=date('Ymd').random_int(10000,99999);
$query="insert into tbl_payment(`Transactionid`, `BookedID`) values('$transcation',".$_SESSION["booked_id"].")";
$result=mysqli_query($conn,$query);
if($result>0)
{
    $query="update tbl_booked set RideStatus='Payment Done' where Booked_ID=".$_SESSION["booked_id"]."";
$results=mysqli_query($conn,$query);
if($results>0)
{
    echo "<script>window.location='index'</script>";
}
else
{
    echo "false";
}
}
else
{
    echo "false";
}

?>
