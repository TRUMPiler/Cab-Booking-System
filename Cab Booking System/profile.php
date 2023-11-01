<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="Images/Taxibooking.png" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            background: url('Images/Background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: rgb(255, 166, 0)
        }

        .profile-button {
            background: rgb(255, 166, 0);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: rgb(255, 166, 0)
        }

        .profile-button:focus {
            background: rgb(255, 166, 0);
            box-shadow: none
        }

        .profile-button:active {
            background: rgb(255, 166, 0);
            box-shadow: none
        }

        .back:hover {
            color: rgb(255, 166, 0);
            cursor: pointer
        }

        .labels {
            font-size: 12px;
            font-weight: bold;
        }

        .add-experience:hover {
            background: rgb(255, 166, 0);
            color: #fff;
            cursor: pointer;
            border: solid 1px rgb(255, 166, 0)
        }
    </style>
</head>

<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="Images/naishal.jpg"><span class="font-weight-bold">Naishal Doshi</span><span class="text-black-50">21bmiit100@gmail.com</span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Personal Details: </h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><label class="labels">First Name:</label><input type="text" class="form-control" name="fname" value=""></div>
                        <div class="col-md-4"><label class="labels">Middle Name:</label><input type="text" class="form-control" name="mname" value=""></div>
                        <div class="col-md-4"><label class="labels">Last Name:</label><input type="text" class="form-control" name="lname" value=""></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Contact Number</label><input type="text" class="form-control" name="contact" value=""></div>
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" name="address" value=""></div>
                        <div class="col-md-12"><label class="labels">Date of Birth</label><input type="text" class="form-control" name="state" value=""></div>
                        <div class="col-md-12"><label class="labels">Gender</label><input type="text" class="form-control" name="state" value=""></div>
                        <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="email" value=""></div>
                        <div class="col-md-12"><label class="labels">Password</label><input type="text" class="form-control" name="password" value=""></div>
                        <div class="col-md-12"><label class="labels">Profile</label><input type="text" class="form-control" name="role" placeholder="Passenger/Driver" value=""></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" name="country" placeholder="country" value="India"></div>
                        <div class="col-md-6"><label class="labels">State</label><input type="text" class="form-control" name="state" value=""></div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="text-center">
                                <button class="btn btn-primary profile-button" name="update" type="button">Home</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center">
                                <button class="btn btn-primary profile-button" name="update" type="button">Save Personal Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience">
                        <h4>Vehicle Details:</h4>
                    </div><br>
                    <div class="col-md-12"><label class="labels">Company:</label><input type="text" class="form-control" name="company" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Vehicle name:</label><input type="text" class="form-control" name="vname" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Vehicle Plate number:</label><input type="text" class="form-control" name="platenumber" value=""></div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="update" type="button">Save Vehicle Details</button></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</body>

</html>
