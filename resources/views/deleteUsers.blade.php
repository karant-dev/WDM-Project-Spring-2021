<?php

session_start();

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            Delete Users
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
                            <h2 style="padding: 10px">Active Users</h2>
                        </thead>
                        <tr>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Action</th>
                        </tr>
                        @foreach($userArr as $users)
                        <tr>
                            <td>{{$users->username}}</td>
                            <td>{{$users->f_name}}</td>
                            <td>{{$users->l_name}}</td>
                            <td><a href="userdelete/{{$users->user_id}}">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        </table>
    </body>

    </html>
