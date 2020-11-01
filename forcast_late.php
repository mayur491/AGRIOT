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
    <script type="text/javascript">
        //<![CDATA[
        function doSums(what) {
            var df = document.forms[0];
            var a = parseFloat(df[0].value);
            var b = parseFloat(df[1].value);

            if (what === "mean") {
                df[3].value = (a + b) / 2;
            }
        }
        //]]>
    </script>
</head>
<body onload="document.forms[0][0].focus()" id="page3">
    <div class="body1">
        <div class="main">
            <header>
                <div class="wrapper">
                    <h1><a href="index.php" id="logo">Agrox Agriculture Company</a></h1>
                    <nav>
                        <ul id="menu">
                            <li><a href="index.php">Home</a></li>
                            <li class="active"><a href="DataEntry.html">Crop Water</a></li>
                            <li><a href="fertilizers.html">Fertilizers</a></li>
                            <li><a href="irrigation.html">Irrigation</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
            <div class="container">
                <?php

                function Signin() {
                    $key = "4153d0a630f54aa6b6f72834171510";
                    $forcast_days = '1';
                    $city = 'vasai';
                    $url = "http://api.apixu.com/v1/forecast.json?key=$key&q=$city&days=$forcast_days&=";
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $json_output = curl_exec($ch);
                    $weather = json_decode($json_output);
                    $days = $weather->forecast->forecastday;
                    foreach ($days as $day) {
                        echo "<br><br><center><table>"
                        . "<tr colspan = '4'>"
                        . "<td>"
                        . "<h4>{$day->date}</h4> "
                        . "<br><b>Sunrise: &nbsp </b> {$day->astro->sunrise} "
                        . "<br><b> Sunset: &nbsp </b>{$day->astro->sunset}"
                        . "<br><b> Condition: &nbsp </b>{$day->day->condition->text} "
                        . "<br><img src=' {$day->day->condition->icon}'/>"
                        . "</td>"
                        . "</tr>"
                        . "<tr>"
                        . "<th>Maximum<br>Temperature<br>&deg;C</th>"
                        . "<th>Minimum<br>Temperature<br>&deg;C</th>"
                        . "<th>Average<br>Temperature<br>&deg;C</th>"
                        . "</tr>"
                        . "<tr>"
                        . "<th>{$day->day->maxtemp_c}</th>"
                        . "<th>{$day->day->mintemp_c}</th>"
                        . "<th>{$day->day->avgtemp_c}</th>"
                        . "</tr>"
                        . "<tr>"
                        . "<th><h4><br>Max Wind Speed: </h4></th>"
                        . "<td colspan='3'><br>{$day->day->maxwind_kph}kph </td>"
                        . "</tr>"

                        /* foreach ($day->hour as $hr) {

                          echo "<tr><td colspan='4' border='0'>";
                          echo "<table style='width:100%;'>";

                          echo "<tr><td>Time</td><td>Temperature</td><td>Wind</td><td>Humidity</td><td>Dew Point</td></tr>";
                          echo "<tr><td><div>{$hr->time}<img src=' {$hr->condition->icon}'/></div></td><td>{$hr->temp_c}&deg;C<br></td><td> <br> {$hr->wind_kph}kph</td><td>$hr->humidity</td><td> <br> {$hr->dewpoint_c}&deg;C</td></tr>";

                          echo "</table></tr></td>";
                          } */
                        . "</table> <br>";
                        ?>
                        <form method="POST" action="etocal_late.php">
                            <div id="container">
                                <div class="row">
                                    <div class="input-group">                                        
                                        <h5><input type='text' name='tmax' value = "<?php echo $day->day->maxtemp_c ?>">
                                            <span>Tmax</span>
                                        </h5>
                                    </div>
                                    <div class="input-group">                                        
                                        <h5><input type='text' name='tmin' value = "<?php echo $day->day->mintemp_c ?>">
                                            <span>Tmin</span>
                                        </h5>
                                    </div>
                                    <div class="input-group">                                        
                                        <h5><input type='text' name='tmean' value = "<?php echo $day->day->avgtemp_c ?>">
                                            <span>Average</span>
                                        </h5>
                                    </div>
                                    <div class="input-group">                                        
                                        <h5><input type='text' name='tdew' value = "<?php ?>">
                                            <span>Tdew (&deg;C)</span>
                                        </h5>
                                    </div>
                                    <div class="input-group">                                        
                                        <h5><input type='text' name='uz' value = "<?php echo $day->day->maxwind_kph ?>">
                                            <span>Wind speed at 10m (kmph)</span>
                                        </h5>
                                    </div>
                                    <div class="input-group">
                                        <?php $mon = date('F') ?>
                                        <h5><input type='text' name='month' value = "<?php echo $mon ?>">
                                            <span>Current Month</span>
                                        </h5>
                                    </div>
                                    <div class="input-group">  
                                        <?php $hr = date('H') + 5 ?>
                                        <h5><input type='text' name='n' value = "<?php echo $hr ?>">
                                            <span>Current Hour (24 hr. format)</span>
                                        </h5>
                                    </div>
                                    <b>Crop :</b>
                                    <div class="input-group">
                                        <select name="crop">
                                            <option value="Banana">Rice</option>
                                            <option value="Wheat">Wheat</option>
                                            <option value="Sorghum">Sorghum</option>
                                            <option value="Groundnut">Groundnut</option>
                                            <option value="Cotton">Cotton</option>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <b>Enter area for cultivation (m x m)</b>
                                        <input type='text' placeholder="Field Area" name="area"/>
                                    </div>
                                    <div class="input-group">
                                        <input value="Submit" name="submit" type="submit">
                                    </div>
                                    <div class="input-group">
                                        <input type="reset" value="reset" onclick="document.forms[0][0].focus()"/>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <?php
                    }
                }

                if (true) { //changes here!!!  if (isset($_POST['submit'])) {
                    Signin();
                }
                ?>
            </div>
        </div><br>
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