<?php
session_start();
require_once "../connection.php";
if(isset($_POST["email"]))
{
    $query="select email from passenger where email='".$_POST["email"]."'";
    $ret=mysqli_query($conn,$query);
    if($ret->num_rows>0)
    {
        $_SESSION["emailver"]="false";
        echo "./emailerror.php";
        exit();
    }
    else
    {
        $query="select email from driver where email='".$_POST["email"]."' and contact=".$_POSt["contact"]."";
        $ret=mysqli_query($conn,$query);
        if($ret->num_rows>0)
        {
            $_SESSION["emailver"]=false;
            echo "./emailerror.php";
            exit();
        }
        else
        {
            $query="select email from admin where email='".$_POST["email"]."' and contact=".$_POST["contact"]."";
            $ret=mysqli_query($conn,$query);
            if($ret->num_rows>0)
            {
                $_SESSION["emailver"]=false;
                echo "./emailerror.php";                        
                exit();
            }
            else
            {
                $_SESSION["emailver"]=true;
            }
        }
    }
}
else
{
    echo "no data posted";
}


?>