<?php

session_start();

if($_SESSION['role'] != 'admin') {
    echo "<script>alert('Login as admin to access this page')</script>";
    header('location:login.php');
}

include_once 'dbconnect.php';

$hospital_name=$specialty=$email=$phone=$addr=$zip=$country="";

//if submit button is clicked on registration page
if (isset($_POST['submit-button'])) {
    //Save all fields
    $hospital_name=$_POST['school_name'];
    $specialty=$_POST['max_study_level'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $addr=$_POST['address'];
    $zip=$_POST['zipcode'];
    $country=$_POST['country'];

    $sqlinsert="INSERT INTO Hospitals (hospital_name, specialty, email, phone, address, zipcode, country_id) VALUES ('$hospital_name','$specialty','$email','$phone','$addr','$zip', (SELECT country_id FROM Countries WHERE name='$country'))";
    if(mysqli_query($conn, $sqlinsert)) {
        echo "<script>alert('Hospital added to $country')</script>";
        header('location:admindashboard.html');
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Add hospital
    </title>
    <link rel="stylesheet" href="../styles/stylesSadm.css">
    <link rel="stylesheet" href="../styles/socialmedia.css">
    <link rel="stylesheet" href="../styles/deleteThings.css">
</head>

<body>
    <nav>
        <div class="topnav">
            <a href="admindashboard.html">Home</a>
            <a href="login.php">Login</a>
            <a href="signup.php">Signup</a>
            <a href="#our-partners">Our Partners</a>
            <a href="https://immigrantportalblog.wordpress.com/">Blog</a>
            <a href="contactus.html">Contact Us</a>
            <a href="aboutus.html">About Us</a>
            <a href="logout.php" style="float: right;">Logout</a>
        </div>
    </nav>
    <table>
        <tr>
            <td>
                <form method="POST" action="hospital.php" autocomplete="off">
                    <div>
                        <label>Hospital_name*</label><label class="validation-error hide" id="fullNameValidationError"></label>
                        <input type="text" name="hospital_name" id="Hospital_name">
                    </div>
                    <div>
                        <label>Speciality</label>
                        <input type="text" name="speciality" id="Speciality">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="text" name="email" id="Email">
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="text" name="phone" id="Phone">
                    </div>

                    <div>
                        <label>Address</label>
                        <input type="text" name="address" id="Address">
                    </div>
                    <div>
                        <label>Zipcode</label>
                        <input type="text" name="zipcode" id="Zipcode">
                    </div>
                    <div>
                        <label>Country</label>
                        <input type="text" name="country" id="Country">
                    </div>
                    <div  class="form-action-buttons">
                        <input name="submit-button" type="submit" value="Submit">
                    </div>
                </form>
            </td>
        </tr>
    </table>

</body>

</html>
