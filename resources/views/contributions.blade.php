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
    <title>Contributions</title>
    <link rel="stylesheet" type="text/css" href="../styles/contributions.css">
    <link rel="stylesheet" type="text/css" href="../styles/socialmedia.css">
</head>

<body>
    <nav>
        <div class="topnav">
            <a href="<?php switch($_SESSION['role']){ case 'admin':echo '/admindashboard';break; case 'superadmin': echo '/superadmin';break; case 'immigrant': echo '/immigrants'; break; case 'visitor': echo '/visitors'; break;}?>">Home</a>
            <a href="/tips">Tips</a>
            <a href="#">Contributions</a>
            <a href="https://immigrantportalblog.wordpress.com/">Blog</a>
            <a href="/contactus">Contact Us</a>
            <a href="/aboutus">About Us</a>
            <a href="/logout" style="float: right;">Logout</a>
        </div>
    </nav>
    <ul id="top-options">
        <tr>
            <td>
                <form method="POST" action="/addcontribution">@csrf<textarea id="contribution-textarea" name="contribution-input" placeholder="Contribute here!"></textarea>
            </td>
            <td>
                <button type="submit" name="post-button" id="post-contribution">Publish</button></form>
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
    <div id="contributions-container">
        @foreach($contributionArr->reverse() as $contribution)
        @if("{$contribution->contribution_type}" == 'Tip')
            @continue
        @endif
        <div class="contribution">
            Posted by <?php echo mysqli_fetch_row(mysqli_query($conn, "SELECT username FROM Users WHERE user_id = '{$contribution->user_id}'"))[0]; ?> at {{$contribution->posting_time}}
            <?php if(($_SESSION['role'] == 'admin') || ($_SESSION['role'] == 'superadmin')) { echo "<a style='float: right;' href='contributiondelete/{$contribution->contribution_id}'>Delete</a> "; } ?>
            <hr><br>
            {{$contribution->contribution}}
        </div>
        @endforeach
    </div>

</body>

</html>
