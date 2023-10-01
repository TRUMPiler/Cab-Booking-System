    <?php
    session_start();
    $veri="";
    if(isset($_SESSION["verified"]))
    {
        $veri=$_SESSION["verified"];
    }
    if(isset($_SESSION["email"]) and isset($_SESSION["fname"]))
    {
        if($veri==true)
        {
        header("location:index");
        } 
        else
        {
            // header("location:process.php");
        }
        
    } 
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="js/loader.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <title>Register</title>
        <style>
            body
            {
                background:url('images/back2.jpg');
                background-size: cover;
                color:white;
            }
            label{
                color: black;
                font: message-box;
                
            }
            img{
                height: 100px;
            
            }
            .form-control{
                width: 100%;
            
            }
            .forname{
                width: 50%;
            }
            .form-control:hover{
                border: 2px solid black;
            }
            .form-group{
                padding: 1px;
                margin-left: 20px;
                margin-right: 20px;
            }
            form{
                border-radius: 10px;
                background-color: white;
    /*            backdrop-filter: blur(1.5px);*/
    /*            background: transparent;*/
                margin-bottom: 20px;
                box-shadow: 0px 5px 10px 6px black;
            }
            .btnprev{
                border-radius: 10px;
                width: 25%;
                cursor: not-allowed;
                margin-bottom: 10px;
                
            }
            .btnnext{
                border-radius: 10px;
                width: 25%;
                float: right;
                margin-bottom: 10px;
            }
            .btnnextini{
                border-radius: 10px;
                width: 100%;
                margin-bottom: 10px;
                /*float: right;*/
                
            }
            #forpasswrd{
                width: 100%;
            }
            .rounded2l {
                border-radius: 25px 0px 0px 25px;
            }

            .rounded2r {
                border-radius: 0px 25px 25px 0px;
            }

            .rounded4 {
                border-radius: 25px;
            }

            input[type=file] {
                display: none;
                }
                .profile{
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    
                }
                .file-upload {
    /*                padding: 100px;*/
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    width: 25%;
                    border-radius: 25px;
                    border: 1px solid yellow;
                    color: yellow;
                    padding: 0.5rem;
                    cursor: pointer;
                    text-align: center;
                }
                    .error input {
                    border-color: red;
                    border-width: 2px;
                }

                .success input {
                    border-color: green;
                    border-width: 2px;
                }

                .error span {
                    color: red;
                    
                }

                .success span {
                    color: green;
                }

                span.error {
                    color: red;
                    border-radius: 2px solid red;
                }
                
                i {
                    font-weight: 900;
                    font-family: 'Font Awesome 5 Free';
                }

        </style>
    </head>
    <body>
    
        <div class="container-fluid">
    <!--    <img src="cab-removebg-preview.png" alt=""> -->
        <h1>Register: </h1><hr>
    
        <div class="contianer">
            <div class="row">
                <div class="mx-auto col-10 col-md-8 col-lg-7">
                    
                    <form enctype="multipart/form-data" id="myform">
                    <h3 style="color: black;height: 45px;text-align: center;background-color: yellow;margin: 0px;padding: 5px;border: none;border-radius: 10px 10px 0px 0px">Basic Info:</h3>
                    
                        <br>
                        <div id="message"></div>
                        <div class="form-group">
                            <img  class="profile" src="avatar.gif" alt="eeyah"><br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input cursor-pointer" id="attachment" name="file" required>
                            <label for="attachment" class="file-upload" class="custom-file-label cursor-pointer rounded4">
                            <span class="rounded2r">Add a photo*</span>
                            <span id="filename"></span>
                            </label>
                        </div>
                        </div>
                    <div class="form-group">
                        <label for="first_name">First name: </label><br>
                        <input type="text" name="fname" id="fname" class="form-control " placeholder="enter your first name" ><br>
                        <span class="error" id="fname_err"> </span>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last name: </label><br>
                        <input type="text" name="lname" id="lname" class="form-control " placeholder="enter your last name" ><br>
                        <span class="error" id="lname_err"> </span>
                    </div>
                    
            <div class="form-group">
                    <label for="Email">Email ID: </label><br>
                    <input type="email" class="form-control" name="email" id="email" placeholder="enter your Email" ><br>
                    <span class="error" id="email_err"> </span>    
            </div>
                    <div class="form-group">
                    <label for="Contact">Contact:</label><br>
                    <input type="tel" class="form-control" id="contact" name="contact" placeholder="enter your contact number" maxlength="10" ><br>
                    <span class="error" id="contact_err"> </span>        
                </div>
                <div class="form-group">
                    <label for="Age">Date Of Birth:</label><br>
                    <input type="date" class="form-control" name="dob" id="dob" maxlength="3" placeholder="0" required><br>
                    <span class="error" id="dob_err"> </span> 
                </div>
                <div class="form-group">
                    <label for="Gender">Gender:</label>
                    <label class="radio-inline"><input type="radio" name="gender" value="Male" checked> Male</label>
                    <label class="radio-inline"><input type="radio" name="gender" value="Female"> Female </label><br>
                </div>
                <div class="form-group">
                    <label for="Address">Address:</label><br>
                    <textarea name="address" class="form-control" id="address"  cols="30" rows="4" placeholder="enter your Address" required onchange="overloading()"></textarea><br>
                    <span class="error" id="address_err"> </span> 
                </div>
                <div class="form-group">
                    <label for="passwrd">Password: </label><br>
                    <!--<input type="password" name="password" id="password" class="form-control" placeholder="enter your password" required><br>-->
                    <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="error" id="password_err"> </span> 
                    </div>
                <div class="form-group">
                    <label for="conpasswrd">Confirm Password: </label><br>
                    <input type="password" name="confirmPass" id="cpassword" class="form-control" placeholder="re-enter your password" ><br>
                    <!--<input type="password" name="cpass" id="cpassword" class="form-control">-->
                            <!-- <h5 id="conpasscheck" style="color: red;">
                                **Password didn't match
                            </h5> -->
                            <span class="error" id="cpassword_err"> </span>
                </div>        
                <div>
                <label for="">Select City:</label><br><br>
               
               
               <?php 
                    $connect=mysqli_connect("localhost","root","","cms");
                    $sql = "SELECT CityID,City_Name FROM tbl_city where stateid=12";
                    $result = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($result)>0){
                        
                        echo '<select name="city" id="dcity" class="form-control">';
                        echo '<option value="">--Select Country--</option>';
                        $num_results = mysqli_num_rows($result);
                        for ($i = 0; $i < $num_results; $i++) {
                            $row = mysqli_fetch_array($result);
                            $name = $row['City_Name'];
                            echo "<option value=".$row["CityID"].">" . $name . "</option>";
                            //echo '<option value="' . $name . '">' . $name . '</option>';
                        }
                        echo '</select>';
                        
                    }
                    
                ?>
               </select><br><br>
                </div>
                        
        <div class="form-group">
                <!--<a href="#"><button type="submit" class="btn btn-success btnprev" name="submit">Previous</button></a>-->
                <!--<button type="submit" class="btn btn-success btnnextini" name="submit">Next</button>-->
                <a href="#"><button type="submit" class="btn btn-success btnnextini" name="submit" id="submitbtn" >Next</button></a>
        </div>    
                
                </div>
            </div>
        </div>  
                
                        
            
        </div>
        <script>
            $(document).ready(function()
            {
   
                $("#myform").submit(function(event)
                {   
                    event.preventDefault();
                    var formdata=new FormData(this);
                    $.ajax({
                        type:"POST",
                        url:"ajax_files/setdriver.php",
                        data:formdata,
                        contentType: false,
                        cache: false,
                        processData:false,
                        success:function(data){
                            if(data=="true")
                            {
                                window.location="register_vehicle";
                            }
                            else
                            {
                                window.location="emailerror.php";
                            }
                        },
                    }); 
                    
                });
            
            })
            function overloading(){
            var daddress=document.getElementById("address").value; 
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
            var city=responses.results[0].locality;
            console.log(city);
            var dropdown=document.getElementById("dcity");
            for(var i=0;i<dropdown.options.length;i++)
            {
                if(dropdown.options[i].text===city)
                {
                    dropdown.options[i].selected=true;
                    break;
                }
            }

            });
        }
           
            
        </script>
        </form>
        <script>
        AOS.init();
    </script>
    <script src="validation.js"></script>
    </body>
    </html>