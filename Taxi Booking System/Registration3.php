<!DOCTYPE html>
<html>

<head>
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('Images/Background.jpg');
            /* Set the URL of your background image */
            background-size: cover;
            /* Cover the entire viewport with the image */
            background-repeat: no-repeat;
            /* Prevent image repetition */
            color: rgb(255, 174, 0);
            /* Set text color to white for better visibility */
        }

        .container {
            /* background: rgba(255, 255, 255, 0.8); */
            border-radius: 10px;
            padding: 40px;
        }

        .card {
            border-radius: 20px;
            /* Add curved borders to the card */
        }

        .custom-button {
            background: white;
            /* White background */
            color: rgb(255, 174, 0);
            /* Text color */
            border: 2px solid rgb(255, 174, 0);
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        /* Button hover effect using Bootstrap classes */
        .custom-button:hover {
            background: rgb(255, 174, 0);
            /* Background color on hover */
            color: white;
            /* Text color on hover */
        }

        .form-control:focus {
            border-color: rgb(255, 174, 0);
            /* Border color when focused */
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
                        <form id="registration-form" action="registration.php" method="post">
                            <!-- Personal Information -->
                            <section class="registration-section" id="personal-info-section">
                                <h2>Vehicle Information</h2>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="first_name">Company Name:</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" required placeholder="Enter Company Name">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="middle_name">Model:</label>
                                        <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Vehicle Model">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="last_name">Registration Number:</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" required placeholder="Enter your Vehicle Registration Number">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="last_name">Vehicle Insurance:</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" required placeholder="Enter your last name">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn custom-button" id="next-to-contact">Next</button>
                                </div>
                            </section>

                            <!-- Contact Information -->
                            <section class="registration-section" id="contact-info-section" style="display: none;">
                                <h2>Contact Information</h2>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="email">Email ID:</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_number">Contact number:</label>
                                        <input type="tel" class="form-control" id="contact_number" name="contact_number" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn custom-button" id="prev-to-personal">Previous</button>
                                    <button type="button" class="btn custom-button" id="next-to-security">Next</button>
                                </div>
                            </section>

                            <!-- Security Information -->
                            <section class="registration-section" id="security-info-section" style="display: none;">
                                <h2>Security Information</h2>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="password">Set Password:</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password:</label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn custom-button" id="prev-to-contact">Previous</button>
                                    <button type="submit" class="btn btn-success">Register</button>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const personalInfoSection = document.getElementById("personal-info-section");
        const contactInfoSection = document.getElementById("contact-info-section");
        const securityInfoSection = document.getElementById("security-info-section");
        const nextToContactBtn = document.getElementById("next-to-contact");
        const nextToSecurityBtn = document.getElementById("next-to-security");
        const prevToContactBtn = document.getElementById("prev-to-contact");
        const prevToPersonalBtn = document.getElementById("prev-to-personal");

        nextToContactBtn.addEventListener("click", () => {
            // Perform validation before moving to the next section
            if (validatePersonalInfo()) {
                personalInfoSection.style.display = "none";
                contactInfoSection.style.display = "block";
            }
        });

        nextToSecurityBtn.addEventListener("click", () => {
            // Perform validation before moving to the next section
            if (validateContactInfo()) {
                contactInfoSection.style.display = "none";
                securityInfoSection.style.display = "block";
            }
        });

        prevToContactBtn.addEventListener("click", () => {
            securityInfoSection.style.display = "none";
            contactInfoSection.style.display = "block";
        });

        prevToPersonalBtn.addEventListener("click", () => {
            contactInfoSection.style.display = "none";
            personalInfoSection.style.display = "block";
        });

        // Validation function for the Personal Information section
        function validatePersonalInfo() {
            const firstName = document.getElementById("first_name").value;
            const middleName = document.getElementById("middle_name").value;
            const lastName = document.getElementById("last_name").value;
            const gender = document.getElementById("gender").value;
            const dateOfBirth = document.getElementById("date_of_birth").value;
            const address = document.getElementById("address").value;
            const username = document.getElementById("profile_picture").value;

            // Check if any field is empty
            if (firstName === "" || middleName === "" || lastName === "" || gender === "" || dateOfBirth === "" || address === "" || username === "") {
                alert("Please fill in all the fields in the Personal Information section.");
                return false;
            }

            return true;
        }

        // Validation function for the Contact Information section
        function validateContactInfo() {
            const email = document.getElementById("email").value;
            const contactNumber = document.getElementById("contact_number").value;

            // Check if any field is empty
            if (email === "" || contactNumber === "") {
                alert("Please fill in all the fields in the Contact Information section.");
                return false;
            }

            return true;
        }
    </script>

</body>

</html>