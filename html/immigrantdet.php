<?php

session_start();

if($_SESSION['role'] != 'admin') {
    echo "<script>alert('Login as admin to access this page')</script>";
    header('location:login.php');
}

include_once 'dbconnect.php';

$firstname=$lastname=$email=$phone=$username=$password=$addr=$state=$city=$country="";

//if submit button is clicked on registration page
if (isset($_POST['submit-button'])) {
    //Save all fields
    $firstname=$_POST['first_name'];
    $lastname=$_POST['last_name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $addr=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];

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
        $sqlinsert="INSERT INTO Users (f_name, l_name, email, phone, username, user_password, address, city, home_state, country_id) VALUES ('$firstname','$lastname','$email','$phone','$username','$password','$addr','$city','$state', (SELECT country_id FROM Countries WHERE name='$country'))";
        if(mysqli_query($conn, $sqlinsert)) {
            echo "<script>alert('School added to $country')</script>";
            header('location:admindashboard.html');
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Add user
    </title>
    <link rel="stylesheet" href="../styles/deleteThings.css">
    <link rel="stylesheet" href="../styles/socialmedia.css">
</head>

<body><nav>
        <div class="topnav">
            <a href="admindashboard.html">Home</a>
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
                <form method="POST" action="immigrantdet.php" autocomplete="off">
                    <div>
                        <label>First Name</label>
                        <input autocomplete="off" type="text" name="first_name" id="First_name" maxlength="20" pattern="[A-Za-z]{1,20}" oninvalid="this.setCustomValidity( 'First name can only contain alphabets')" oninput="this.setCustomValidity(
                '')" required>
                    </div>
                    <div>
                        <label>Last Name</label>
                        <input autocomplete="off" type="text" name="last_name" id="Last_name" maxlength="20" pattern="[A-Za-z]{1,20}" oninvalid="this.setCustomValidity( 'Last name can only contain alphabets')" oninput="this.setCustomValidity(
                '')" required>
                    </div>
                    <div>
                        <label>Username</label>
                        <input autocomplete="off" type="text" name="username" id="Username" minlength="6" maxlength="10" name="Username" pattern="[a-zA-Z0-9]{6,10}" oninvalid="this.setCustomValidity(
                'Username can contain uppercase letter, lowercase letter or number and must be of 6-16 characters')" oninput="this.setCustomValidity( '')" required>
                    </div>
                    <div>
                        <label>Password</label>
                        <input autocomplete="off" type="password" name="password" id="Password" minlength="8" maxlength="10" name="Password" pattern="[a-zA-Z0-9!@#$%^*()_+=]{8,10}" oninvalid="this.setCustomValidity(
                'Password can contain  uppercase letter, lowercase letter,special character(!@#$%^*()_+=) or number and must be of 8-10 characters')" oninput="this.setCustomValidity( '')" required>
                    </div>
                    <div>
                        <label>Email</label>
                        <input autocomplete="off" type="text" name="email" id="Email" maxlength="70" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" oninvalid="this.setCustomValidity(
                'Enter a valid email'" oninput="this.setCustomValidity( '')" required>
                    </div>
                    <div>
                        <label>Phone</label>
                        <input autocomplete="off" type="text" name="phone" id="Phone" minlength="7" maxlength="12" pattern="[0-9]{7,12}" oninvalid="this.setCustomValidity(
                'Phone can contain numbers of 7-12 digits')" oninput="this.setCustomValidity( '')" required>
                    </div>
                    <div>
                        <label>Address</label>
                        <input autocomplete="off" type="text" name="address" id="Address" maxlength="250" required>
                    </div>
                    <div>
                        <label>City</label>
                        <input autocomplete="off" type="text" name="city" id="City" maxlength="50" pattern="[a-zA-Z]{1-50}" oninvalid="this.setCustomValidity(
                'City name can contain only letters')" oninput="this.setCustomValidity( '')" required>
                    </div>
                    <div>
                        <label>State</label>
                        <input autocomplete="off" type="text" name="state" id="State" maxlength="50" pattern="[a-zA-Z]{1-50}" oninvalid="this.setCustomValidity(
                'State name can contain only letters')" oninput="this.setCustomValidity( '')" required>
                    </div>
                    <div>
                        <label>Country</label>
                        <input autocomplete="off" type="text" name="country" id="Country" maxlength="50" pattern="[a-zA-Z]{1-50}" oninvalid="this.setCustomValidity(
                'Country name can contain only letters')" oninput="this.setCustomValidity( '')" required>
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
