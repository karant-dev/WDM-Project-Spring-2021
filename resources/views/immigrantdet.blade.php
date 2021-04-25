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
    <title>
        Add user
    </title>
    <link rel="stylesheet" href="../styles/deleteThings.css">
    <link rel="stylesheet" href="../styles/socialmedia.css">
</head>

<body>
    <nav>
        <div class="topnav">
            <a href="<?php switch($_SESSION['role']){ case 'admin':echo '/admindashboard';break; case 'superadmin': echo '/superadmin';break; case 'immigrant': echo '/immigrants'; break; case 'visitor': echo '/visitors'; break;}?>">Home</a>
            <a href="#our-partners">Our Partners</a>
            <a href="https://immigrantportalblog.wordpress.com/">Blog</a>
            <a href="https://chat-application-75cf2.web.app/">Chat</a>
            <a href="/contactus">Contact Us</a>
            <a href="/aboutus">About Us</a>
            <a href="/logout" style="float: right;">Logout</a>
        </div>
    </nav>
    <table style= "width:40%;">
        <tr>
            <td>
                <form method="POST" action="/adduser" autocomplete="off">
                @csrf
                    <div>
                        <label>First Name</label>
                        <input autocomplete="off" type="text" name="fname-field" id="First_name" maxlength="20" pattern="[A-Za-z]{1,20}" oninvalid="this.setCustomValidity( 'First name can only contain alphabets')" oninput="this.setCustomValidity(
                '')" required>
                        <label>Last Name</label>
                        <input autocomplete="off" type="text" name="lname-field" id="Last_name" maxlength="20" pattern="[A-Za-z]{1,20}" oninvalid="this.setCustomValidity( 'Last name can only contain alphabets')" oninput="this.setCustomValidity(
                '')" required>
                    </div>
                    <div>
                        <label>Username</label>
                        <input autocomplete="off" type="text" name="username-field" id="Username" minlength="6" maxlength="10" name="Username" pattern="[a-zA-Z0-9]{6,10}" oninvalid="this.setCustomValidity(
                'Username can contain uppercase letter, lowercase letter or number and must be of 6-16 characters')" oninput="this.setCustomValidity( '')" required>
                        <br>
                        <label>Password</label> <br>
                        <input style="width: 100% padding: 10px 15px; margin: 6px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" autocomplete="off" type="password" name="password-field" id="Password" minlength="8" maxlength="10" name="Password" pattern="[a-zA-Z0-9!@#$%^*()_+=]{8,10}" oninvalid="this.setCustomValidity(
                'Password can contain  uppercase letter, lowercase letter,special character(!@#$%^*()_+=) or number and must be of 8-10 characters')" oninput="this.setCustomValidity( '')" required>
                    </div>
                    <div>
                        <label>Email</label>
                        <input autocomplete="off" type="text" name="email-field" id="Email" maxlength="70" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" oninvalid="this.setCustomValidity(
                'Enter a valid email'" oninput="this.setCustomValidity( '')" required>
                        <label>Phone</label>
                        <input autocomplete="off" type="text" name="phone-field" id="Phone" minlength="7" maxlength="12" pattern="[0-9]{7,12}" oninvalid="this.setCustomValidity(
                'Phone can contain numbers of 7-12 digits')" oninput="this.setCustomValidity( '')" required>
                    </div>
                    <div>
                        <label>Address</label>
                        <input autocomplete="off" type="text" name="addr-field" id="Address" maxlength="250" required>
                    </div>
                    <div>
                        <label>City</label>
                        <input autocomplete="off" type="text" name="city-field" id="City" maxlength="50" pattern="[a-zA-Z]{1-50}" oninvalid="this.setCustomValidity(
                'City name can contain only letters')" oninput="this.setCustomValidity( '')" required>
                    
                        <label>State</label>
                        <input autocomplete="off" type="text" name="state-field" id="State" maxlength="50" pattern="[a-zA-Z]{1-50}" oninvalid="this.setCustomValidity(
                'State name can contain only letters')" oninput="this.setCustomValidity( '')" required>
                    </div>
                    <div>
                        <label>Country</label>
                        <input autocomplete="off" type="text" name="country-field" id="Country" maxlength="50" pattern="[a-zA-Z]{1-50}" oninvalid="this.setCustomValidity(
                'Country name can contain only letters')" oninput="this.setCustomValidity( '')" required>
                    </div>
                    <div>
                        <input type="radio" id="visitor-radio" name="role-radio" value="immigrant"><label for="visitor-radio">
            Visitor</label><br>
            <input type="radio" id="immigrant-radio" name="role-radio" value="immigrant" checked><label for="immigrant-radio"> Immigrant</label>
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
