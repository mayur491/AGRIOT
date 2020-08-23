<!DOCTYPE html>
<head>
    <title>Agrox | Technology</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="css1/style.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="js/jquery-1.6.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/tms-0.3.js"></script>
    <script type="text/javascript" src="js/tms_presets.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    
    <link rel="icon" type="image/png" href="table/images/icons/itachi.ico"/>
</head>
<body id="page3">
    <div class="body1" >
        <div class="main">
            <header>
                <div class="wrapper">
                    <h1><a href="index.php" id="logo">Agrox Agriculture Company</a></h1>
                    <nav>
                        <ul id="menu">
                            <li><a href="index.php">Home</a></li>
                            <li class="active"><a href="DataEntry.html">Crop Water</a></li>
                            <li><a href="fertilizers.html">Fertilizers</a></li>
                            <li><a href="irrigation.php">Irrigation</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
            <div class="container">
                <?php
                /*define('DB_HOST', 'localhost');
                define('DB_NAME', 'id3206387_cropwater');
                define('DB_USER', 'id3206387_prash');
                define('DB_PASSWORD', 'prash123');
                $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_connect_error());
                $db = mysqli_select_db($conn, DB_NAME) or die("Failed to connect to MySQL: " . mysqli_connect_error());*/
                
                define('DB_HOST', 'localhost');
                define('DB_NAME', 'id3206387_cropwater');
                define('DB_USER', 'root');
                define('DB_PASSWORD', '');
                $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_connect_error());
                $db = mysqli_select_db($conn, DB_NAME) or die("Failed to connect to MySQL: " . mysqli_connect_error());

                if (isset($_POST['submit'])) {
                    $crop = mysqli_real_escape_string($conn, $_POST['crop']);
                    $temp = mysqli_real_escape_string($conn, $_POST['tmean']);
                    $temp = round($temp, 0);
                    $query = mysqli_query($conn, "SELECT * FROM ea where temperature = '$temp'");
                    $row = mysqli_fetch_array($query);
                    $query1 = mysqli_query($conn, "SELECT * FROM ea where temperature = '(int)$_POST[tdew]'");
                    $row1 = mysqli_fetch_array($query1);
                    $u = mysqli_real_escape_string($conn, $_POST['uz']);
                    $u = (float) $u;
                    $u = 0.277778 * 0.748 * $u;
                    $u = (string) $u;
                    $wt = mysqli_real_escape_string($conn, $_POST['tmean']);
                    $wt = (int) $wt;
                    $month = mysqli_real_escape_string($conn, $_POST['month']);
                    $n = mysqli_real_escape_string($conn, $_POST['n']);
                    $n = (int) $n;

                    //echo $crop ,' ', $temp ,' ' , $u,' ' , $wt,' ' , $month,' ' , $n;

                    $query2 = mysqli_query($conn, "SELECT * FROM wtemp where temperature = '$wt'");
                    $row2 = mysqli_fetch_array($query2);
                    $query3 = mysqli_query($conn, "SELECT * FROM w where temperature = '$wt'");
                    $row3 = mysqli_fetch_array($query3);
                    $query4 = mysqli_query($conn, "SELECT * FROM ra where month = '$month'");
                    $query5 = mysqli_query($conn, "SELECT * FROM kc where crop = '$crop'");
                    $row5 = mysqli_fetch_array($query5);
                    $row4 = mysqli_fetch_array($query4);
                    $area = mysqli_real_escape_string($conn, $_POST['area']);

                    $row4['N'] = (float) $row4['N'];
                    $rs = (float) 0.5 * $n / $row4['N'];
                    $rs = $rs + 0.25;
                    $row4['ra'] = (float) $row4['ra'];
                    $rs = $rs * $row4['ra'];
                    $rns = (float) 0.75 * $rs;
                    $fnN = (float) 0.1 + 0.9 * $n / $row4['N'];
                    $fu = (float) 1 + $u / 100;
                    $fu = 0.27 * $fu;
                    $one = $row1['ed'];
                    ?>

                    <!--<div>
                    <input type = "checkbox" class = "read-more-state" id = "post-1" />

                    <p class = "read-more-wrap">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                        <span class = "read-more-target">
                            Libero fuga facilis vel consectetur quos sapiente deleniti eveniet dolores tempore eos deserunt officia quis ab? Excepturi vero tempore minus beatae voluptatem!
                        </span>
                    </p>

                    <label for = "post-1" class = "read-more-trigger"></label>
                    </div>-->

                    <div><center>
                            <input type = "checkbox" class = "read-more-state" id = "post-2" />
                            <ul class = "read-more-wrap">
                                <li class = "read-more-target">Ed:<input type='text' value="<?php echo $row1['ed'] ?>"/></li>
                                <?php $diff = $row['ea'] - $row1['ed']; ?>
                                <li class = "read-more-target">Ea - Ed:<input type='text' value="<?php echo $diff ?>">
                                <li class = "read-more-target">Mean temperature: <input type='text' value="<?php echo $temp ?>">
                                <li class = "read-more-target">Wind speed at 2m :<input type='text' value="<?php echo $u ?>">
                                <li class = "read-more-target">1-W :<input type='text' value="<?php echo $row2['w'] ?>">
                                <li class = "read-more-target">W :<input type='text' value=" <?php echo $row3['w'] ?>"/>
                                <li class = "read-more-target">Month :<input type='text' value=" <?php echo $row4['month'] ?>"/>    
                                <li class = "read-more-target">Ra :<input type='text' value=" <?php echo $row4['ra'] ?>"/>
                                <li class = "read-more-target">Number of sunshine hours :<input type='text' value=" <?php echo $row4['N'] ?>"/>
                                <li class = "read-more-target">f(n/N)= <input type='text' value=" <?php echo $fnN ?>"/>
                                <li class = "read-more-target">Rs : <input type='text' value=" <?php echo $rs ?>"/>    
                                <li class = "read-more-target">Rns : <input type='text' value=" <?php echo $rns ?>"/>
                                <li class = "read-more-target">f(T): <input type='text' value=" <?php echo $row['ft'] ?>"/>    
                                <li class = "read-more-target">f(ed): <input type='text' value=" <?php echo $row['fed'] ?>"/>
                                    <?php $Rnl = (float) $fnN * $row['ft'] * $row1['fed']; ?>
                                <li class = "read-more-target">Rnl : <input type='text' value=" <?php echo $Rnl ?>"/>
                                    <?php $Rn = (float) $rns - $Rnl; ?>
                                <li class = "read-more-target">Rn : <input type='text' value=" <?php echo $Rn ?>"/>
                                    <?php
                                    $eto = (float) $row2['w'] * $fu * $diff;
                                    $eto = $eto + $row3['w'] * $Rn;
                                    $eto = 1.05 * $eto;
                                    ?>
                                <li class = "read-more-target">ETo : <input type='text' value=" <?php echo $eto ?>"/>
                                <li class = "read-more-target">Kc development : <input type='text' value=" <?php echo $row5['development'] ?>"/>    
                                    <?php $etcdev = $eto * $row5['development']; ?>
                                <li class = "read-more-target">ETc development : <input type='text' value=" <?php echo $etcdev ?>"/>
                                    <?php
                                    $cwrdev = $etcdev * $area;
                                    $cwrdev = round($cwrdev, 2);
                                    ?>
                                <li>Water requirement in L: <input type='text' value=" <?php echo $cwrdev ?>"/>
                            </ul>
                            <br>
                            <label for = "post-2" class = "read-more-trigger"></label>
                        </center></div>
                    <?php
                }
                ?>
            </div>
            <br>
        </div>
    </div>
    <div class="main">
            <!-- footer -->
            <footer>
                <div class="wrapper">
                    <section class="col2">
                        <div class="wrapper">
                            <section class="col4">
                                <h3>Follow Us </h3>
                                <ul id="icons">
                                    <li><a target="_blank" href="https://www.facebook.com/MacmaK491"><img src="images/icon1.jpg" alt=""><span>Facebook</span></a></li>
                                    <li><a target="_blank" href="https://twitter.com/mayur491"><img src="images/icon2.jpg" alt=""><span>Twitter</span></a></li>
                                    <li><a target="_blank" href="https://www.linkedin.com/in/mayur491/"><img src="images/icon3.jpg" alt=""><span>Linked In</span></a></li>
                                </ul>
                            </section>
                            <section class="col4">
                                <h3>Why Us </h3>
                                <ul id="why_us">
                                    <li><a href="#">We provide <b><i>Free services! </i></b></a></li>
                                    <li><a href="#">We provide <b><i>Fast services! </i></b></a></li>
                                    <li><a href="#">We provide <b><i>Best services! </i></b></a></li>
                                </ul>
                            </section>
                        </div>
                        <div id="footer_link">Copyright &copy; <a target="_blank" href="https://www.instagram.com/mayur491/">MacmaK</a> All Rights Reserved<br>
                            Design by <a href="macmak.html">MacmaK</a></div>
                    </section>
                    <section class="col3 pad_left2">
                        <form id="ContactForm" action="MAILTO:mayur491@gmail.com" method="post" enctype="text/plain">
                            <h3 align="right">Email Us:<br></h3>
                            <button action="MAILTO:mayur491@gmail.com">Click</button>
                        </form>
                    </section>
                </div>
            </footer>
            <!-- / footer -->
        </div>
</body>