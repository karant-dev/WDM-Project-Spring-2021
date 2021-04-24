<?php

session_start();

// include_once 'dbconnect.php';

if (!isset($_SESSION['username'])){
    header('location:Login.php');
}

$contribution="";
$type='Contribution';

if (isset($_POST['post-button'])) {
    $contribution=$_POST['contribution-input'];
    $id=$_SESSION['id'];

    $sqlinsert="INSERT INTO contributions (contribution_type, contribution, user_id) VALUES ('$type','$contribution',$id)";
    
    mysqli_query($conn, $sqlinsert);
}
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
            <a href="<?php switch($_SESSION['role']){ case 'admin':echo 'admindashboard.html';break; case 'superadmin': echo 'superadmin.html';break; case 'immigrant': echo 'immigrants.html'; break; case 'visitor': echo 'visitors.html'; break;}?>">Home</a>
            <a href="#our-partners">Our Partners</a>
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
                <form method="POST" action="contributions.php"><textarea id="contribution-textarea" name="contribution-input" placeholder="Contribute here!"></textarea>
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
        <div class="contribution">
            "The Immigrant Restaurant Owner Who Helps the Poor and Homeless"<br>-posted by Sumukh 18 min ago
            <hr>Pakistani-born immigrant Kazi Mannan is the owner of Sakina Halal Grill in Washington D.C. “If someone says I need a free meal . . . Okay,” said Mannan. On a daily basis, he feeds any homeless or poor person who enters his restaurant and asks
            for help. In 2018, he gave away 16,000 free meals. “Once upon a time, I was in a similar situation where I didn’t have enough to eat. . . . When you uplift another human being it’s a beautiful thing.”
        </div>
        <div class="contribution">
            "An escape from danger" <br>-posted by Abhjeet on Mar 1 23:21
            <hr>My father worked as a ranchero and my mother used to waitress at a local pub and restaurant. I was the oldest of all my siblings and therefore, the leader. I had to set an example for the younger ones and had to take care of them from the
            dangers of the world. One day, I was at home when I found out my father had been killed. It was a tragic day and my mother, devastated from the loss, wanted to move to America, speaking of being safer there and how America could help us all.My
            siblings and I went to school and had good grades, my mother working as a waitress, yet again. I grew up to be a police officer, wanting to be able to prevent crimes in my city, New York, like to what happened to my father. I thank American
            for the opportunities that it has given me and will be forever grateful.
        </div>
        <div class="contribution">
            "Moved to USA because here in the eyes of the law, we are all equals"<br>-posted by Shreya on Feb 23 11:42
            <hr>I was born in Iran, and at the age of 10, my family and I absconded from the multi-systemic injustices and immigrated to the US in hopes of extended opportunities and freedom. I was about 3-years-old when the Iran-Iraq war started. My experiences
            as an immigrant child growing up in the US helped me gain an appreciation for the gift of life. This is because my immigrant story is tied to so much loss and despair….pain and anguish that has yet to heal 30 years later. Through the years
            so many of my family members passed away (both grandmothers, uncles, aunts, cousins), and I never got to see them again. I grew up here wishing that just for one holiday in my life I could have family around and feel the love that everyone
            else seemingly felt. Turning our backs on immigrant and refugee populations would mean we are no longer willing to nurture others like myself who have a chance to grow and contribute to what makes America already so great. I ask you to please
            continue to fight tyranny and injustice by keeping the conversation going. We cannot allow this president and his administration to change the core American values that have been admired by the world through so many decades of exemplary practices
            of inclusivity.
        </div>
        <div class="contribution">
            "A safe haven for immigrants"<br>-posted by Karan on Feb 23 11:42
            <hr>In 1965 we came to the U.S. not by plane, but by freighter ship, crossing the Pacific Ocean and Panama Canal. I was four years old then. We came because my parents sought a better life for my brother and me, so they gave up the comfortable
            one they had. My parents always said it was because of President Johnson. Growing up, I was fortunate to make many wonderful friends of diverse ethnicities, religions, and backgrounds. I was fortunate to have received an education that opened
            many doors for me. After graduation from college and medical school, I was privileged to take care of cancer patients. I was privileged to work alongside many dedicated colleagues at the FDA and National Cancer Institute as a commissioned
            officer in the US Public Health Service. I was privileged and fortunate to contribute to the discovery and development of several new cancer drugs that are available for patients today. As a parent, I am blessed to have one son serving our
            country as an officer in the 82nd Airborne Division and another son pushing the boundaries of medicine and science beyond that taught to me a generation ago. I am an immigrant and a proud American. Like many immigrants, I am grateful for what
            America has to offer and strive to make America a better country.
        </div>
        <div class="contribution" ā>
            "A chance at a better life"<br>-posted by Anurag on Feb 18 15:18
            <hr>My grandparents were refugees at the time of partition in India from, what is now, Pakistan to present India. They worked long and hard days doing blue-collar jobs so that my parents would have a better chance at life. My parents chose to
            honor their sacrifices by seeking a better life in the United States. We came to this country because my mother had a fellowship. We landed with just over $800 in NYC. My father’s MBA was not accredited in the United States so eventually he
            went back to school to repeat his degree. They recognized that the system in the US is based on where you go to school so they sent my sister and I to the best high schools and then the best colleges. I am now in law school working to make
            sure our systems provide everyone with a fair shot at success and my sister is teaching English helping the next generation learn empathy. We honor the sacrifices of our family by trying to make the world a better place. We believe that the
            promise of America can be a reality for all of us. We are Americans.
        </div>
        <div class="contribution" ā>
            Immigrant Contribution<br>-posted by Sheetal on Feb 2 2:53
            <hr>My dad was born in 1968 in Saigon, Vietnam during the Vietnam War. At that time grandpa was a soldier fighting for the South in the Vietnam War. My dad was 7 at the time when my grandfather was taken to a camp that was owned by the communists
            and was kept as a prisoner of war. He returned 10 years after when my dad was 17 years old and my dad’s family opened up a salon. In 1993, when my dad was 24 years old, my dad and his whole family received airplane tickets to America to escape
            the communist takeover in Vietnam. My dad and his family chose to settle in California because he heard the weather was nice and there was a lot of job opportunities in San Jose. When my dad first arrived in America. They lived in an apartment
            in Blossom Hill. His first job was in electronic assembling. He says getting the job was easy since he had a friend who helped him. He wanted to learn the English language because he says living in America without knowing most of the words
            was difficult so he went to West Valley College for two years to learn English. Everyone has their own immigrant story.
        </div>
    </div>

</body>

</html>
