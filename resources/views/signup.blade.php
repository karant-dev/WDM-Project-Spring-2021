<?php

if(!isset($_SESSION)) { 
    session_start(); 
}

if(isset($_SESSION['alertMessage'])) { 
    $msg = $_SESSION['alertMessage'];
    echo "<script type='text/javascript'>alert('$msg');</script>";
    unset($_SESSION['alertMessage']);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <link rel="stylesheet" type="text/css" href="{{url('../styles/signup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('../styles/socialmedia.css')}}">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="{{url('../scripts/email.js')}}"></script>
    <script src="{{url('../scripts/signup.js')}}"></script>
</head>

<body>
    <nav>
        <div class="topnav">
            <a href="/">Home</a>
            <a href="/login">Login</a>
            <a href="/signup">Signup</a>
            <a href="https://immigrantportalblog.wordpress.com/">Blog</a>
            <a href="/contactus">Contact Us</a>
            <a href="/aboutus">About Us</a>
        </div>
    </nav>
    <div class="signup-box">
        <img src="../resources/icons/material-login-icon.png" class="signup-icon">
        <h2>Signup</h2>
        <form id="signup-form" action="/signup_user" method="POST" onsubmit="return validation();">
            @csrf
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
            <a href="/login">Already have an account? Login.</a>
        </form>
    </div>
</body>

</html>
