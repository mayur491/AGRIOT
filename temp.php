<?php

$user = 'root';
$pass = '';
$db = 'agridb';

$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

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

$landPreparation = "LAND PREPARATION <br>After paddy: 1. Use disc harrow (bullock or tractor drawn) once, followed by planking. <br> After other crops : 1. After rauni give two ploughings with a tractor-drawn cultivator/bullock drawn stirring plough to be followed by planking.";
$fym = "FYM APPLICATION <br>Well rotten farmyard manure or compost should be applied.";
$seedTreatement = "SEED TREATMENT<br>1. First treat the seed with 4ml Dursban/ Ruban/Durmet 20 EC (chlorpyriphos) or 7ml Thiodan 35 EC (endosulfan) or 6 ml Regent 5%SC (fipronil) per kg seed <br>2. Dry the seed in shade.<br>3. Treat the seed of all varieties except that of PDW 291, PDW 274, PDW 233, TL 2908 and TL 1210 with Vitavax @ 2g/kg or Raxil @ 1 g/kg or Bavistin/ Agrozim/Derosal/JK Stein/Sten 50/ProvaxlBencor @ 2.5g/kg seed for the control of loose smut.<br>4. Treat the seed with Captan orThiram @ 3g/kg (300g/quintal) seed. Use Captan/Thiram, if the seed is infected with black tip and head scab. ";
$Sowing = "SOWING<br>1. Sow wheat after a heavy pre-sowing irrigation (10 cm) except when it follows rice.<br>2. Seed rate- A seed-rate of 35kg per acre for WH542 and 40 kg for all other varieties is recommended.<br>3. Sow with a seed-cum-fertilizer drill at a depth of 4-6 cm.<br>4. A spacing of 20-22 cm between the rows gives good yield. However, closer spacing of 15 cm gives additional yield.<br>5. Give light planking after completing the sowing for the best result, make sure that there is enough soil moisture at the time of sowing.<br>6. Drill 1/2 dose of N and whole of P and K.<br>Note: If FYM has been applied, for every quintal applied, reduce he fertilizer quantity by 0.2 kg of nitrogen and 0.1 kg of phosphorus.<br>Note: If nitrogen is to be applied in the form of UREA, apply half of the dose just before pre-sowing irrigation (raum), the second dose within 7 days before or up to 5 days after first irrigation.    ";
$postEmergence = "Broadcast the remaining N with the first irrigation.";
$sixth = "Last irrigation: only upto 2-3 cm depth to ensure that the crop does not dry out.";
$harvest = "HARVESTING<br>Harvesting stage comes when normally the plant turns golden yellow and becomes brittle. The grains become hard and the straw turns dry. The crop should be harvested at physiological maturity when the grain moisture is around 19-20%.<br><br>The harvesting of wheat can be started five days earlier than dead ripe stage without adverse effect on the yield or quality of the grains.";
$threshing = "THRESHING<br>1. If the harvesting is done with the help of combine harvester then there is no need for threshing the grains as the out put is already in the from of threshed grain.
<br>2. In other cases do threshing by power-operated threshers OR By threading the head of the wheat with the bullock cart. OR By beating them with the help of bamboo sticks. OR By running the tractor over the heads.<br>3. Dry grains on the threshing floor.";
$drying = "DRYING<br>The grains are dried by spreading out the grain on the threshing floor or on a pucca floor in the sun.";
$storing = "STORAGE<br>Store the grains.";

echo $intervalOfDays , $choice;

    if ($choice == "First") {

        if ((date("m", strtotime($dateOfSowing)) == 10) || ((date("m", strtotime($dateOfSowing)) == 11))) {
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
        $fymDate = $a . "-" . $b . "-" . $c;

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
                . "(NULL,'Time for First Irrigation','$nextDay'),"
                . "(NULL,'$landPreparation','$landPreparationDate'),"
                . "(NULL,'$fym','$fymDate'),"
                . "(NULL,'$seedTreatement','$seedTreatementDate'),"
                . "(NULL,'$Sowing','$SowingDate'),"
                . "(NULL,'$postEmergence','$postEmergenceDate')";

        if (!mysqli_query($con, $sql)) {
            echo 'Not Inserted! Some error occoured...';
        } else {
            //echo 'Inserted';
            header("refresh:0; url=irrigation.php");
        }
        } else {
        echo "Not a good time to sow wheat!";
    }
    } /* else if ((date("m", strtotime($dateOfSowing)) == 11) || ((date("m", strtotime($dateOfSowing)) == 12) && (date("d", strtotime($dateOfSowing)) < 20))) {
      //1st irrigation
      $a = date("Y", strtotime($dateOfSowing . ' + 28 Day'));
      "<br>";
      $b = date("m", strtotime($dateOfSowing . ' + 28 Day'));
      "<br>";
      $c = date("d", strtotime($dateOfSowing . ' + 28 Day'));
      echo $first = $a . "-" . $b . "-" . $c;

      //2nd irrigation
      $a = date("Y", strtotime($dateOfSowing . ' + 39 Day'));
      "<br>";
      $b = date("m", strtotime($dateOfSowing . ' + 39 Day'));
      "<br>";
      $c = date("d", strtotime($dateOfSowing . ' + 39 Day'));
      echo $second = $a . "-" . $b . "-" . $c;

      //3rd irrigation
      $a = date("Y", strtotime($dateOfSowing . ' + 63 Day'));
      "<br>";
      $b = date("m", strtotime($dateOfSowing . ' + 63 Day'));
      "<br>";
      $c = date("d", strtotime($dateOfSowing . ' + 63 Day'));
      echo $third = $a . "-" . $b . "-" . $c;

      //4th irrigation
      $a = date("Y", strtotime($dateOfSowing . ' + 93 Day'));
      "<br>";
      $b = date("m", strtotime($dateOfSowing . ' + 93 Day'));
      "<br>";
      $c = date("d", strtotime($dateOfSowing . ' + 93 Day'));
      echo $fourth = $a . "-" . $b . "-" . $c;

      //5th irrigation
      $a = date("Y", strtotime($dateOfSowing . ' + 107 Day'));
      "<br>";
      $b = date("m", strtotime($dateOfSowing . ' + 107 Day'));
      "<br>";
      $c = date("d", strtotime($dateOfSowing . ' + 107 Day'));
      echo $fifth = $a . "-" . $b . "-" . $c;

      //6th irrigation
      $a = date("Y", strtotime($dateOfSowing . ' + 145 Day'));
      "<br>";
      $b = date("m", strtotime($dateOfSowing . ' + 145 Day'));
      "<br>";
      $c = date("d", strtotime($dateOfSowing . ' + 145 Day'));
      echo $sixth = $a . "-" . $b . "-" . $c;

      $sql = "INSERT INTO events (Id,title,date) VALUES (NULL,'Time for 1st Irrigation','$first') , (NULL,'Time for 2nd Irrigation','$second') , (NULL,'Time for 3rd Irrigation','$third') , (NULL,'Time for 4th Irrigation','$fourth') , (NULL,'Time for 5th Irrigation','$fifth') , (NULL,'Time for 6th Irrigation','$sixth')";
      if (!mysqli_query($con, $sql)) {
      echo 'Not Inserted! Some error occoured...';
      } else {
      //echo 'Inserted';
      header("refresh:0; url=irrigation.php");
      }
      } */



    /* 2nd Irrigation
      $a = date("Y", strtotime($Y . ' - 0 Day'));
      "<br>";
      $b = date("m", strtotime($Y . ' - 0 Day'));
      "<br>";
      $c = date("d", strtotime($Y . ' - 0 Day'));
      $secondIrriragtionDate = $a . "-" . $b . "-" . $c; */

    /* 3rd Irrigation
      $a = date("Y", strtotime($Y . ' - 0 Day'));
      "<br>";
      $b = date("m", strtotime($Y . ' - 0 Day'));
      "<br>";
      $c = date("d", strtotime($Y . ' - 0 Day'));
      $thirdIrrigationDate = $a . "-" . $b . "-" . $c; */

    /* 4th Irrigation
      $a = date("Y", strtotime($Y . ' - 0 Day'));
      "<br>";
      $b = date("m", strtotime($Y . ' - 0 Day'));
      "<br>";
      $c = date("d", strtotime($Y . ' - 0 Day'));
      $fourthIrrigationDate = $a . "-" . $b . "-" . $c; */ 
    

    if ($choice == "Second") {
//next irrigation
        $a = date("Y", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
        "<br>";
        $b = date("m", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
        "<br>";
        $c = date("d", strtotime($dateOfSowing . '+' . $intervalOfDays . ' Day'));
        $nextDay = $a . "-" . $b . "-" . $c;

        $sql = "INSERT INTO events (Id,title,date) VALUES (NULL,'Time for Second Irrigation','$nextDay')";

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

        $sql = "INSERT INTO events (Id,title,date) VALUES (NULL,'Time for Third Irrigation','$nextDay')";

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

        $sql = "INSERT INTO events (Id,title,date) VALUES (NULL,'Time for Fourth Irrigation','$nextDay')";

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

//threshing
        $a = date("Y", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 47 Day'));
        "<br>";
        $b = date("m", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 47 Day'));
        "<br>";
        $c = date("d", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 47 Day'));
        $threshingDate = $a . "-" . $b . "-" . $c;

//drying
        $a = date("Y", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 49 Day'));
        "<br>";
        $b = date("m", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 49 Day'));
        "<br>";
        $c = date("d", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 49 Day'));
        $dryingDate = $a . "-" . $b . "-" . $c;

//storing
        $a = date("Y", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 55 Day'));
        "<br>";
        $b = date("m", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 55 Day'));
        "<br>";
        $c = date("d", strtotime($dateOfSowing . '+' . $intervalOfDays . ' + 55 Day'));
        $storingDate = $a . "-" . $b . "-" . $c;

       /* $sql = "INSERT INTO events (Id,title,date) VALUES "
                . "(NULL,'Time for Fifth Irrigation','$nextDay') , "
                . "(NULL,'$sixth','$sixthDate') , "
                . "(NULL,'$harvest','$harvestDate') , "
                . "(NULL,'$threshing','$threshingDate') , "
                . "(NULL,'$drying','$dryingDate') , "
                . "(NULL,'$storing','$storingDate')";*/
        
        $sql="INSERT INTO events (id,title,date) VALUES (NULL,'Time for Fifth Irrigation','$nextDay'),"
                . "(NULL,'$sixth','$sixthDate') , "
                . "(NULL,'$harvest','$harvestDate') , "
                . "(NULL,'$threshing','$threshingDate') , "
                . "(NULL,'$drying','$dryingDate') , "
                . "(NULL,'$storing','$storingDate')";
        

        if (!mysqli_query($con, $sql)) {
            echo 'Not Inserted yooo';
        } else {
            echo '<center>Inserted</center>';
            header("refresh:2; url=irrigation.php");
        }
    }
?>