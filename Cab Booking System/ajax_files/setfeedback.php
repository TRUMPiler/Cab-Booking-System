<?php 
session_start();
include "../connection.php"; 
$query="insert into tbl_feedback(description) values('".$_POST["description"]."')";
$result=mysqli_query($conn,$query);
if($result)
{
    echo "true";
}
else
{
    echo "error occured";
}
?>