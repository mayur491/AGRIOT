<?php include_once('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Calender</title>
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

        <link type="text/css" rel="stylesheet" href="style.css"/>
        <script src="jquery.min.js"></script>
    </head>
    <body id="page3">
        <div class="body1">
            <div class="main">

                <header>
                    <div class="wrapper">
                        <h1><a href="index.php" id="logo">Agrox Agriculture Company</a></h1>
                        <nav>
                            <ul id="menu">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="DataEntry.html">Crop Water</a></li>
                                <li><a href="fertilizers.html">Fertilizers</a></li>
                                <li class="active"><a href="irrigation.php">Irrigation</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </header>  
            </div>
        </div>

        <div id="calendar_div">
            <?php echo getCalender(); ?>
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
</html>
