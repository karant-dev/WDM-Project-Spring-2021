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
<title>Visitors</title>

<head>
    <link rel="stylesheet" href="{{ url('../styles/visitors.css') }}" />
    <link rel="stylesheet" href="{{ url('../styles/socialmedia.css') }}" />
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ url('https://fonts.googleapis.com/css?family=Sofia') }}" />
</head>

<body>

    <nav>
        <div class="topnav">
            <a href="#">Home</a>
            <a href="/immigrants">Immigrant Services</a>
            <a href="/tips">Tips</a>
            <a href="/contributions">Contributions</a>
            <a href="https://immigrantportalblog.wordpress.com/">Blog</a>
            <a href="https://chat-application-75cf2.web.app/">Chat</a>
            <a href="/contactus">Contact Us</a>
            <a href="/aboutus">About Us</a>
            <a href="/logout" style="float: right;">Logout</a>
        </div>
    </nav>

    <section>
        <div class="welcomevisitors">
            <h1 style="color:#932432;font-size:50px; font-family: Georgia, serif">Welcome Visitors</h1><br>
        </div>
    </section>

    <section>
        <div class="base1" style="margin-top: 5px;">
            <h3 style="color:#DE354C;font-size:30px;font-family: 'Times New Roman', Times, serif;"><u>Menu</u></h3><br><br>
            <div class="column">
                <h6 style="font-size:20px; color: #3c1874;">TIPS<br> <br> <br> </h6>
                <div class="zoom">
                    <a href="#tips" style="color: black"><i class="fa fa-newspaper-o" style="font-size:70px"></i></a>
                </div>
            </div>
            <div class="column">
                <h6 style="font-size:20px; color: #3c1874;">CONTRIBUTIONS<br> <br><br> </h6>
                <div class="zoom">
                    <a href="#contributions" style="color: black"><i class="fa fa-suitcase" style="font-size:70px"></i></a>
                </div>
            </div>
            <div class="column">
                <h6 style="font-size:20px; color: #3c1874;">UPLOAD MEDIA<br> <br><br> </h6>
                <div class="zoom">
                    <a href="#upload" style="color: black"><i class="fa fa-file-image-o" style="font-size:70px"></i></a>
                </div>
            </div>
            <div class="column">
                <h6 style="font-size:20px; color: #3c1874;">PLACES TO VISIT <br> <br> <br></h6>
                <div class="zoom">
                    <a href="#places" style="color: black"><i class="fa fa-car" style="font-size:70px"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="base2" id="tips" style="height: 500px;">
            <h3 style="color:#DE354C;font-size:30px;font-family: 'Times New Roman', Times, serif;"><u>Tips</u></h3><br><br>
            <p style="color: #3c1874;">Have something special or important to share? Spill your heart out!<br>
                <i style="font-size: 20px">News, Stories, Announcements! Everything in one place! </i> </p>

            <div class="row">
                <div class="tipsadd left">
                    <p><b>Click to add tips you wish to share</b></p> <br><br><br>
                    <i class="fa fa-pencil-square-o" style="font-size:45px; opacity: 0.4"></i><br><br>
                    <a href="../html/tips"><button class="button button1"> Add Tips </button></a>
                </div>

                <div class="tipsadd right" style="width: 950px;">
                    <p><b>Want to know tips shared by others? Here it is. </b></p> <br>
                    <ol style="text-align: left; padding-left: 15px">
                        <li>With increasing cases of COVID-19, make sure to follow the norms in public. </li>
                        <li>St.Thomas School is providing scholarship for needy students of grade 7-10. They will also be giving out good-quality used books from 18/03/2021 to 25/03/2021 from their school library.</li>
                        <li>Join the new workout sessions for Dance and Zumba at DanceInc(45th street, XYZ). Open for all age group.</li>
                        <li>Bridge contruction happening at ABC area. Avoid travelling in that area until 15/04/2021. Use the alternative route to save time. </li>
                    </ol>
                </div>
            </div>

        </div>
    </section>

    <section>
        <div class="base1" id="contributions" style="height: 500px">
            <h3 style="color:#DE354C;font-size:30px;font-family: 'Times New Roman', Times, serif;"><u>Contributions</u></h3><br><br>
            <p style="color: #3c1874;">Want to know about people who did something for the society? Here's a list of contributions by our people.</p> <br>
            <div class="contri">
                <table width="100%" border="dashed">
                    <tr>
                        <th>Category</th>
                        <th>Details</th>
                        <th>Year of contribution</th>
                    </tr>

                    <tr>
                        <td>Sports</td>
                        <td>Won Gold medal in national swimming competition for under-30 freestyle swimming</td>
                        <td>2019</td>
                    </tr>

                    <tr>
                        <td>Social Service</td>
                        <td>Help clean the children's park that was littered due to strong winds</td>
                        <td>Feb 2020</td>
                    </tr>
                </table>
                <br><br>
                <p style="text-align: center;"><a href="../html/contributions"><button class="button button1"> View Contributions </button> </a></p>

            </div>
        </div>
    </section>

    <section>
        <div class="base2" id="upload" style="height: 500px;">
            <h3 style="color:#DE354C;font-size:30px;font-family: 'Times New Roman', Times, serif;"><u>Upload Photos and Videos</u></h3><br><br>
            <p style="color: #3c1874;"> A moment lasts all of a second, but the memory lives on forever. Save your photos and videos here and share it with your loved ones! </p>
            <div class="uploadmedia" style="height: 340px;">
                <form id="upload" action="../php/upload.php" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <br>
                        <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />
                        <label for="fileselect">Choose from your device:</label> <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" /> <br><br>
                        <div id="filedrag">
                            <i class="fa fa-upload" style="font-size: 70px; opacity: 0.4"></i>
                            <p style="font-size: 25px;opacity: 0.4">Drag to upload </p>
                        </div>

                        <div id="submitbutton">
                            <button type="submit">Upload Files</button>
                        </div>

                    </fieldset>

                </form>

                <div id="progress"></div>

                <div id="messages">
                    <br>
                    <p>Status Messages</p>
                </div>

            </div>

        </div>
    </section>

    <section>
        <div class="base1" id="places" style="height: 1400px">
            <h3 style="color:#DE354C;font-size:30px;font-family: 'Times New Roman', Times, serif;"><u>Places to Visit</u></h3><br><br>
            <p style="color: #3c1874;"> Confused where to go for holidays? Here's a list of some of the marvelous places to visit. <br> <i style="font-size: 20px"> *** Beaches, Nature, Statues *** </i> <br> Choose your next place of visit and have a fun with your friends and family
                amidst the beauty of the country </p>
            <br><br>
            <div class="ptv">
                <p style="font-size: 25px"><img class="imgplaces1" src="../resources/images/california.jpg" style="width:170px;height:170px;margin-right:15px;"> <b>YOSEMITE NATIONAL PARK, CALIFORNIA</b><br><br></p>
                <p style="font-size: 17px">Yosemite National Park is in California’s Sierra Nevada mountains. It was estalblised on October 1, 1890. Best time to visit is in May and September when the park is not too crowded and one can enjoy the beauty of the place. It has beautiful
                    waterfalls, deep valleys, grand meadows, ancient giant sequoias, a vast wilderness area, and much more. Go ahead and have a fun camping at this breath-taking location!
                </p>
            </div>

            <div class="ptv">
                <p style="font-size: 25px"><img class="imgplaces2" src="../resources/images/miami.jpg" style="width:170px;height:170px;margin-right:15px;"> <b>MIAMI BEACH, FLORIDA</b><br><br></p>
                <p style="font-size: 17px">Need a short weekend? Love beaches? Miami beach located in Florida is just the place you are looking for! Lie on the beach and have a great tan or explore the lifestyle of Miami city. The city offers a fine blend between high lifestyle,
                    history, and arts. Miami beach is the epitome of "Sunny Florida". This small barrier island near Miami was originally cleared of mangroves in the late 1800's to make way for a coconut farm, and was later incorporated as a city by real
                    estate developers in 1915.
                </p>
            </div>

            <div class="ptv">
                <p style="font-size: 25px"><img class="imgplaces1" src="../resources/images/new_york.jpg" style="width:170px;height:170px;margin-right:15px;"> <b>STATUE OF LIBERTY, NEW YORK</b><br><br></p>
                <p style="font-size: 17px">The Statue of Liberty is a colossal neoclassical sculpture on Liberty Island in New York Harbor within New York City, in the United States. This enormous momument is 93m tall and has a great history associated. One who is curious to learn
                    stuff on holidays would love to hear the stories. Also, New York is not all about history. It has beautiful architecture, appetizing food and drink, festivals and gorgeous beaches. You may find it a bit expensive but then New York
                    would be a perfect destination if you love history and want to have vacation to.
                </p>
            </div>

            <div class="ptv">
                <p style="font-size: 25px"><img class="imgplaces2" src="../resources/images/niagara.jpg" style="width:170px;height:170px;margin-right:15px;"> <b>NIAGARA FALLS, NEW YORK STATE</b><br><br></p>
                <p style="font-size: 17px">Niagara Falls is a city on the Niagara River, in New York State. It’s known for the vast Niagara Falls, which straddle the Canadian border.The euphonic sound of falling water, the spectatcular view and the immeasurable waterfall are few
                    of the things that attracts people towards Niagara. A perfect destination to travel with your spouse, your childre, or your friends. This place has its own beauty! It is a geological wonder attracting tourists for over 200 years and
                    a major source of hydroelectric power. So when are you leaving for your trip to Niagara?!
                </p>
            </div>

            <div class="ptv">
                <p style="font-size: 25px"><img class="imgplaces1" src="../resources/images/san_francisco.jpg" style="width:170px;height:170px;margin-right:15px;"> <b>GOLDEN GATE BRIDGE, SAN FRANCISCO </b><br><br></p>
                <p style="font-size: 17px">The Golden Gate Bridge is a suspension bridge spanning the Golden Gate, the one-mile-wide strait connecting San Francisco Bay and the Pacific Ocean. It has a length of 2737m. Long enough right? It held the record for longest suspension
                    bridge in the world for over 25 years. Isn't it amazing? So why wait? Plan atrp to see the beauty that stands there along with the beautiful view. It is a sight that most of us want to see at least once in our lifetime. Its picturesque
                    view overlooking the waters and city is not something that most people get to enjoy each day!
                </p>
            </div>


        </div>
    </section>

    <button onclick="topFunction()" id="myBtn" title="Go to top">Top <i class="fa fa-arrow-up"></i>
  </button>

</body>
<script type="text/javascript">
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the buttonst
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

<script src="../scripts/visitors.js"></script>


</html>
