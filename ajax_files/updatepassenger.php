<?php 

include "checkmail1.php";
if($_SESSION["emailver"]=="true")
{
    $query="update passenger set fname='".$_POST["fname"]."',mname='".$_POST["mname"]."',lname='".$_POST["lname"]."',contact=".$_POST["contact"].",address='".$_POST["address"]."',dob='".$_POST["dob"]."',gender='".$_POST["gender"]."',email='".$_POST["email"]."' where id=".$_SESSION["id"]."";
    $result=mysqli_query($conn,$query);
    if($result>0)
    {
        echo "true";
    }
    else
    {
        echo "false";
    }
}

?>