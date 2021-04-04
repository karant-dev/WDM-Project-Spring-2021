<?php

session_start();

include_once 'dbconnect.php';

$bio=$interests=$skills=$dob=$work=$education="";

//if submit button is clicked on registration page
if (isset($_POST['proceed-button'])) {
    //Save all fields
    $bio=$_POST['bio-field'];
    $interests=$_POST['interests-field'];
    $skills=$_POST['skills-field'];
    $dob=$_POST['dob-field'];
    $work=$_POST['work-field'];
    $education=$_POST['education-field'];
    $id=$_SESSION['id'];
    $sqlinsert="INSERT INTO profiles (bio, interest, skills, work, education, user_id) VALUES ('$bio','$interests','$skills','$work','$education', $id)";
    $sqlupdate="UPDATE users SET onboarding = 1 WHERE user_id = $id";

    mysqli_query($conn, $sqlinsert);
    mysqli_query($conn, $sqlupdate);

    if($_SESSION['role']=='admin') {
        header('location:admindashboard.html');
    }
    elseif($_SESSION['role']=='superadmin') {
        header('location:superadmin.html');
    }
    elseif($_SESSION['role']=='immigrant') {
        header('location:immigrants.html');
    }
    else {
        header('location:login.php');
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Onboarding</title>
    <link rel="stylesheet" type="text/css" href="../styles/onboarding.css">
    <link rel="stylesheet" type="text/css" href="../styles/socialmedia.css">
    <script src="../scripts/onboarding.js"></script>
</head>

<body>
    <nav>
        <div class="topnav">
            <a href="../index.html">Home</a>
            <a href="#our-partners">Our Partners</a>
            <a href="#blog">Blog</a>
            <a href="#contact-us">Contact Us</a>
            <a href="#about-us">About Us</a>
            <a href="logout.php" style="float: right;">Logout</a>
        </div>
    </nav>
    <div class="onboarding-box">
        <img src="../resources/icons/material-login-icon.png" class="signup-icon">
        <h2>Tell us about yourself</h2>
        <form action="onboarding.php" method="POST">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <p>Bio</p>&nbsp;&nbsp;
            <input type="text" id="bio" name="bio-field" placeholder="Tell us about yourself"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <p>Interests</p>&nbsp;&nbsp;
            <input type="text" name="interests-field" placeholder="Interests">
            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <p>Skills</p>&nbsp;&nbsp;
            <input type="text" name="skills-field" placeholder="Skills"> &nbsp;&nbsp;&nbsp;
            <p>Birth date</p>&nbsp;&nbsp;&nbsp;
            <input type="text" name="dob-field" placeholder="Birth date">
            <br> &nbsp;&nbsp;&nbsp;&nbsp;
            <p>Work</p>&nbsp;&nbsp;&nbsp;
            <input type="text" name="work-field" placeholder="Work" value="NA"> &nbsp;&nbsp;&nbsp;
            <p>Education</p>&nbsp;&nbsp;
            <input type="text" name="education-field" placeholder="Education" value="NA">
            <br>
            <input type="submit" id="proceed-btn" name="proceed-button" value="Proceed"><br>
        </form>
    </div>
</body>

</html>
