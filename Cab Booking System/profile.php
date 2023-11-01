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
    background: rgb(255, 166, 0)
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
        font-size: 11px
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
                        <h4 class="text-right">Profile </h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><label class="labels">First Name:</label><input type="text" class="form-control" placeholder="First name" value=""></div>
                        <div class="col-md-4"><label class="labels">Middle Name:</label><input type="text" class="form-control" placeholder="Middle name" value=""></div>
                        <div class="col-md-4"><label class="labels">Last Name:</label><input type="text" class="form-control" value="" placeholder="Last name"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Contact Number</label><input type="text" class="form-control" placeholder="1234567890" value=""></div>
                        <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                        <!-- <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div> -->
                        <!-- <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div> -->
                        <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                        <!-- <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div> -->
                        <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>
                        <div class="col-md-12"><label class="labels">Profile</label><input type="text" class="form-control" placeholder="Passenger/Driver" value=""></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="India"></div>
                        <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Vehicle Details:</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    
</body>
</html>