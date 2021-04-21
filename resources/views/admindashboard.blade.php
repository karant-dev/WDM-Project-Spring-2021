<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{ url('../styles/admindashboard.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('../styles/socialmedia.css') }}" />
</head>

<body>
    <nav>
        <div class="topnav">
            <a href="../index">Home</a>
            <a href="#">Manage Country</a>
            <a href="#our-partners">Our Partners</a>
            <a href="#blog">Blog</a>
            <a href="#contact-us">Contact Us</a>
            <a href="#about-us">About Us</a>
            <a href="logout.php" style="float: right;">Logout</a>
        </div>
    </nav>

    <div class="stats-container">
        <div class="stats-banner">
            <img class="stats-icon" src="../resources/icons/users.png">
            <h2 class="stats-number">1234</h2>
            <h4 class="stats-name">Users</h4>
        </div>
        <div class="stats-banner">
            <img class="stats-icon" src="../resources/icons/post_filled.png">
            <h2 class="stats-number">321</h2>
            <h4 class="stats-name">Posts</h4>
        </div>
        <div class="stats-banner">
            <img class="stats-icon" src="../resources/icons/image-posts.png">
            <h2 class="stats-number">200</h2>
            <h4 class="stats-name">Images</h4>
        </div>
        <div class="stats-banner">
            <img class="stats-icon" src="../resources/icons/videos_outline.png">
            <h2 class="stats-number">45</h2>
            <h4 class="stats-name">Videos</h4>
        </div>
        <div class="stats-banner">
            <img class="stats-icon" src="../resources/icons/landmark.png">
            <h2 class="stats-number">21</h2>
            <h4 class="stats-name">Landmarks</h4>
        </div>
        <div class="stats-banner">
            <img class="stats-icon" src="../resources/icons/tips.png">
            <h2 class="stats-number">69</h2>
            <h4 class="stats-name">Tips</h4>
        </div>
    </div>
    <ul id="top-options">
        <tr>
            <td>
                <a href "#">Manage Contributions Immigrants</a>
            </td>
            <td>
                <a href "#">Manage Schools and Hospitals</a>
            </td>
            <td>
                <a href "#">Manage Places to visit</a>
            </td>
        </tr>
    </ul>
    <div class="chart">
        <img src="../resources/images/pie-chart.png" alt="Pie Chart">
    </div>
    <br>
    <p class="chart-label">Users by age</p>
    <table id="user-ranking-table">
        <tr>
            <th>Rank</th>
            <th>User</th>
            <th>Posts</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Shreyalaxmi Talukdar</td>
            <td>36</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Abhijeet Rathod</td>
            <td>29</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Karan Thakkar</td>
            <td>20</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Tushar Khair</td>
            <td>13</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Nikunj Lotia</td>
            <td>11</td>
        </tr>
    </table>
</body>

</html>