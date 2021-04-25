<?php

if(!isset($_SESSION)) { 
    session_start(); 
}

if(isset($_SESSION['alertMessage'])) {
    $msg = $_SESSION['alertMessage'];
    echo "<script type='text/javascript'>alert('$msg');</script>";
    unset($_SESSION['alertMessage']);
}

$servername = "localhost";
$username = "root";
$password = "pwdpwd";
$database = "immigrantsportal";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tips</title>
    <link rel="stylesheet" type="text/css" href="../styles/tips.css">
    <link rel="stylesheet" type="text/css" href="../styles/socialmedia.css">
</head>

<body>
    <nav>
        <div class="topnav">
            <a href="<?php switch($_SESSION['role']){ case 'admin':echo 'admindashboard.html';break; case 'superadmin': echo 'superadmin.html';break; case 'immigrant': echo 'immigrants.html'; break; case 'visitor': echo 'visitors.html'; break;}?>">Home</a>
            <a href="#">Tips</a>
            <a href="/contributions">Contributions</a>
            <a href="https://immigrantportalblog.wordpress.com/">Blog</a>
            <a href="https://chat-application-75cf2.web.app/">Chat</a>
            <a href="/contactus">Contact Us</a>
            <a href="/aboutus">About Us</a>
            <a href="/logout" style="float: right;">Logout</a>
        </div>
    </nav>
    <ul id="top-options">
        <tr>
            <td>
                <form method="POST" action="addtip">@csrf<textarea id="tip-textarea" name="tip-input" placeholder="Enter your tip here for the visitors to see!"></textarea>
            </td>
            <td>
                <button type="submit" name="post-button" id="post-tip">Post Tip</button></form>
            </td>
            <td>
                <select name="sort-dropdown" id="sort-dropdown">
                    <option value="none" selected>Sort by</option>
                    <option value="time">Time</option>
                    <option value="user">User</option>
                    <option value="popularity">Popularity</option>
                </select>
            </td>
            <td>
                <select name="filter-dropdown" id="filter-dropdown">
                    <option value="none" selected>Filter by</option>
                    <option value="with-image">With Images</option>
                    <option value="with-video">With Videos</option>
                    <option value="without-any">Without any media</option>
                </select>
            </td>
        </tr>
    </ul>
    <div id="tips-container">
        @foreach($tipArr->reverse() as $tip)
        @if("{$tip->contribution_type}" == 'Contribution')
            @continue
        @endif
        <div class="tip">
            Posted by <?php echo mysqli_fetch_row(mysqli_query($conn, "SELECT username FROM Users WHERE user_id = '{$tip->user_id}'"))[0]; ?> at {{$tip->posting_time}}
            <?php if(($_SESSION['role'] == 'admin') || ($_SESSION['role'] == 'superadmin')) { echo "<a style='float: right;' href='contributiondelete/{$tip->contribution_id}'>Delete</a> "; } ?>
            <hr><br>
            {{$tip->contribution}}
        </div>
        @endforeach
    </div>

</body>

</html>
