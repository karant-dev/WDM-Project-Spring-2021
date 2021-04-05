<?php

session_start();

include_once 'dbconnect.php';

if (!isset($_SESSION['username'])){
    header('location:Login.php');
}

$tip;
$type='Tip';

if (isset($_POST['post-button'])) {
    $tip=$_POST['tip-input'];
    $id=$_SESSION['id'];

    $sqlinsert="INSERT INTO contributions (contribution_type, contribution, user_id) VALUES ('$type','$tip',$id)";
    
    mysqli_query($conn, $sqlinsert);
}
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
            <a href="#our-partners">Our Partners</a>
            <a href="#">Tips</a>
            <a href="contributions.php">Contributions</a>
            <a href="#blog">Blog</a>
            <a href="contactus.html">Contact Us</a>
            <a href="aboutus.html">About Us</a>
            <a href="logout.php" style="float: right;">Logout</a>
        </div>
    </nav>
    <ul id="top-options">
        <tr>
            <td>
                <form method="POST" action="tips.php"><textarea id="tip-textarea" name="tip-input" placeholder="Enter your tip here for the visitors to see!"></textarea>
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
        <div class="tip">
            Ask for 'Water without ice'<br>-posted by Sumukh 18 min ago
            <hr>Here in the US, when you ask a restaurant employee for a glass of water, it'll almost always come with ice, regardless of the weather. So, if you do not want ice, be sure to mention that.
        </div>
        <div class="tip">
            Free refills! <br>-posted by Abhjeet on Mar 1 23:21
            <hr>Most eateries that sell beverages usually provide you with refills for the beverage you bought, so be sure to ask!
        </div>
        <div class="tip">
            Say 'Hello' or nod <br>-posted by Shreya on Feb 23 11:42
            <hr>This one is important if you wanna fit in. No matter where you are in the States, when you pass someone by or are stuck in queue by the water cooler with a stranger, it is customery to offer a polite 'How you doing?' or at least a nod. Same
            goes for leaving a place, if you buy a coffee, thank the barista and say 'Have a good one'. People aren't being excessively poilte, small talk is a part of the American culture.
        </div>
        <div class="tip">
            Save by shopping at the big retailers!<br>-posted by Karan on Feb 23 11:42
            <hr>For almost every item you are looking to buy, there almost certainly is an equivalent item provided by the behemoth retailers for a cheaper price under their own brand like AmazonBasics for Amazon or GreatValue for Walmart.
        </div>
        <div class="tip">
            Credit History is important<br>-posted by Anurag on Feb 18 15:18
            <hr>Try to build and maintain a healthy credit score and a varied credit history when in the USA. It is an important factor in determining things like your house leases, car payments and even the interest rate you can get for a loan!
        </div>
        <div class="tip">
            Try the local favorties!<br>-posted by Sheetal on Feb 2 2:53
            <hr>USA has some of the most delicious food and the great thing is different parts of the country are known of a variety of cuisines! In New York? Don't miss the Pizza, bagels and hot dogs! Heading south to Texas? Gotta try ranch dressing and
            Buffalo wings! You get the idea!

        </div>
        <div class="tip">
            Tip Title!<br>-posted by Immigrant1 on Jan 29 12:30
            <hr>Main body of the tip that the immigrant has for the visitor of a country.
        </div>
        <div class="tip">
            Another Tip Title!<br>-posted by Immigrant112 on Jan 9 1:10
            <hr>Tips will be infinitely scrollable and will be added at the end of the page as new tips come in!
        </div>
        <div class="tip">
            Sorting Tip!<br>-posted by Creator1124 on Jan 1 1:10
            <hr>Tips can also be sorted by time, the user who posted them and the popularity of the tip.
        </div>
    </div>

</body>

</html>
