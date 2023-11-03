<?php 
require('assets/mpdf/vendor/autoload.php');
include "../connection.php";
$query="SELECT `id`, `fname`, `mname`, `lname`, `password`, `dob`, `gender`, `contact`, `address`, tbl_city.City_Name, `email`, `image`, `account_creation` from `passenger` join tbl_city on tbl_city.CityID=passenger.CityGG where account_creation>=CURRENT_TIMESTAMP-1000000 and account_creation<=CURRENT_TIMESTAMP();";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0)
{
    $html="<h4>New Passengers Registered today</h4><br>";
    $html.="<table>";
    $html.='<thead>
    <tr>
    <th>id</th>
    <th>fname</th>
    <th>mname</th>
    <th>lname</th>
    <th>password</th>
    <th>dob</th>
    <th>gender</th>
    <th>contact</th>
    <th>address</th>
    <th>City</th>
    <th>email</th>
    <th>image</th>
    <th>account creation</th>
    </tr>
  </thead>
  <tbody>';
    while($row=$result->fetch_assoc())
    {
        $html.= '<tr>
        <td>'.$row["id"].'</td>
        <td>'.$row["fname"].'</td>
        <td>'.$row["mname"].'</td>
        <td>'.$row["lname"].'</td>
        <td>'.$row["password"].'</td>
        <td>'.$row["dob"].'</td>
        <td>'.$row["gender"].'</td>
        <td>'.$row["contact"].'</td>
        <td>'.$row["address"].'</td>
        <td>'.$row["City_Name"].'</td>
        <td>'.$row["email"].'</td>
        <td><img src="../Images/'.$row["image"].'" style="width:100px"></td>
        <td>'.$row["account_creation"].'</td>
        </tr>';
    }
    $html.= '</tbody>
</table>';

}
else
{
    $html.="<h4>no new passenger registered today</h4>";
    
}
$query="SELECT `id`, `fname`, `mname`, `lname`, `password`, `dob`, `gender`, `contact`, `address`, tbl_city.City_Name, `email`, `image`, `account_creation` from `driver` join tbl_city on tbl_city.CityID=driver.CityGG where account_creation>=CURRENT_TIMESTAMP-1000000 and account_creation<=CURRENT_TIMESTAMP();";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0)
{
    $html.="<h4>New Drivers Registered today</h4><br>";
    $html.="<table>";
    $html.='<thead>
    <tr>
    <th>id</th>
    <th>fname</th>
    <th>mname</th>
    <th>lname</th>
    <th>password</th>
    <th>dob</th>
    <th>gender</th>
    <th>contact</th>
    <th>address</th>
    <th>City</th>
    <th>email</th>
    <th>image</th>
    <th>account creation</th>
    </tr>
  </thead>
  <tbody>';
    while($row=$result->fetch_assoc())
    {
        $html.= '<tr>
        <td>'.$row["id"].'</td>
        <td>'.$row["fname"].'</td>
        <td>'.$row["mname"].'</td>
        <td>'.$row["lname"].'</td>
        <td>'.$row["password"].'</td>
        <td>'.$row["dob"].'</td>
        <td>'.$row["gender"].'</td>
        <td>'.$row["contact"].'</td>
        <td>'.$row["address"].'</td>
        <td>'.$row["City_Name"].'</td>
        <td>'.$row["email"].'</td>
        <td><img src="../Images/'.$row["image"].'" style="width:100px"></td>
        <td>'.$row["account_creation"].'</td>
        </tr>
        ';
        $html.= '</tbody>
</table>';
        $query="`id`, `company_name`, `model`, `vehicle-number`, `vehiclepermit`, `vehicleinsurance`, `driver_id` FROM `vehicle` WHERE driver_id=".$row["id"]."";
$results=mysqli_query($conn,$query);
if($results->num_rows > 0)
{
    $html.="<h4>New Drivers Registered today</h4><br>";
    $html.="<table>";
    $html.='<thead>
    <tr>
    <th>id</th>
    <th>company_name</th>
    <th>model</th>
    <th>vehiclepermiy</th>
    <th>vehicleinsurance</th>
    <th>driver_id</th>
    </tr>
  </thead>
  <tbody>';
    while($row=$result->fetch_assoc())
    {
        $html.= '<tr>
        <td>'.$row["id"].'</td>
        <td>'.$row["company_name"].'</td>
        <td>'.$row["model"].'</td>
        <td><img src="../Images/'.$row["vehiclepermit"].'" style="width:150px"></td>
        <td><img src="../Images/'.$row["vehicleinsurance"].'" style="width:150px"></td>
        </tr>';

    }
    $html.= '</tbody>
</table>';

}

    }
    

}
else
{
    $html.="<h4>no new Driver Registered today</h4>";
    
}
$query="Select `interestID`, `RequestID`, `DriverID`, `Cost`, `date_of_request` FROM `tbl_interest` WHERE date_of_request>=CURRENT_TIMESTAMP-1000000 and date_of_request<=CURRENT_TIMESTAMP();";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0)
{
    $html.="<h4>New interest Registered today</h4><br>";
    $html.="<table>";
    $html.='<thead>
    <tr>
    <th>Insterestid</th>
    <th>RequestID</th>
    <th>DriverID</th>
    <th>COST</th>
    <th>DateOFRequest</th>
    </tr>
  </thead>
  <tbody>';
    while($row=$result->fetch_assoc())
    {
        $html.= '<tr>
        <td>'.$row["interestID"].'</td>
        <td>'.$row["RequestID"].'</td>
        <td>'.$row["DriverID"].'</td>
        <td>'.$row["Cost"].'</td>
        <td>'.$row["date_of_request"].'</td>
        </tr>';
    }
    $html.= '</tbody>
</table>';

}
else
{
    $html.="<h4>no new interest registered today</h4>";
    
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file="Report".date("Y-m-d").'.pdf';
$mpdf->output($file,'D');
?>