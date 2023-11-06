<?php 

require('assets/mpdf/vendor/autoload.php');
include "../connection.php";
$query="SELECT `id`, `fname`, `mname`, `lname`, `password`, `dob`, `gender`, `contact`, `address`, tbl_city.City_Name, `email`, `image`, `account_creation` from `passenger` join tbl_city on tbl_city.CityID=passenger.CityGG where account_creation>=CURRENT_TIMESTAMP-1000000 and account_creation<=CURRENT_TIMESTAMP();";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0)
{
    $html="<h4>New Passengers Registered today</h4><br>";
    $html.="<table style='border: 2px solid black'>";
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
    $html="<h4>no new passenger registered today</h4>";
    
}
$query="SELECT `id`, `fname`, `mname`, `lname`, `password`, `dob`, `gender`, `contact`, `address`, tbl_city.City_Name, `email`, `image`, `account_creation` from `driver` join tbl_city on tbl_city.CityID=driver.CityGG where account_creation>=CURRENT_TIMESTAMP-1000000 and account_creation<=CURRENT_TIMESTAMP();";
$driverResult = mysqli_query($conn, $query);

if ($driverResult->num_rows > 0) {
    // Store driver IDs in an array
    $driverIds = [];
    
    // Generate HTML for displaying driver details
    $html = "<h4>New Drivers Registered in the Last 24 Hours</h4><br>";
    $html .= "<table>";
    $html .= '<thead>
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

    while ($driverRow = $driverResult->fetch_assoc()) {
        // Store driver IDs in the array
        $driverIds[] = $driverRow["id"];

        // Generate HTML rows for driver details
        $html .= '<tr>
            <td>' . $driverRow["id"] . '</td>
            <td>' . $driverRow["fname"] . '</td>
            <td>' . $driverRow["mname"] . '</td>
            <td>' . $driverRow["lname"] . '</td>
            <td>' . $driverRow["password"] . '</td>
            <td>' . $driverRow["dob"] . '</td>
            <td>' . $driverRow["gender"] . '</td>
            <td>' . $driverRow["contact"] . '</td>
            <td>' . $driverRow["address"] . '</td>
            <td>' . $driverRow["City_Name"] . '</td>
            <td>' . $driverRow["email"] . '</td>
            <td><img src="../Images/' . $driverRow["image"] . '" style="width:100px"></td>
            <td>' . $driverRow["account_creation"] . '</td>
        </tr>';
    }

    $html .= '</tbody>
    </table>';

    // Display vehicle information for each driver
    foreach ($driverIds as $driverId) {
        $vehicleQuery = "SELECT `id`, `company_name`, `model`, `vehicle-number`, `vehiclepermit`, `vehicleinsurance`, `driver_id`
                         FROM `vehicle`
                         WHERE driver_id = $driverId;";

        $vehicleResult = mysqli_query($conn, $vehicleQuery);

        if ($vehicleResult->num_rows > 0) {
            // Generate HTML for displaying vehicle details
            $html .= "<h4>Vehicle Information for Driver ID $driverId</h4><br>";
            $html .= "<table>";
            $html .= '<thead>
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

            while ($vehicleRow = $vehicleResult->fetch_assoc()) {
                // Generate HTML rows for vehicle details
                $html .= '<tr>
                    <td>' . $vehicleRow["id"] . '</td>
                    <td>' . $vehicleRow["company_name"] . '</td>
                    <td>' . $vehicleRow["model"] . '</td>
                    <td><img src="../Images/' . $vehicleRow["vehiclepermit"] . '" style="width:150px"></td>
                    <td><img src="../Images/' . $vehicleRow["vehicleinsurance"] . '" style="width:150px"></td>
                    <td>' . $vehicleRow["driver_id"] . '</td>
                </tr>';
            }

            $html .= '</tbody>
            </table>';
        }
    }
} else {
    $html = "<h4>No new Driver Registered in the Last 24 Hours</h4>";
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
$query="SELECT `Booked_ID`, `InterestID`, `RideStatus` FROM `tbl_booked`";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0)
{
    $html.="<h4>ALL Booked Ride updates</h4><br>";
    $html.="<table>";
    $html.='<thead>
    <tr>
    <th>Booked_id</th>
    <th>InterestID</th>
    <th>Ride Status</th>
    </tr>
  </thead>
  <tbody>';
    while($row=$result->fetch_assoc())
    {
        $html.= '<tr>
        <td>'.$row["Booked_ID"].'</td>
        <td>'.$row["InterestID"].'</td>
        <td>'.$row["RideStatus"].'</td>
        </tr>';
    }
    $html.= '</tbody>
</table>';

}
else
{
    $html.="<h4>no Booked Rides</h4>";
    
}
$query="SELECT `feedbackid`, `date-of-feedback`, `description`, `booked_id` FROM `tbl_feedback` WHERE `date-of-feedback`>=CURRENT_TIMESTAMP-1000000 and `date-of-feedback`<=CURRENT_TIMESTAMP();";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0)
{
    $html.="<h4>Feedbacks Given Today</h4><br>";
    $html.="<table>";
    $html.='<thead>
    <tr>
    <th>Feeback id</th>
    <th>Feedback Given</th>
    <th>Booked ID</th>
    </tr>
  </thead>
  <tbody>';
    while($row=$result->fetch_assoc())
    {
        $html.= '<tr>
        <td>'.$row["feedbackid"].'</td>
        <td>'.$row["feedbackid"].'</td>
        <td>'.$row["description"].'</td>
        <td>'.$row["booked_id"].'</td>
        </tr>';
    }
    $html.= '</tbody>
</table>';

}
else
{
    $html.="<h4>no Feedback given yet</h4>";
    
}

// echo $html;
$query="SELECT `Payment_ID`, `Transactionid`, `BookedID`, `date` FROM `tbl_payment` WHERE `date`>=CURRENT_TIMESTAMP-1000000 and `date`<=CURRENT_TIMESTAMP();";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0)
{
    $html.="<h4>Feedbacks Given Today</h4><br>";
    $html.="<table>";
    $html.='<thead>
    <tr>
    <th>Payment ID</th>
    <th>Transcation ID</th>
    <th>date of transcation</th>
    </tr>
  </thead>
  <tbody>';
    while($row=$result->fetch_assoc())
    {
        $html.= '<tr>
        <td>'.$row["Payment_ID"].'</td>
        <td>'.$row["Transactionid"].'</td>
        <td>'.$row["BookedID"].'</td>
        <td>'.$row["date"].'</td>
        </tr>';
    }
    $html.= '</tbody>
</table>';

}
else
{
    $html.="<h4>no payment done</h4>";
    
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file="Report".date("Y-m-d").'.pdf';
$mpdf->output($file,'D');
?>
