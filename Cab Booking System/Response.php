<div>
<table id="requestedrides" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Driver Name</th>
                <th>Vehicle</th>
                <th>Cost</th> 
                <th>Image</th>
                <th>Accept</th>
            </tr>
            
        </thead>
        <tbody>
            <?php include "viewingInterest.php"; 
            while($row=$result->fetch_array())
            {
                
            
            ?>
            <tr>
            <td><?php echo $row["DriverName"];?></td>
                <td><?php echo $row["VechicleCompany"]." ".$row["model"];?></td>
                <td><?php echo $row["Cost"];?></td>
                <td><img src="images/<?php echo $row["Image"];?>" alt="" width="100px"></td>
               
                <td><button id="btnintrestRide" name="<?php echo $row["interestID"];?>" onclick='booking(<?php echo $row["interestID"];?>)'>Accept Ride</button></td>
            </tr>
            <input type="text" value="<?php echo $row["RequestID"] ?>" id="REQUESTID" hidden>
            <?php }?>
        </tbody>
    </table>
        <script>
        $(document).ready(function(){
       
       $("#requestedrides").dataTable();
    //    $("button").click(function(){
    //        var x=document.getElementById("btnintrestRide").name;
    //        var xs=document.getElementById("REQUESTID").value;
    //        $.post("ajax_files/setBOOKEDRIDE.php",{interestid:x,requestid:xs},function(data){
    //            if(data=="true")
    //            {
    //              alert("ride booked successfully");
    //              window.location="booked ride mail.php";
    //            }   
    //        })    
    //    })
   })
   function booking(name)
   {
    var x=name;
           var xs=document.getElementById("REQUESTID").value;
           $.post("ajax_files/setBOOKEDRIDE.php",{interestid:x,requestid:xs},function(data){
               if(data=="true")
               {
                 alert("ride booked successfully");
                 window.location="booked ride mail.php";
               }   
           }) 
   }
    </script>
</div>