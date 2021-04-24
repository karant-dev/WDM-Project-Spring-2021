<?php

session_start();

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            Hospitals
        </title>
        <link rel="stylesheet" href="../styles/deleteThings.css">
        <link rel="stylesheet" href="../styles/socialmedia.css">
    </head>

    <body>
        <nav>
            <div class="topnav">
                <a href="/admindashboard">Home</a>
                <a href="https://immigrantportalblog.wordpress.com/">Blog</a>
                <a href="/contactus">Contact Us</a>
                <a href="/aboutus">About Us</a>
                <a href="chat.html">Chat</a>
                <a href="/logout" style="float: right;">Logout</a>
            </div>
        </nav>
        <table>
            <tr>
                <td>
                    <table class="userTable">
                        <thead>
                            <h2 style="padding: 10px">Registered Hospitals</h2>
                        </thead>
                        <tr>
                            <th>Name</th>
                            <th>Specialty</th>
                            <th>Zipcode</th>
                            <th>Action</th>
                        </tr>
                        @foreach($hospitalArr as $hospitals)
                        <tr>
                            <td>{{$hospitals->hospital_name}}</td>
                            <td>{{$hospitals->specialty}}</td>
                            <td>{{$hospitals->zipcode}}</td>
                            <td><a href="hospitaldelete/{{$hospitals->hospital_id}}">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        </table>
    </body>

    </html>
