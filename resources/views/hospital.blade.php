<?php

session_start();

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
            <a href="/admindashboard">Home</a>
            <a href="https://immigrantportalblog.wordpress.com/">Blog</a>
            <a href="/contactus">Contact Us</a>
            <a href="/aboutus">About Us</a>
            <a href="/logout" style="float: right;">Logout</a>
        </div>
    </nav>
    <table>
        <tr>
            <td>
                <form method="POST" action="/addhospital" autocomplete="off">
                @csrf
                    <div>
                        <label>Hospital_name*</label><label class="validation-error hide" id="fullNameValidationError"></label>
                        <input type="text" name="name-field" id="Hospital_name">
                    </div>
                    <div>
                        <label>Speciality</label>
                        <input type="text" name="specialty-field" id="Speciality">
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
