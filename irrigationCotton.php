<?php

$user = 'root';
$pass = '';
$db = 'agridb';

$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

$cropName = $_POST['cropName'];
$choice = $_POST['choice'];
$dateOfSowing = $_POST['dateOfSowing'];
$soilMoisture = $_POST['soilMoisture'];
$dryDensity = $_POST['dryDensity'];
$cropWater = $_POST['cropWater'];
$areaOfCultivation = $_POST['areaOfCultivation'];
$rootingDepth = $_POST['rootingDepth'];

$depthOfWaterStoredInRoot = $dryDensity * $rootingDepth * (0.8 * ($soilMoisture / 100)) * 100;
$dailyConsuptionOfWater = ($cropWater / $areaOfCultivation) / 10;
$intervalOfDays = (int) ($depthOfWaterStoredInRoot / $dailyConsuptionOfWater);

$landPreparation = "<table>"
        . "<tr><th> CROP: COTTON </th></tr>"
        . "<tr><th> LAND PREPARATION </th></tr>"
        . "<tr><td> 1. It can be grown on all type of soil having pH ranges in-between 6 and 8. </td></tr>"
        . "<tr><td> 2. Deep, friable, well drained and fertile soil are good for crop cultivation. </td></tr>"
        . "<tr><td> 3. Sandy, saline or water logged soils are not suitable for cotton cultivation. </td></tr>"
        . "<tr><td> 4. The depth of soil should not be less than 20-25 cm. </td></tr>"
        . "<tr><td> 5. After removal of Rabi crop, irrigate field immediately then take ploughing of land with MB plough and planking. </td></tr>"
        . "<tr><td> 6. Carry out deep ploughing once in three years, it will help to keep check on perennial weeds also kill various soil borne pest and diseases. </td></tr>"
        . "</table>";

$fertilizerAppplication = "<table>"
        . "<tr><th> CROP: COTTON </th></tr>"
        . "<tr><td> 1. At the time of last ploughing apply well decomposed cow dung @ 10-20 ton per acre for irrigated soil. </td></tr>"
        . "<tr><td> 2. Apply whole dose of phosphorus in last ploughing. </td></tr>"
        . "<tr><td> 3. Apply half of Nitrogen fertilizer at time of thinning(?) and remaining half at the appearance of first flower(75-85 days).</td></tr>"
        . "<tr><td> 4. For low fertile soil, apply half dose of Nitrogen at time of sowing.  </td></tr>"
        . "<tr><td> 5. To reduce nitrogen loss from Urea mix 8 kg sulphur powder/ 50 kg Urea and apply in between rows of standing crop. </td></tr>"
        . "<tr><td> 6. Potash@5 gm/Ltr of water at evening time on 85, 95 & 105th days after sowing.  </td></tr>"
        . "<tr><td> 7. Also to get higher yield, take alternate sprays of Potassium@10 gm/Ltr and DAP@20 gm/Ltr (2-3 sprays each at 15 days interval from first blooming).  </td></tr>"
        . "</table>";

$seedTreatement = "<table>"
        . "<tr><th> CROP: COTTON </th></tr>"
        . "<tr><th> SEED TREATMENT </th></tr>"
        . "<tr><td><h4> Non-chemical method </h4></td></tr>"
        . "<tr><td> 1. Seeds are soaked in water overnight. </td></tr>"
        . "<tr><td> 2. Next day rub the seeds with cowdung and wood ash or saw dust. </td></tr>"
        . "<tr><td> 3. Dry in shed before sowing. </td></tr>"
        . "<tr><td><h4> Chemical method </h4></td></tr>"
        . "<tr><td> 1. For American cotton, mix the 400 gm <b>concentrated Sulphuric acid</b> (Industrial grade) in per 4 kg seeds. </td></tr>"
        . "<tr><td> 2. For Desi cotton, mix the 300 gm <b>concentrated Sulphuric acid</b> (Industrial grade) in per 3 kg seeds. </td></tr>"
        . "<tr><td> 3. It will burn all the fibers of seeds. </td></tr>"
        . "<tr><td> 4. Then 10 Ltr of water in container, stir well and drained out the water. </td></tr>"
        . "<tr><td> 5. Wash the seeds for three times with normal water and then lime water (Sodium Bicarbonate@50gm/10Ltr of water) for 1 min. </td></tr>"
        . "<tr><td> 6. Give one more washing then dry the seeds in shed. </td></tr>"
        . "<tr><td> 7. Do not use Metal or wood container instead use plastic or earthen pot and use plastic glove by operator for chemical method. </td></tr>"
        . "<tr><td> 8. To protect from sucking pest attacks (upto 15-20 days) treat seeds with Imidacloprid (Confidor) 5-7ml or Thiamethoxam (CRUISER)@ 5-7gm/kg of seeds. </td></tr>"
        . "<tr><td>  Fungicide name	Quantity (Dosage per kg seed) </td></tr>"
        . "<tr><td>  Imidacloprid	5-7 ml </td></tr>"
        . "<tr><td>  Thiamethoxam	5-7 gm </td></tr>"
        . "</table>";

$Sowing = "<table>"
        . "<tr><th> CROP: COTTON </th></tr>"
        . "<tr><th> Sowing Depth: </th></tr>"
        . "<tr><td> Sowing should be done at depth of 5 cm. </td></tr>"
        . "</table>";

$postEmergence = "<table>"
        . "<tr><th> CROP: COTTON </th></tr>"
        . "<tr><td> Broadcast the remaining Nitrogen (N) with the first irrigation. </td></tr>"
        . "</table>";

$sixth = "<table>"
        . "<tr><th> CROP: COTTON </th></tr>"
        . "<tr><th> Last irrigation: </th></tr>"
        . "<tr><td> Give last irrigation to the crop when 33% of bolls are opened and after that there is no need of more water through irrigation. (Boll opening: 115-125 days after sowing) </td></tr>"
        . "</table>";

$harvest = "<table>"
        . "<tr><th> CROP: COTTON </th></tr>"
        . "<tr><th> HARVESTING </th></tr>"
        . "<tr><td> 1. Picking of bolls should be done when bolls are fully mature. </tr></td> "
        . "<tr><td> 2. Avoid picking of wet bolls, pick cotton free from dry leaves trash. </tr></td>"
        . "<tr><td> 3. Damaged boll should be picked separately and discarded for seed purpose. </tr></td>"
        . "<tr><td> 4. The first and last picking are usually of low quality and should not be mixed with rest of the produce to fetch better price. </tr></td>"
        . "<tr><td> 5. Pick boll should be clean and dry to get good price. </tr></td>"
        . "<tr><td> 6. Do picking when there is no dew. </tr></td>"
        . "<tr><td> 7. Picking should be regularly done after every 7-8 days to avoid losses incurred due to fall of the cotton on ground. </tr></td>"
        . "<tr><td> 8. Delay in picking leads to falling of cotton on the ground which results in deterioration of quality. </tr></td>"
        . "<tr><td> 9. Harvest the American cotton at the interval of 15-20days and Desi cotton at 8-10 days interval. </tr></td>"
        . "<tr><td> 10. The picked kapas should be properly cleaned before taking to the market for sale. </tr></td>"
        . "</table>";

$postHarvest = "<table>"
        . "<tr><th> CROP: COTTON </th></tr>"
        . "<tr><th> POST HARVEST </th></tr>"
        . "<tr><td> After harvesting, Let the sheep, goats and other animals feed in the cotton field so that these animal can eat bollworm affected bolls and leaves. </td></tr>"
        . "<tr><td> After last picking, remove the sticks along with roots. </td></tr>"
        . "<tr><td> Bury remaining plant debris using furrow turning plough as sanitary measure. </td></tr>"
        . "<tr><td> Before stacking bundles of sticks dislodge the burs and unopened bolls by beating them on ground or pluck them and burn them to kill larvae of boll worms. </td></tr>"
        . "<tr><td> Two row tractor operated cotton stalk uprooter can be used for uprooting the stalks remained after harvest. </td></tr>"
        . "</table>";

//echo $intervalOfDays, $choice;

if ($choice == "First") {

    if ((date("m", strtotime($dateOfSowing)) == 4) || ((date("m", strtotime($dateOfSowing)) == 5) && (date("d", strtotime($dateOfSowing)) <= 15))) {
        //next irrigation
        $a = date("Y", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
        "<br>";
        $b = date("m", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
        "<br>";
        $c = date("d", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
        $nextDay = $a . "-" . $b . "-" . $c;

        //1 weeks prior
        $a = date("Y", strtotime($dateOfSowing . ' - 7 Day'));
        "<br>";
        $b = date("m", strtotime($dateOfSowing . ' - 7 Day'));
        "<br>";
        $c = date("d", strtotime($dateOfSowing . ' - 7 Day'));
        $landPreparationDate = $a . "-" . $b . "-" . $c;

        //4 days prior
        $a = date("Y", strtotime($dateOfSowing . ' - 4 Day'));
        "<br>";
        $b = date("m", strtotime($dateOfSowing . ' - 4 Day'));
        "<br>";
        $c = date("d", strtotime($dateOfSowing . ' - 4 Day'));
        $fertilizerAppplicationDate = $a . "-" . $b . "-" . $c;

        //seedTreatement
        $a = date("Y", strtotime($dateOfSowing . ' - 1 Day'));
        "<br>";
        $b = date("m", strtotime($dateOfSowing . ' - 1 Day'));
        "<br>";
        $c = date("d", strtotime($dateOfSowing . ' - 1 Day'));
        $seedTreatementDate = $a . "-" . $b . "-" . $c;

        //on the day of sowing
        $a = date("Y", strtotime($dateOfSowing . ' - 0 Day'));
        "<br>";
        $b = date("m", strtotime($dateOfSowing . ' - 0 Day'));
        "<br>";
        $c = date("d", strtotime($dateOfSowing . ' - 0 Day'));
        $SowingDate = $a . "-" . $b . "-" . $c;

        //post emergence
        $a = date("Y", strtotime($dateOfSowing . ' + 33 Day'));
        "<br>";
        $b = date("m", strtotime($dateOfSowing . ' + 33 Day'));
        "<br>";
        $c = date("d", strtotime($dateOfSowing . ' + 33 Day'));
        $postEmergenceDate = $a . "-" . $b . "-" . $c;

        $sql = "INSERT INTO events (Id,title,date) VALUES "
                . "(NULL,'CROP: COTTON <br>Time for First Irrigation','$nextDay'),"
                . "(NULL,'$landPreparation','$landPreparationDate'),"
                . "(NULL,'$fertilizerAppplication','$fertilizerAppplicationDate'),"
                . "(NULL,'$seedTreatement','$seedTreatementDate'),"
                . "(NULL,'$Sowing','$SowingDate'),"
                . "(NULL,'$postEmergence','$postEmergenceDate')";

        if (!mysqli_query($con, $sql)) {
            echo 'Not Inserted! Some error occoured...';
        } else {
            echo '<center>Inserted</center>';
            header("refresh:2; url=irrigation.php");
        }
    } else {
        echo "Not a good time to sow wheat!";
    }
}
if ($choice == "Second") {
//next irrigation
    $a = date("Y", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
    "<br>";
    $b = date("m", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
    "<br>";
    $c = date("d", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
    $nextDay = $a . "-" . $b . "-" . $c;

    $sql = "INSERT INTO events (Id,title,date) VALUES (NULL,'CROP: COTTON <br>Time for Second Irrigation','$nextDay')";

    if (!mysqli_query($con, $sql)) {
        echo 'Not Inserted! Some error occoured...';
    } else {
        echo '<center>Inserted</center>';
        header("refresh:2; url=irrigation.php");
    }
}

if ($choice == "Third") {
//next irrigation
    $a = date("Y", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
    "<br>";
    $b = date("m", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
    "<br>";
    $c = date("d", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
    $nextDay = $a . "-" . $b . "-" . $c;

    $sql = "INSERT INTO events (Id,title,date) VALUES (NULL,'CROP: COTTON <br>Time for Third Irrigation','$nextDay')";

    if (!mysqli_query($con, $sql)) {
        echo 'Not Inserted! Some error occoured...';
    } else {
        echo '<center>Inserted</center>';
        header("refresh:2; url=irrigation.php");
    }
}

if ($choice == "Fourth") {
//next irrigation
    $a = date("Y", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
    "<br>";
    $b = date("m", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
    "<br>";
    $c = date("d", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
    $nextDay = $a . "-" . $b . "-" . $c;

    $sql = "INSERT INTO events (Id,title,date) VALUES (NULL,'CROP: COTTON <br>Time for Fourth Irrigation','$nextDay')";

    if (!mysqli_query($con, $sql)) {
        echo 'Not Inserted! Some error occoured...';
    } else {
        echo '<center>Inserted</center>';
        header("refresh:2; url=irrigation.php");
    }
}

if ($choice == "Fifth") {
//next irrigation
    $a = date("Y", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
    "<br>";
    $b = date("m", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
    "<br>";
    $c = date("d", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
    $nextDay = $a . "-" . $b . "-" . $c;

    //sixth
    $a = date("Y", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 40 Day'));
    "<br>";
    $b = date("m", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 40 Day'));
    "<br>";
    $c = date("d", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 40 Day'));
    $sixthDate = $a . "-" . $b . "-" . $c;

//harvest
    $a = date("Y", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 42 Day'));
    "<br>";
    $b = date("m", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 42 Day'));
    "<br>";
    $c = date("d", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 42 Day'));
    $harvestDate = $a . "-" . $b . "-" . $c;
    
    //postHarvest
    $a = date("Y", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 43 Day'));
    "<br>";
    $b = date("m", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 43 Day'));
    "<br>";
    $c = date("d", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 43 Day'));
    $postHarvestDate = $a . "-" . $b . "-" . $c;

    $sql = "INSERT INTO events (id,title,date) VALUES (NULL,'CROP: COTTON <br>Time for Fifth Irrigation','$nextDay'),"
            . "(NULL,'$sixth','$sixthDate') , "
            . "(NULL,'$harvest','$harvestDate') , "
            . "(NULL,'$postHarvest','$postHarvestDate')";
    
    if (!mysqli_query($con, $sql)) {
        echo 'Not Inserted yooo';
    } else {
        echo '<center>Inserted</center>';
        header("refresh:2; url=irrigation.php");
    }
}
?>