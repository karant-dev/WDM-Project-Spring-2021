<?php

session_start();

include_once 'dbconnect.php';

$username=$school_name=$hosp_name="";

if (isset($_POST['submit-button-user'])) {
    $username=$_POST['immigrant-select'];
    $sqluserdelete="DELETE FROM Users WHERE username='$username'";
    $sqlprofiledelete="DELETE FROM Profiles WHERE user_id=(SELECT user_id from Users WHERE username='$username')";
    $resultvalidateuser = mysqli_query($conn,$sqluserdelete);
    $resultvalidateprofile = mysqli_query($conn,$sqlprofiledelete);
    echo "<script>alert('User deleted')</script>";
}

if (isset($_POST['submit-button-school'])) {
    $school_name=$_POST['school-select'];
    $sqlschooldelete="DELETE FROM Schools WHERE school_name='$school_name'";
    $resultvalidate = mysqli_query($conn,$sqlschooldelete);
    echo "<script>alert('School deleted')</script>";
}

if (isset($_POST['submit-button-hospital'])) {
    $hosp_name=$_POST['hospital-select'];
    echo "<script>alert(\"$hosp_name\")</script>";
    $sqlhospdelete="DELETE FROM Hospitals WHERE hospital_name='$hosp_name'";
    $resultvalidate = mysqli_query($conn,$sqlhospdelete);
    echo "<script>alert('Hospital deleted')</script>";
}

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            Delete entries
        </title>
        <link rel="stylesheet" href="../styles/deleteThings.css">
        <link rel="stylesheet" href="../styles/socialmedia.css">
    </head>

    <body>
        <nav>
            <div class="topnav">
                <a href="admindashboard.html">Home</a>
                <a href="https://immigrantportalblog.wordpress.com/">Blog</a>
                <a href="contactus.html">Contact Us</a>
                <a href="aboutus.html">About Us</a>
                <a href="chat.html">Chat</a>
                <a href="logout.php" style="float: right;">Logout</a>
            </div>
        </nav>
        <table>
            <tr>
                <td>
                    <form method="POST" action="deleteThings.php">
                        <!--<label id="f_name_label">First Name</label> &nbsp;&nbsp;
                        <label id="l_name_label">Last Name</label> &nbsp;&nbsp; -->
                        <select id="immigrant-select" name="immigrant-select">
                            <option value='demo'>Select User</option>
                            <?php
                                $sqlusercheck="SELECT username FROM Users";
                                $resultvalidate = mysqli_query($conn,$sqlusercheck);
                                $resultcount=mysqli_num_rows($resultvalidate);
                                while ($row = $resultvalidate->fetch_array(MYSQLI_NUM)) {
                                    echo "<option value='$row[0]'>$row[0]</option>";
                                }
                            ?>
                        </select>
                        <input type="submit" value="Submit" name="submit-button-user">
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form method="POST" action="deleteThings.php">
                        <select id="school-select" name="school-select">
                            <option value=''>Select School</option>
                            <?php
                                $sqlschoolcheck="SELECT school_name FROM Schools";
                                $resultvalidate = mysqli_query($conn,$sqlschoolcheck);
                                $resultcount=mysqli_num_rows($resultvalidate);
                                while ($row = $resultvalidate->fetch_array(MYSQLI_NUM)) {
                                    echo "<option value='$row[0]'>$row[0]</option>";
                                }
                            ?>
                        </select>
                        <input type="submit" value="Submit" name="submit-button-school">
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form method="POST" action="deleteThings.php">
                        <select id="hospital-select" name="hospital-select">
                            <option value=''>Select Hospital</option>
                            <?php
                                $sqlhospcheck="SELECT hospital_name FROM Hospitals";
                                $resultvalidate = mysqli_query($conn,$sqlhospcheck);
                                $resultcount=mysqli_num_rows($resultvalidate);
                                while ($row = $resultvalidate->fetch_array(MYSQLI_NUM)) {
                                    echo "<option value='$row[0]'>$row[0]</option>";
                                }
                            ?>
                        </select>
                        <input type="submit" value="Submit" name="submit-button-hospital">
                    </form>
                </td>
            </tr>
        </table>
        <script src="../scripts/scriptADM.js"></script>
    </body>

    </html>
