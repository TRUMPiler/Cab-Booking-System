<?php
session_start();
require_once "connection.php";

        
        $tbname=$_SESSION["role"];
        
        if($tbname=="driver")
        {
            $fname=$_SESSION["fname"];
            $lname=$_SESSION["lname"];
            $mname=$_SESSION["mname"];
            $dob=$_SESSION["dob"];
            $gender=$_SESSION["gender"];
            $contact=$_SESSION["contact"];
            $address=$_SESSION["address"];
            $email=$_SESSION["email"];
            $city=(int)$_SESSION["city"];
            echo $city; 
            $password=$_SESSION["password"];
            $fileName=$_SESSION["filename"];
            $query="insert into $tbname(`fname`, `lname`, `mname` ,`dob`, `gender`, `contact`, `address`, `email`,`password`,`image`,`CityGG`) values('$fname','$lname','$mname','$dob','$gender',$contact,'$address','$email','$password','$fileName',$city)";
            $ret=mysqli_query($conn,$query);
            if($ret>0)
            {
                $company=$_SESSION["company"];
                $vehiclemodel=$_SESSION["model"];  
                $vehiclenumber=$_SESSION["vehiclenumber"];
                $vehiclepermit=$_SESSION["vehiclepermit"];
                $vehicleinsurance=$_SESSION["vehicleinsurance"];

                $sql = "select id from driver where email='$email' and fname='$fname' LIMIT 1";
                $result=0;
                    if ($result = $conn -> query($sql)) 
                    {
                        while ($row = $result -> fetch_row()) {
                            $sql="INSERT INTO `vehicle`(`company_name`, `model`, `vehicle-number`, `vehiclepermit`, `vehicleinsurance`, `driver_id`) VALUES ('$company','$vehiclemodel','$vehiclenumber','$vehiclepermit','$vehicleinsurance',".$row[0].")";
                        }
                    }
                    else
                    {
                        echo "<script>alert('information of vehicle could\'nt be recorded please register again')</script>";
                        echo "<script>window.location='Register Vehicle.php'</script>";
                    }
                    mysqli_query($conn,$sql);
                    if($result>0)
                    {
                        $_SESSION["verified"]=true;
                        echo "<script>window.location='index_driver.php'</script>";
                    }
                    else
                    {
                        $_SESSION["verified"]=false;
                    }
            }   
               
        }
        else
        {
             $fname=$_SESSION["fname"];
             $mname=$_SESSION["mname"];
            $lname=$_SESSION["lname"];
            $dob=$_SESSION["dob"];
            $gender=$_SESSION["gender"];
            $contact=$_SESSION["contact"];
            $address=$_SESSION["address"];
            $email=$_SESSION["email"];
            $password=$_SESSION["password"];
            $city=$_SESSION["city"];
            $fileName=$_SESSION["filename"];
            $query="insert into $tbname(`fname`, `lname`, `mname` ,`dob`, `gender`, `contact`, `address`, `email`,`password`,`image`,`CityGG`) values('$fname','$lname','$mname','$dob','$gender',$contact,'$address','$email','$password','$fileName',$city)";
            $ret=mysqli_query($conn,$query);
            if($ret>0)
            {
                $_SESSION["verified"]=true;
            }
            else
            {
                $_SESSION["verified"]=false;
            }
        }
        if(mysqli_error($conn)=="")
        {
            
            header("location:index")   ;
        }
        else
        {
            header("location:error");
        }
?>
