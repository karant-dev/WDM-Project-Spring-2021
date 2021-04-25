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
            Schools
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
                    <table class="userTable">
                        <thead>
                            <h2 style="padding: 10px">Registered Schools</h2>
                        </thead>
                        <tr>
                            <th>Name</th>
                            <th>Max Study Level</th>
                            <th>Zipcode</th>
                            <th>Action</th>
                        </tr>
                        @foreach($schoolArr as $schools)
                        <tr>
                            <td>{{$schools->school_name}}</td>
                            <td>{{$schools->max_study_level}}</td>
                            <td>{{$schools->zipcode}}</td>
                            <td><a href="schoooldelete/{{$schools->school_id}}">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        </table>
    </body>

    </html>
