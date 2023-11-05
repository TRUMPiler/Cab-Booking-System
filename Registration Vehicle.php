<!DOCTYPE html>
<html>

<head>
    <title>Registration Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body {
            background-image: url('Images/Background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            color: rgb(255, 174, 0);
        }

        .container {
            border-radius: 10px;
            padding: 40px;
        }

        .card {
            border-radius: 20px;
        }

        .custom-button {
            background: white;
            color: rgb(255, 174, 0);
            border: 2px solid rgb(255, 174, 0);
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .custom-button:hover {
            background: rgb(255, 174, 0);
            color: white;
        }

        .form-control:focus {
            border-color: rgb(255, 174, 0);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header text-center">Register your vehicle</h1>
                    <div class="card-body">
                        <form enctype="multipart/form-data" id="myform">
                            <section class="registration-section" id="personal-info-section">
                                <h2>Vehicle Information</h2>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="company">Company Name:</label>
                                        <input type="text" class="form-control" id="company" name="company" required
                                            placeholder="Enter Company Name">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="model">Model:</label>
                                        <input type="text" class="form-control" id="model" name="model" placeholder="Enter Vehicle Model">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="vehiclenumber">Registration Number:</label>
                                        <input type="text" class="form-control" id="vehiclenumber" name="vehiclenumber" required
                                            placeholder="Enter your Vehicle Registration Number">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="vehiclepermit">Vehicle Permit:</label>
                                        <input type="file" class="form-control" id="vehiclepermit" name="vehiclepermit" placeholder="Upload Vehicle Permit" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="vehicleinsurance">Vehicle Insurance:</label>
                                        <input type="file" class="form-control" id="vehicleinsurance" name="vehicleinsurance" placeholder="Upload Vehicle Insurance" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-success">Register</button>
                                </div>
                            </section>
                            <script>
                                
                                    $(document).ready(function()
                                    {
                                        
                                        $("#myform").submit(function(event)
                                        {   
                                            event.preventDefault();
                                            var formdata=new FormData(this);
                                            $.ajax({
                                                type:"POST",
                                                url:"ajax_files/setvehicle.php",
                                                data:formdata,
                                                contentType: false,
                                                cache: false,
                                                processData:false,
                                                success:function(data){
                                                    if(data=="true")
                                                    {
                                                        window.location="otp.php";
                                                    }
                                                    else if(data=="vehicle exists")
                                                    {
                                                        alert("This vehicle seems to be registered on another driver\'s name \n please check your vehicle details");
                                                    }
                                                    else
                                                    {
                                                        alert(data);
                                                    }
                                                   
                                                },
                                            }); 
                                            
                                        });
                                    
                                    })
                                    </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>