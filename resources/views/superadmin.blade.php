<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/f99306dc1c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('../styles/dashboard.css') }}" />
    <link  rel="stylesheet" href="{{ url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Open+Sans:wght@300&display=swap') }}" />
    <title>SUPERADMIN DASHBOARD</title>
</head>

<body id="body">
    <button id="collapseNav"><i
        class="fa fa-bars fa-2x text-lightblue"
        aria-hidden="true"
        onclick="toggleSidebar()"
      ></i></button>
    <div class="container">
        <main>
            <div class="main_container">
                <!-- MAIN TITLE STARTS HERE -->

                <div class="main_title">
                    <img src="assets/hello.svg" alt="" />
                    <div class="main__greeting">
                        <h1>Hello, SUPER ADMIN</h1>
                        <p>Welcome Home!</p>
                    </div>
                </div>

                <!-- MAIN TITLE ENDS HERE -->

                <!-- MAIN CARDS STARTS HERE -->
                <div class="main_cards">
                    <div class="card">
                        <i class="fas fa-globe fa-2x text-red" aria-hidden="true"></i>
                        <div class="cardInner">
                            <p class="text-primary-p">Manage Continents and countries</p>
                            <span class="font-bold text-title">700</span>
                        </div>
                    </div>

                    <div class="card">
                        <i class="fas fa-globe-asia fa-2x text-red" aria-hidden="true"></i>
                        <div class="cardInner">
                            <p class="text-primary-p">Manage All Country Contributions</p>
                            <span class="font-bold text-title">100</span>
                        </div>
                    </div>

                    <div class="card">
                        <i class="fas fa-city fa-2x text-yellow" aria-hidden="true"></i>
                        <div class="cardInner">
                            <p class="text-primary-p">Manage Schools and hospitals by country</p>
                            <span class="font-bold text-title">3000</span>
                        </div>
                    </div>

                    <div class="card">
                        <i class="fa fa-server fa-2x text-green" aria-hidden="true"></i>
                        <div class="cardInner">
                            <p class="text-primary-p">Manage Places to Visit by country</p>
                            <span class="font-bold text-title">1090</span>
                        </div>
                    </div>
                </div>
                <!-- MAIN CARDS ENDS HERE -->

                <!-- CHARTS STARTS HERE -->
                <div class="charts">
                    <div class="charts_right">
                        <div class="charts_right_title">
                            <div>
                                <h1>Manage Reports</h1>
                            </div>
                        </div>

                        <div class="charts_right_cards">
                            <div class="card_1">
                                <h1><i class="fas fa-globe" aria-hidden="true"></i>&nbsp;Manage Continents</h1>
                                <p>111</p>
                            </div>

                            <div class="card_2">
                                <h1><i class="fas fa-globe-asia" aria-hidden="true"></i>&nbsp;Manage Countries</h1>
                                <p>555</p>
                            </div>

                            <div class="card_3">
                                <h1><i class="fas fa-city" aria-hidden="true"></i>&nbsp;Manage Cities</h1>
                                <p>2500</p>
                            </div>

                            <div class="card_4">
                                <h1><i class="fa fa-server" aria-hidden="true"></i>&nbsp;Reports</h1>
                                <p>1100</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CHARTS ENDS HERE -->
            </div>
        </main>

        <div id="sidebar">
            <div class="sidebar_title">
                <div class="sidebar_img">
                    <h1><a href="../index">Immigrant Portal</a></h1>
                </div>
                <i onclick="closeSidebar()" class="fa fa-times" id="sideBarIcon" aria-hidden="true"></i>
            </div>

            <div class="sidebar_menu">
                <div class="sidebar_link active_menu">
                    <i class="fa fa-home"></i>
                    <a href="#">Dashboard</a>
                </div>
                <div class="sidebar_link">
                    <i class="fas fa-globe" aria-hidden="true"></i>
                    <a href="#">Continents and Countries</a>
                </div>
                <div class="sidebar_link">
                    <i class="fas fa-globe-asia"></i>
                    <a href="#">All Country Contributions</a>
                </div>
                <div class="sidebar_link">
                    <i class="fas fa-city"></i>
                    <a href="#">Schools and Hospitals by Country</a>
                </div>
                <div class="sidebar_link">
                    <i class="fa fa-server"></i>
                    <a href="#">Places to Visit</a>
                </div>
                <!-- <div class="sidebar_link">
            <i class="fa fa-wrench"></i>
            <a href="#">Services</a>
          </div>
          <div class="sidebar_link">
            <i class="fa fa-file"></i>
            <a href="#">Reports</a>
          </div> -->
                <div class="sidebar_logout">
                    <i class="fa fa-power-off"></i>
                    <a href="logout.php">Log out</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>