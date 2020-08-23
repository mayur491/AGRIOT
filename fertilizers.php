<!DOCTYPE html>
<head>
    <title>Agrox | Fertilizers</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="table/images/icons/itachi.ico"/>
    <link rel="stylesheet" type="text/css" href="table/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="table/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="table/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="table/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="table/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="table/css/util.css">
    <link rel="stylesheet" type="text/css" href="table/css/main.css">
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
                            <li class="active"><a href="fertilizers.html">Fertilizers</a></li>
                            <li><a href="irrigation.php">Irrigation</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
        </div>
        <?php
        define('DB_HOST', 'localhost');
        define('DB_NAME', 'id3206387_cropwater');
        define('DB_USER', 'root');
        define('DB_PASSWORD', '');
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_connect_error());
        $db = mysqli_select_db($conn, DB_NAME) or die("Failed to connect to MySQL: " . mysqli_connect_error());
        if (isset($_POST['submit'])) {
            $crop = $_POST['crop'];
            $nitrogen = $_POST['nitrogen'];
            $phosphorous = $_POST['phosphorous'];
            $potassium = $_POST['potassium'];
            $ph = $_POST['ph'];
            $soiltype = $_POST['soiltype'];
            $previouscrop = $_POST['crop_previously_cultivated'];
            $crop_rotation = $_POST['crop_rotation'];
            ?>
            <div class="table100 ver3 m-b-110">
                <div class="table100-head">
                    <table>
                        <thead>
                            <tr class="row100 head">
                                <?php
                                if ($crop == 'wheat') {
                                    switch ($nitrogen) {
                                        case $nitrogen < 20 : $n = 1;
                                            ?>
                                            <th class="cell100 column4">Nitrogen <font color="red">very low!!!</font></th>
                                            <?php
                                            break;
                                        case $nitrogen >= 20 && $nitrogen < 40 : $n = 2;
                                            ?>
                                            <th class="cell100 column4">Nitrogen <font color="orange">low!</font></th>
                                            <?php
                                            break;
                                        case $nitrogen >= 40 && $nitrogen < 55: $n = 3;
                                            ?>
                                            <th class="cell100 column4">Nitrogen sufficient</th>
                                            <?php
                                            break;
                                        case $nitrogen >= 55 && $nitrogen < 70: $n = 4;
                                            ?>
                                            <th class="cell100 column4">Nitrogen <font color="orange">high!</font></th>
                                            <?php
                                            break;
                                        case $nitrogen >= 70: $n = 0;
                                            ?>
                                            <th class="cell100 column4">Nitrogen <font color="red">very high!</font></th>
                                    <script>
                                        alert("Nitrogen too high. Soil not suitable!");
                                    </script>
                                    <?php
                                    break;
                            }
                            switch ($phosphorous) {
                                case $phosphorous < 5 : $p = 1;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="red">very low!!!</font></th>
                                    <?php
                                    break;
                                case $phosphorous >= 5 && $phosphorous < 15 : $p = 2;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="orange">low!</font></th>
                                    <?php
                                    break;
                                case $phosphorous >= 15 && $phosphorous < 30: $p = 3;
                                    ?>
                                    <th class="cell100 column5">Phosphorous sufficient</th>
                                    <?php
                                    break;
                                case $phosphorous >= 30 && $phosphorous < 40: $p = 4;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="orange">high!</font></th>
                                    <?php
                                    break;
                                case $phosphorous >= 40: $p = 0;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="red">very high!</font></th>
                                    <script>
                                        alert("Phosphorous too high. Soil not suitable!");
                                    </script>
                                    <?php
                                    break;
                            }
                            switch ($potassium) {
                                case $potassium < 3 : $k = 1;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="red">very low!!!</font></th>
                                    <?php
                                    break;
                                case $potassium >= 3 && $potassium < 9 : $k = 2;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="orange">low!</font></th>
                                    <?php
                                    break;
                                case $potassium >= 9 && $potassium < 17: $k = 3;
                                    ?>
                                    <th class="cell100 column6">Potassium sufficient</th>
                                    <?php
                                    break;
                                case $potassium >= 17 && $potassium < 30: $k = 4;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="orange">high!</font></th>
                                    <?php
                                    break;
                                case $potassium >= 30: $k = 0;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="red">very high!</font></th>
                                    <script>
                                        alert("Potassium too high. Soil not suitable!");
                                    </script>
                                    <?php
                                    break;
                            }
                        }
                        if ($crop == 'cotton') {
                            switch ($nitrogen) {
                                case $nitrogen < 10 : $n = 1;
                                    ?>
                                    <th class="cell100 column4">Nitrogen <font color="red">very low!!!</font></th>
                                    <?php
                                    break;
                                case $nitrogen >= 10 && $nitrogen < 25 : $n = 2;
                                    ?>
                                    <th class="cell100 column4">Nitrogen <font color="orange">low!</font></th>
                                    <?php
                                    break;
                                case $nitrogen >= 25 && $nitrogen < 40: $n = 3;
                                    ?>
                                    <th class="cell100 column4">Nitrogen sufficient</th>
                                    <?php
                                    break;
                                case $nitrogen >= 40 && $nitrogen < 60: $n = 4;
                                    ?>
                                    <th class="cell100 column4">Nitrogen <font color="orange">high!</font></th>
                                    <?php
                                    break;
                                case $nitrogen >= 60: $n = 0;
                                    ?>
                                    <th class="cell100 column4">Nitrogen <font color="red">very high!</font></th>
                                    <script>
                                        alert("Nitrogen too high. Soil not suitable!");
                                    </script>
                                    <?php
                                    break;
                            }
                            switch ($phosphorous) {
                                case $phosphorous < 5 : $p = 1;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="red">very low!!!</font></th>
                                    <?php
                                    break;
                                case $phosphorous >= 5 && $phosphorous < 12 : $p = 2;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="orange">low!</font></th>
                                    <?php
                                    break;
                                case $phosphorous >= 12 && $phosphorous < 22: $p = 3;
                                    ?>
                                    <th class="cell100 column5">Phosphorous sufficient</th>
                                    <?php
                                    break;
                                case $phosphorous >= 22 && $phosphorous < 40: $p = 4;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="orange">high!</font></th>
                                    <?php
                                    break;
                                case $phosphorous >= 40: $p = 0;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="red">very high!</font></th>
                                    <script>
                                        alert("Phosphorous too high. Soil not suitable!");
                                    </script>
                                    <?php
                                    break;
                            }
                            switch ($potassium) {
                                case $potassium < 5 : $k = 1;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="red">very low!!!</font></th>
                                    <?php
                                    break;
                                case $potassium >= 5 && $potassium < 12 : $k = 2;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="orange">low!</font></th>
                                    <?php
                                    break;
                                case $potassium >= 12 && $potassium < 22: $k = 3;
                                    ?>
                                    <th class="cell100 column6">Potassium sufficient</th>
                                    <?php
                                    break;
                                case $potassium >= 22 && $potassium < 40: $k = 4;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="orange">high!</font></th>
                                    <?php
                                    break;
                                case $potassium >= 40: $k = 0;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="red">very high!</font></th>
                                    <script>
                                        alert("Potassium too high. Soil not suitable!");
                                    </script>
                                    <?php
                                    break;
                            }
                        }
                        if ($crop == 'sorghum') {
                            switch ($nitrogen) {
                                case $nitrogen < 5 : $n = 1;
                                    ?>
                                    <th class="cell100 column4">Nitrogen <font color="red">very low!!!</font></th>
                                    <?php
                                    break;
                                case $nitrogen >= 5 && $nitrogen < 15 : $n = 2;
                                    ?>
                                    <th class="cell100 column4">Nitrogen <font color="orange">low!</font></th>
                                    <?php
                                    break;
                                case $nitrogen >= 15 && $nitrogen < 25: $n = 3;
                                    ?>
                                    <th class="cell100 column4">Nitrogen sufficient</th>
                                    <?php
                                    break;
                                case $nitrogen >= 25 && $nitrogen < 40: $n = 4;
                                    ?>
                                    <th class="cell100 column4">Nitrogen <font color="orange">high!</font></th>
                                    <?php
                                    break;
                                case $nitrogen >= 40: $n = 0;
                                    ?>
                                    <th class="cell100 column4">Nitrogen <font color="red">very high!</font></th>
                                    <script>
                                        alert("Nitrogen too high. Soil not suitable!");
                                    </script>
                                    <?php
                                    break;
                            }
                            switch ($phosphorous) {
                                case $phosphorous < 2 : $p = 1;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="red">very low!!!</font></th>
                                    <?php
                                    break;
                                case $phosphorous >= 2 && $phosphorous < 6 : $p = 2;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="orange">low!</font></th>
                                    <?php
                                    break;
                                case $phosphorous >= 6 && $phosphorous < 12: $p = 3;
                                    ?>
                                    <th class="cell100 column5">Phosphorous sufficient</th>
                                    <?php
                                    break;
                                case $phosphorous >= 12 && $phosphorous < 25: $p = 4;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="orange">high!</font></th>
                                    <?php
                                    break;
                                case $phosphorous >= 25: $p = 0;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="red">very high!</font></th>
                                    <script>
                                        alert("Phosphorous too high. Soil not suitable!");
                                    </script>
                                    <?php
                                    break;
                            }
                            switch ($potassium) {
                                case $potassium < 3 : $k = 1;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="red">very low!!!</font></th>
                                    <?php
                                    break;
                                case $potassium >= 3 && $potassium < 7 : $k = 2;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="orange">low!</font></th>
                                    <?php
                                    break;
                                case $potassium >= 7 && $potassium < 13: $k = 13;
                                    ?>
                                    <th class="cell100 column6">Potassium sufficient</th>
                                    <?php
                                    break;
                                case $potassium >= 13 && $potassium < 30: $k = 4;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="orange">high!</font></th>
                                    <?php
                                    break;
                                case $potassium >= 30: $k = 0;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="red">very high!</font></th>
                                    <script>
                                        alert("Potassium too high. Soil not suitable!");
                                    </script>
                                    <?php
                                    break;
                            }
                        }
                        if ($crop == 'groundnut') {
                            switch ($nitrogen) {
                                case $nitrogen < 2 : $n = 1;
                                    ?>
                                    <th class="cell100 column4">Nitrogen <font color="red">very low!!!</font></th>
                                    <?php
                                    break;
                                case $nitrogen >= 2 && $nitrogen < 4 : $n = 2;
                                    ?>
                                    <th class="cell100 column4">Nitrogen <font color="orange">low!</font></th>
                                    <?php
                                    break;
                                case $nitrogen >= 4 && $nitrogen < 10: $n = 3;
                                    ?>
                                    <th class="cell100 column4">Nitrogen sufficient</th>
                                    <?php
                                    break;
                                case $nitrogen >= 10 && $nitrogen < 25: $n = 4;
                                    ?>
                                    <th class="cell100 column4">Nitrogen <font color="orange">high!</font></th>
                                    <?php
                                    break;
                                case $nitrogen >= 25: $n = 0;
                                    ?>
                                    <th class="cell100 column4">Nitrogen <font color="red">very high!</font></th>
                                    <script>
                                        alert("Nitrogen too high. Soil not suitable!");
                                    </script>
                                    <?php
                                    break;
                            }
                            switch ($phosphorous) {
                                case $phosphorous < 3 : $p = 1;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="red">very low!!!</font></th>
                                    <?php
                                    break;
                                case $phosphorous >= 3 && $phosphorous < 5 : $p = 2;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="orange">low!</font></th>
                                    <?php
                                    break;
                                case $phosphorous >= 5 && $phosphorous < 12: $p = 3;
                                    ?>
                                    <th class="cell100 column5">Phosphorous sufficient</th>
                                    <?php
                                    break;
                                case $phosphorous >= 12 && $phosphorous < 30: $p = 4;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="orange">high!</font></th>
                                    <?php
                                    break;
                                case $phosphorous >= 30: $p = 0;
                                    ?>
                                    <th class="cell100 column5">Phosphorous <font color="red">very high!</font></th>
                                    <script>
                                        alert("Phosphorous too high. Soil not suitable!");
                                    </script>
                                    <?php
                                    break;
                            }
                            switch ($potassium) {
                                case $potassium < 4 : $k = 1;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="red">very low!!!</font></th>
                                    <?php
                                    break;
                                case $potassium >= 4 && $potassium < 7 : $k = 2;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="orange">low!</font></th>
                                    <?php
                                    break;
                                case $potassium >= 7 && $potassium < 14: $k = 3;
                                    ?>
                                    <th class="cell100 column6">Potassium sufficient</th>
                                    <?php
                                    break;
                                case $potassium >= 14 && $potassium < 30: $k = 4;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="orange">high!</font></th>
                                    <?php
                                    break;
                                case $potassium >= 30: $k = 0;
                                    ?>
                                    <th class="cell100 column6">Potassium <font color="red">very high!</font></th>
                                    <script>
                                        alert("Potassium too high. Soil not suitable!");
                                    </script>
                                    <?php
                                    break;
                            }
                        }
                        ?>
                        </tr>
                        </thead>
                    </table>    
                </div>
            </div>
            <?php
            $range = $n * 100 + $p * 10 + $k;
            if ($crop == 'wheat') {
                $query = mysqli_query($conn, "SELECT * FROM npk_wheat where npk = '$range'");
            }
            if ($crop == 'cotton') {
                $query = mysqli_query($conn, "SELECT * FROM npk_cotton where npk = '$range'");
            }
            if ($crop == 'sorghum') {
                $query = mysqli_query($conn, "SELECT * FROM npk_sorghum where npk = '$range'");
            }
            if ($crop == 'groundnut') {
                $query = mysqli_query($conn, "SELECT * FROM npk_groundnut where npk = '$range'");
            }
            ?>
            <br>
            
                <?php
                if ($crop == 'wheat') {
                    ?>
                    <div class='container'>
                    <?php
                    echo "<h5><br><font color=#00ad5f>Well rotten farmyard manure (FYM) or compost should be applied at the rate of 15 to 20 tons after every two years. "
                    . "<br>If farmyard manure has been applied, reduce the fertilizer quantity by 2 kg of nitrogen and 1 kg of phosphorus per 10 quintal of farmyard manure applied.<br>";

                    if ($previouscrop == "rice" || $previouscrop == "Rice" || $previouscrop == "RICE") {
                        if ($soiltype == 'light') {
                            echo "<br>Manganese deficiency generally appears in light soils under intensive cropping especially in rice- wheat rotation";
                            echo "<br>The symptoms appear on the middle leaves as interveinal chlorosis with light grayish yellow to pinkish brown or buff coloured specks of variable size confined largely to 2/3 lower portion of the leaf. "
                            . "<br>Later, the specks coalesce forming a streak or band in between the veins which remain green. "
                            . "<br>In acute deficiency whole of the plant may become dry.";
                            echo "<br>--In manganese deficient soils, "
                            . "<br>give one spray of 0.5% manganese sulphate solution (1 kg manganese sulphate in 200 litres of water) "
                            . "<br>2-4 days before first irrigation and two to three sprays afterwards at weekly intervals on sunny days.";
                        }
                    }

                    if ($range == '113') {
                        echo "<br>Since, Nitrophosphate is used as source of P, omit nitrogen application at sowing.";
                    }
                    if ($ph < 6) {
                        echo "<br>The soil pH indicates that the soil is ACIDIC.";
                        echo "<br>For P, use of basic slag or rock phosphate may be more profitable than superphosphate or diammonium phosphate.";
                    }
                    if ($ph > 10) {
                        echo "<br>The soil pH indicates that the soil is STRONGLY ALKALINE.";
                        echo "<br>10-30 % of applied nitrogen may be lost through ammonia volatilization, if urea or other ammonical fertilizers are used for top dressing. "
                        . "<br>In such cases CAN (Calcium ammonium nitrate or Kisan Khad) should be preferred to urea.";
                    }

                    switch ($soiltype) {
                        case "calcereous" :
                            echo "<br>Since the soil is CALCEREOUS : 10-30 % of applied nitrogen may be lost through ammonia volatilization, if urea or other ammonical fertilizers are used for top dressing. "
                            . "<br>In such cases CAN (Calcium ammonium nitrate or Kisan Khad) should be preferred to urea.";
                            break;

                        case "kallar":
                            echo "<br>Since the soil is KALLAR: Apply 25% more nitrogen than recommended.";
                            break;
                        case "<br>sandy":
                            echo "<br>Since the soil is SANDY: Wheat crop suffers from sulphur deficiency when sown in sandy soils.";
                            echo "<br>Sulphur deficiency:";
                            echo "<br>--The symptoms first appear on the younger leaves with fading of the normal green colour. "
                            . "<br>This is followed in the veins. "
                            . "<br>The topmost leaves become light yellow except for the tip, while the lower leaves retain green colour for a longer time. "
                            . "<br>This is distinctly different from the nitrogen deficiency where the yellowing starts with the lower leaves. "
                            . "<br>The plants are short in size with fewer tillers.";

                            echo "<br>--Use sulphur-containing fertilizer as single super phosphate.";
                            echo "<br>Where phosphorus was not applied as single super phosphate, apply 100 kg of gypsum per acre before sowing to meet the sulphur requirement of the crop.";
                            echo"<br>Do not grow varieties PDW 291, PDW 274 and PDW 233 in sandy soils as these varieties are prone to manganese deficiency.";
                            echo "<br>Manganese deficiency:</h5>";
                            echo "<br>--The symptoms appear on the middle leaves as interveinal chlorosis with light grayish yellow to pinkish brown or buff coloured specks of variable size confined largely to 2/3 lower portion of the leaf. "
                            . "<br>Later, the specks coalesce forming a streak or band in between the veins which remain green. "
                            . "<br>In acute deficiency whole of the plant may become dry.";
                            echo "<br>--In manganese deficient soils, "
                            . "<br>give one spray of 0.5% manganese sulphate solution (1 kg manganese sulphate in 200 litres of water) "
                            . "<br>2-4 days before first irrigation and two to three sprays afterwards at weekly intervals on sunny days.";
                            break;

                        case "light" :
                            echo "<br>Since the soil type is LIGHT: Zinc deficiency generally appears in light soils under intensive cropping.";
                            echo "<br>Application of 25 kg of zinc sulphate per acre which will be enough for 2-3 years.";
                            echo "<br>--Zinc deficiency can also be corrected by foliar spray of 0.5% zinc sulphate (21% Zinc). "
                            . "<br>Prepare the solution for spray by dissolving 1 kg zinc sulphate and 1/2 kg unslaked lime in 200 litres of water. "
                            . "<br>This solution is sufficient for spraying an acre of wheat once. "
                            . "<br>Two or three sprays at 15-day intervals are needed.";
                            break;
                    }
                }
                ?>
            </div>
            <div class="container-table100">
                <div class="limiter">
                    <div class="wrap-table100">
                        <div class="table100 ver1 m-b-110">
                            <div class="table100 ver3 m-b-110">
                                <div class="table100-head">
                                    <table>
                                        <thead>
                                            <tr class="row100 head">
                                                <th class="cell100 column1">Fertilizer</th>
                                                <th class="cell100 column2">Composition</th>
                                                <th class="cell100 column3">Quantity (50 kg bag) </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="table100-body js-pscroll">
                                    <table>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_array($query)) {
                                                $query1 = mysqli_query($conn, "SELECT * FROM fertilizer_list where id = '$row[abc]'");
                                                while ($row1 = mysqli_fetch_array($query1)) {
                                                    echo "<tr class='row100 body'>";
                                                    echo "<td class='cell100 column1'>" . $row1['fertname'] . "</td>";
                                                    echo "<td class='cell100 column2'>" . $row1['composition'] . "</td>";
                                                    echo "<td class='cell100 column3'>" . $row['quantity'] . "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            if ($crop == 'wheat') {
                                                if ($nitrogen >= 20 && $nitrogen <= 30) {
                                                    echo "<tr class='row100 body'>";
                                                    echo "<td class='cell100 column1'> Urea </td>";
                                                    echo "<td class='cell100 column2'> 46-0-0 </td>";
                                                    echo "<td class='cell100 column3'> 0.5 </td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="table/vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="table/vendor/bootstrap/js/popper.js"></script>
        <script src="table/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="table/vendor/select2/select2.min.js"></script>
        <script src="table/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script>
                                        $('.js-pscroll').each(function () {
                                            var ps = new PerfectScrollbar(this);
                                            $(window).on('resize', function () {
                                                ps.update();
                                            });
                                        });
        </script>
        <script src="table/js/main.js"></script>
        <?php
    }
    ?>
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
                    <div id="footer_link"><font color="grey">Copyright &copy; <a target="_blank" href="https://www.instagram.com/mayur491/">MacmaK</a> All Rights Reserved<br>
                        Design by </font><a href="macmak.html">MacmaK</a></div>
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