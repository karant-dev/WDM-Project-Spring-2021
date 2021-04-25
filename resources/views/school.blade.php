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
        Add school
    </title>
    <link rel="stylesheet" href="../styles/deleteThings.css">
    <link rel="stylesheet" href="../styles/socialmedia.css">
</head>

<body>
    <nav>
        <div class="topnav">
            <a href="<?php switch($_SESSION['role']){ case 'admin':echo '/admindashboard';break; case 'superadmin': echo '/superadmin';break; case 'immigrant': echo '/immigrants'; break; case 'visitor': echo '/visitors'; break;}?>">Home</a>
            <a href="https://immigrantportalblog.wordpress.com/">Blog</a>
            <a href="https://chat-application-75cf2.web.app/">Chat</a>
            <a href="/contactus">Contact Us</a>
            <a href="/aboutus">About Us</a>
            <a href="/logout" style="float: right;">Logout</a>
        </div>
    </nav>
    <table>
        <tr>
            <td>
                <form method="POST" action="/addschool" autocomplete="off">
                @csrf
                    <div>
                        <label>School_name*</label><label class="validation-error hide" id="fullNameValidationError"></label>
                        <input type="text" name="name-field" id="School_name">
                    </div>
                    <div>
                        <label>Max_study_level</label>
                        <input type="text" name="study-field" id="Max_study_level">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="text" name="email-field" id="Email">
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="text" name="phone-field" id="Phone">
                    </div>

                    <div>
                        <label>Address</label>
                        <input type="text" name="addr-field" id="Address">
                    </div>
                    <div>
                        <label>Zipcode</label>
                        <input type="text" name="zipcode-field" id="Zipcode">
                    </div>
                    <div>
                        <label>Country</label>
                        <input type="text" name="country-field" id="Country">
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
