
<div>
    
    <div class="split left">
    <!-- <div class="centered"> -->
    <div id="map"></div>
    <script src="map1.js"></script>
    <!-- </div> -->
</div><br><br>
    <?php 
   while($row=$result->fetch_assoc())
   {
    echo '<div class="split right"><input type="text" id="address" class="form-control" value="'.$row["SourceAddress"].'" hidden>';
    echo '<input type="text" id="daddress" class="form-control" value="'.$row["DestinationAddress"].'" hidden>';
    echo '<input type="text" class="form-control" name="latitude" id="latitude" hidden>
    <h4>Source: '.$row["SourceAddress"].'</h4>
    <h4>Destination: '.$row["DestinationAddress"].'</h4><br>
    <input type="text" class="form-control" name="longitude" id="longitude" hidden>';
    echo '<input type="text" name="dlat" id="dlat" hidden>
    <input type="text" name="dlong" id="dlong" hidden>
    <h4 id="distance">Distance</h4>
    <h4 id="duration">Duration</h4>
    ';
    if($row["RideStatus"]=="Ride Ended")
    {
        echo '<button id="make payemnt" onclick="MakePayment('.$row["Booked_ID"].')">Make Payment</button>';
    }
    else if($row["RideStatus"]=="Payment Completed")
    {
        echo '<button id="Give Feedback">Give feedback</button>';
    }
    else
    {

    }
   }
    
    
    ?>    
</div>
<script> $(document).ready(function () {
            overloading();
        })
           function overloading(){
      
                  
      var address=document.querySelector("#address").value; 
      console.log(address);   
      const settingss = {
      async: true,
      crossDomain: true,
      url: 'https://trueway-geocoding.p.rapidapi.com/Geocode?address='+address+'&language=en',
      method: 'GET',
      headers: {
          'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
          'X-RapidAPI-Host': 'trueway-geocoding.p.rapidapi.com'
      }
  };
  
  $.ajax(settingss).done(function (response) {
  console.log(response);
    if(response.results[0].country=="India" && response.results[0].region!="Andaman and Nicobar Islands")
    {
        var lat=response.results[0].location.lat;
      var long=response.results[0].location.lng;
      console.log(lat);
      document.querySelector("#latitude").value=lat;
      document.querySelector("#longitude").value=long;
    }
    else
    {
        alert("please enter a place which is india");
    }
      
  });

  
  var daddress=document.querySelector("#daddress").value ; 
console.log(daddress);   
const settings = {

async: true,
crossDomain: true,
url: 'https://trueway-geocoding.p.rapidapi.com/Geocode?address='+daddress+'&language=en',
method: 'GET',
headers: {
'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
'X-RapidAPI-Host': 'trueway-geocoding.p.rapidapi.com'
}
};

$.ajax(settings).done(function (responses) {
    console.log(responses);
    if(responses.results[0].country=="India" && responses.results[0].region!="Andaman and Nicobar Islands")
    {
        var city=responses.results[0].locality;

        // var dropdown=document.getElementById("dcity");
        // for(var i=0;i<dropdown.options.length;i++)
        // {
        //     if(dropdown.options[i].text===city)
        //     {
        //         dropdown.options[i].selected=true;
        //         break;
        //     }
        // }
        var dlat=responses.results[0].location.lat;
        var dlong=responses.results[0].location.lng;
        // console.log(responses);
        document.querySelector("#dlat").value=dlat;
        document.querySelector("#dlong").value=dlong;
        overloadings();
    }
    else
    {
        alert("please enter a place which is india or can be travelled in mainland india");
    }
    
});
console.log("called map");

}

async function overloadings()
    {
        try
        {
            await new Promise(r=>setTimeout(r,2000));
            var lat=document.querySelector("#latitude").value;
        var long=document.querySelector("#longitude").value;
        var dlat=document.querySelector("#dlat").value;
        var dlong=document.querySelector("#dlong").value;
        GG(lat,long,dlat,dlong);
        }finally{
            calculate();
        }
        
    }
    function calculate()
    {
        
        const settings = {
	async: true,
	crossDomain: true,
	url: 'https://trueway-matrix.p.rapidapi.com/CalculateDrivingMatrix?origins='+document.querySelector("#latitude").value+'%2C'+document.querySelector("#longitude").value+'&destinations='+document.querySelector("#dlat").value+'%2C'+document.querySelector("#dlong").value+'',
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
		'X-RapidAPI-Host': 'trueway-matrix.p.rapidapi.com'
	}
};

$.ajax(settings).done(function (response) {
	console.log(response);
    var dis=response.distances[0];
    var dur=response.durations[0];
    $("#duration").html("Estimated Duration of the ride "+secondsToHms(dur));
    $("#distance").html("Estimated Distance of the ride "+dis/1000+"km");
    console.log("i was called");
});
    }
    function secondsToHms(d) {
    d = Number(d);
    var h = Math.floor(d / 3600);
    var m = Math.floor(d % 3600 / 60);
    var s = Math.floor(d % 3600 % 60);
    var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours, ") : "";
    var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes, ") : "";
    var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";
    return hDisplay + mDisplay + sDisplay; 
}

    function MakePayment(id)
    {
        $.post("ajax_files/makepayment.php",{booked_id:id},function(data){
            if(data=="true")
            {
                alert(data);
                window.location="MakePayment";
            }
        
        })
    }
     </script>