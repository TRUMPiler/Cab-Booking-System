<?php 
session_start();

include "ajax_files/checkrr.php";
include "connection.php";

$query = "SELECT * FROM `driver` WHERE id=".$_SESSION["id"]."";
$result = mysqli_query($conn, $query);

if ($result->num_rows > 0 && $_SESSION["rrveri"] == true) {
    while ($row = $result->fetch_array()) {
        // Fetch vehicle_id using driver.id
        $vehicleQuery = "SELECT id FROM vehicle WHERE driver_id=".$row["id"];
        $vehicleResult = mysqli_query($conn, $vehicleQuery);
        
        if ($vehicleResult->num_rows > 0) {
            $vehicleRow = $vehicleResult->fetch_assoc();
            
            // Insert into tbl_interest with the updated foreign key
            $query = "INSERT INTO tbl_interest(RequestID, vehicle_id, Cost, date_of_request) VALUES (".$_SESSION["RequestID"].", ".$vehicleRow["id"].", '".$_POST["cost_estimation"]."', CURRENT_TIMESTAMP)";
            $results = mysqli_query($conn, $query);
            
            
        } else {
            echo "false"; // Handle the case where the vehicle_id is not found
        }
    }
} else {
    echo "false";
}
echo true;    
?>

