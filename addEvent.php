<?php

$cropName = $_POST['cropName'];

if($cropName == "Wheat"){
    include 'irrigationWheat.php';
}

else if($cropName == "Cotton"){
    include 'irrigationCotton.php';
}

?>