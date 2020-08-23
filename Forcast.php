<!DOCTYPE html>
<head>
    <title>Agrox | Crop Water | Forcast</title>
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
        
        function validateForm()
    {
        var a=document.forms["Form"]["tmax"].value;
        var b=document.forms["Form"]["tmin"].value;
        var c=document.forms["Form"]["tmean"].value;
        var d=document.forms["Form"]["tdew"].value;
        var e=document.forms["Form"]["uz"].value;
        var f=document.forms["Form"]["month"].value;
        var g=document.forms["Form"]["n"].value;
        var h=document.forms["Form"]["area"].value;
        if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="",e==null || e=="",f==null || f=="",g==null || g=="",h==null || h=="")
        {
            alert("Please Fill All Fields");
            return false;
        }
    }
        
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
                            <li><a href="irrigation.php">Irrigation</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
            <center><h3>1'st Phase ! (Initial)</h3></center>
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
                        . "<th> &nbsp Average<br> &nbsp Temperature<br> &nbsp &deg;C</th>"
                        . "</tr>"
                        . "<tr>"
                        . "<th>{$day->day->maxtemp_c}</th>"
                        . "<th>{$day->day->mintemp_c}</th>"
                        . "<th> &nbsp {$day->day->avgtemp_c}</th>"
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
                        <form name = "Form" method = "POST" onsubmit="return validateForm()" action = "etocal.php">
                            <div id="container">
                                <div class="row">
                                    <div class="input-group">                                        
                                        <h5><input type='text' name='tmax' id="a" value = "<?php echo $day->day->maxtemp_c ?>">
                                            <span>Max. Temperature (&deg;C)</span>
                                        </h5>
                                    </div>
                                    <div class="input-group">                                        
                                        <h5><input type='text' id="b" name='tmin' value = "<?php echo $day->day->mintemp_c ?>">
                                            <span>Min. Temperature (&deg;C)</span>
                                        </h5>
                                    </div>
                                    <div class="input-group">                                        
                                        <h5><input type='text' id="c" name='tmean' value = "<?php echo $day->day->avgtemp_c ?>">
                                            <span>Avg. Temperature (&deg;C)</span>
                                        </h5>
                                    </div>
                                    <div class="input-group">                                        
                                        <h5><input type='text' id="d" name='tdew' value = "<?php echo 15 ?>">
                                            <span>Dew point Temperature (&deg;C)</span>
                                        </h5>
                                    </div>
                                    <div class="input-group">                                        
                                        <h5><input type='text' id="e" name='uz' value = "<?php echo $day->day->maxwind_kph ?>">
                                            <span>Wind speed at 10m (kmph)</span>
                                        </h5>
                                    </div>
                                    <div class="input-group">
                                        <?php $mon = date('F') ?>
                                        <h5><input type='text' id="f" name='month' value = "<?php echo $mon ?>">
                                            <span>Current Month</span>
                                        </h5>
                                    </div>
                                    <div class="input-group">  
                                        <?php $hr = date('H') + 5 ?>
                                        <h5><input type='text' id="g" name='n' value = "<?php echo $hr ?>">
                                            <span>Current Hour (24 hr. format)</span>
                                        </h5>
                                    </div>
                                    <b>Crop :</b>
                                    <div class="input-group">
                                        <select name="crop">
                                            <option value="Wheat">Wheat</option>
                                            <option value="Rice">Rice</option>
                                            <option value="Groundnut">Groundnut</option>
                                            <option value="Cotton">Cotton</option>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <b>Enter area for cultivation (m x m)</b>
                                        <input required type='text' id="h" placeholder="Field Area" name="area"/>
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