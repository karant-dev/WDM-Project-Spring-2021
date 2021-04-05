<?php

session_start();

include_once 'dbconnect.php';

$f_name=$l_name=$email=$phone=$role=$username=$password=$addr=$state=$city=$country="";

//if submit button is clicked on registration page
if (isset($_POST['submit_button'])) {
    //Save all fields
    $firstname=$_POST['fname-field'];
    $lastname=$_POST['lname-field'];
    $email=$_POST['email-field'];
    $role=$_POST['role-radio'];
    $phone=$_POST['phone-field'];
    $username=$_POST['username-field'];
    $password=$_POST['password-field'];
    $addr=$_POST['addr-field'];
    $city=$_POST['city-field'];
    $state=$_POST['state-field'];
    $country=$_POST['country-field'];

    //query to check if email is already present
    $sqlemailcheck="SELECT * FROM Users WHERE email='$email'";
    $resultemail = mysqli_query($conn, $sqlemailcheck);
    $emailcount=mysqli_num_rows($resultemail);

    //query to check if username is already present
    $sqleunamecheck="SELECT * FROM Users WHERE username='$username'";
    $resultuname = mysqli_query($conn,$sqleunamecheck);
    $unamecount=mysqli_num_rows($resultuname);

    //perform insert if email or username does not exist already
    if($emailcount>0){
        echo "<script>alert('Email already present')</script>";
    }
    else if($unamecount>0){
        echo "<script>alert('Username already present')</script>";
    }
    else{
        $sqlinsert="INSERT INTO users (f_name, l_name, email, user_role, phone, username, user_password, address, city, home_state, country_id) VALUES ('$firstname','$lastname','$email','$role','$phone','$username','$password','$addr','$city','$state', (SELECT country_id FROM countries WHERE name='$country'))";
        if (mysqli_query($conn, $sqlinsert)) {
            echo "<script>alert('Registration was successful. Login Credentials are sent to $email.')</script>";
            //to send login credentials to the user
            $subject = "Login Credentials for Immigrants Portal";
            $body = "Hi, your Username is '".$username."' and password is '".$password."'.";
            $headers = "From: wdmprojectspring2021@gmail.com";
            if (mail($email, $subject, $body, $headers)) {
                echo "Email successfully sent to $email.";
                header('location:login.php');
            } 
            else {
                echo "Email sending failed...";
            }
            header('location:login.php')
        } 
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <link rel="stylesheet" type="text/css" href="../styles/signup.css">
    <link rel="stylesheet" type="text/css" href="../styles/socialmedia.css">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="../scripts/email.js"></script>
    <script src="../scripts/signup.js"></script>
</head>

<body>
    <nav>
        <div class="topnav">
            <a href="../index.html">Home</a>
            <a href="login.php">Login</a>
            <a href="signup.php">Signup</a>
            <a href="#our-partners">Our Partners</a>
            <a href="https://immigrantportalblog.wordpress.com/">Blog</a>
            <a href="contactus.html">Contact Us</a>
            <a href="aboutus.html">About Us</a>
        </div>
    </nav>
    <div class="signup-box">
        <img src="../resources/icons/material-login-icon.png" class="signup-icon">
        <h2>Signup</h2>
        <form id="signup-form" action="signup.php" method="POST" onsubmit="return validation();">
            <p>First name</p>
            <input type="text" id="fname" name="fname-field" placeholder="First name" maxlength="20" pattern="[A-Za-z]{1,20}" oninvalid="this.setCustomValidity( 'First name can only contain alphabets')" oninput="this.setCustomValidity(
                '')" required>
            <p>Last name</p>
            <input type="text" id="lname" name="lname-field" placeholder="Last name" maxlength="20" pattern="[A-Za-z]{1,20}" oninvalid="this.setCustomValidity( 'Last name can only contain alphabets')" oninput="this.setCustomValidity(
                '')" required>
            <br>
            <p>Username</p>
            <input type="text" id="uname" name="username-field" placeholder="Username" minlength="6" maxlength="10" name="Username" pattern="[a-zA-Z0-9]{6,10}" oninvalid="this.setCustomValidity(
                'Username can contain uppercase letter, lowercase letter or number and must be of 6-16 characters')" oninput="this.setCustomValidity( '')" required>
            &nbsp;&nbsp;<p>Password</p>
            <input type="password" id="pwd" name="password-field" placeholder="Password" minlength="8" maxlength="10" name="Password" pattern="[a-zA-Z0-9!@#$%^*()_+=]{8,10}" oninvalid="this.setCustomValidity(
                'Password can contain  uppercase letter, lowercase letter,special character(!@#$%^*()_+=) or number and must be of 8-10 characters')" oninput="this.setCustomValidity( '')" required>
            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <p>Email</p>
            <input type="text" id="email" name="email-field" placeholder="Email" maxlength="70" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" oninvalid="this.setCustomValidity(
                'Enter a valid email'" oninput="this.setCustomValidity( '')" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;<p>Phone</p>
            <input type="text" id="phone" name="phone-field" placeholder="Phone" minlength="7" maxlength="12" pattern="[0-9]{7,12}" oninvalid="this.setCustomValidity(
                'Phone can contain numbers of 7-12 digits')" oninput="this.setCustomValidity( '')" required>
            <br> &nbsp;&nbsp;
            <p>Address</p>
            <input type="text" id="addr" name="addr-field" placeholder="Address" maxlength="250" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;<p>City</p>
            <input type="text" id="city" name="city-field" placeholder="City" maxlength="50" pattern="[a-zA-Z]{1-50}" oninvalid="this.setCustomValidity(
                'City name can contain only letters')" oninput="this.setCustomValidity( '')" required>
            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <p>State</p>
            <input type="text" id="state" name="state-field" placeholder="State" maxlength="50" pattern="[a-zA-Z]{1-50}" oninvalid="this.setCustomValidity(
                'State name can contain only letters')" oninput="this.setCustomValidity( '')" required>&nbsp;&nbsp;&nbsp;
            &nbsp;<p>Country</p>
            <input type="text" id="country" name="country-field" placeholder="Country" maxlength="50" pattern="[a-zA-Z]{1-50}" oninvalid="this.setCustomValidity(
                'Country name can contain only letters')" oninput="this.setCustomValidity( '')" required>
            <br>
            <input type="radio" id="admin-radio" name="role-radio" value="admin"><label for="admin-radio">
            Admin</label><br>
            <input type="radio" id="immigrant-radio" name="role-radio" value="immigrant" checked><label for="immigrant-radio"> Immigrant</label><br>
            <input type="submit" id="submit-btn" name="submit_button" value="Signup"><br>
            <a href="login.html">Already have an account? Login.</a>
        </form>
    </div>
</body>

</html>
