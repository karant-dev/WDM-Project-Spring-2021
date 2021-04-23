<?php
session_start();

@include_once ('dbconnect');

// $username=$password="";

// if (isset($_GET['login-button'])) {
//     //receive all inputs from the form
//     $username=$_GET['username-field'];
//     $password=$_GET['password-field'];

//     echo "<script>alert('$username $password')</script>";

//     // check credentials
//     $sqlusercheck="SELECT * FROM Users WHERE username='$username' AND user_password='$password' limit 1";
//     $resultvalidate = mysqli_query($conn,$sqlusercheck);
//     $resultcount=mysqli_num_rows($resultvalidate);
//     echo "<script>alert('$resultcount')</script>";
//     if($resultcount==1){
//         //echo "<script>alert('Login successful')</script>";
//         $_SESSION['username']=$username;
//         //store query result to session
//         $sqldata=mysqli_fetch_assoc($resultvalidate);
//         (int) $_SESSION['id']=$sqldata["user_id"];
//         $_SESSION['firstname']=$sqldata["f_name"];
//         $_SESSION['lastname']=$sqldata["l_name"];
//         $_SESSION['role']=$sqldata["user_role"];
//         $email=$_SESSION['email']=$sqldata["email"];
//         $onboard=$_SESSION['onboarding']=$sqldata["onboarding"];
//         echo "<script>alert('$email')</script>";
//         if($onboard==0) {
//             redirect()->route('onboarding'); 
//             // $this->redirectTo = route('onboarding');
//             // header("{{url('onboarding')}}");
//         }
//         elseif($_SESSION['role']=='admin') {
//             redirect()->route('admindashboard');
//             // $this->redirectTo = route('admindashboard');
//             // header("{{url('admindashboard')}}");
//         }
//         elseif($_SESSION['role']=='superadmin') {
//             redirect()->route('superadmin');
//             // $this->redirectTo = route('superadmin');
//             // header("{{url('superadmin')}}");
//         }
//         elseif($_SESSION['role']=='immigrant') {
//             redirect()->route('immigrant');
//             // $this->redirectTo = route('immigrant');
//             // header("{{url('immigrants')}}");
//         }
//         else {
//             redirect()->route('login');
//             // $this->redirectTo = route('login');
//             // header("{{url('login')}}");
//         }
//     }
//     else if($resultcount==0){
//         echo "<script>alert('Invalid details. If you are new, sign up first.')</script>";
//     }
// }
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../styles/login.css">
    <link rel="stylesheet" type="text/css" href="../styles/socialmedia.css">
    <script src="../scripts/login.js"></script>
</head>

<body>
    <nav>
        <div class="topnav">
            <a href="{{url('index')}}">Home</a>
            <a href="{{url('login')}}">Login</a>
            <a href="{{url('signup')}}">Signup</a>
            <a href="#our-partners">Our Partners</a>
            <a href="https://immigrantportalblog.wordpress.com/">Blog</a>
            <a href="{{url('contactus')}}">Contact Us</a>
            <a href="{{url('aboutus')}}">About Us</a>
        </div>
    </nav>

    <div class="login-box">
        <img src="../resources/icons/material-login-icon.png" class="login-icon">
        <h2>Login</h2>
        <form method="POST" action="/login_user" onsubmit="return validate();">
            @csrf
            <p>Username</p>
            <input type="text" id="username" name="username-field" placeholder="Username" required>
            <p>Password</p>
            <input type="password" id="password" name="password-field" placeholder="Password" required>
            <!--<input type="radio" id="super-admin-radio" name="role-radio" value="super-admin"><label for="super-admin-radio"> Super Admin</label><br>
            <input type="radio" id="admin-radio" name="role-radio" value="admin"><label for="admin-radio"> Admin</label><br>
            <input type="radio" id="immigrant-radio" name="role-radio" value="immigrant" checked><label for="immigrant-radio"> Immigrant</label><br> -->
            <input type="submit" id="login-btn" name="login-button" value="Login"><br>
            <a href="#" id="forgot-password">Forgot password?</a><br>
            <a href="{{url('signup')}}" id="new-account">Don't have an account? Create one.</a>
        </form>
    </div>
</body>

</html>
