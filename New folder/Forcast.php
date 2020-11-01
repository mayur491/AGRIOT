<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>mean total</title>

<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />

<style type="text/css">
/*<![CDATA[*/
#container {
     width:700px;
     border:3px double #000;
     background:#ccc;
     margin:20px auto;
}
#container input {
     width:98px;
}
#container div {
     margin:50px 70px;
 }
/*//]]>*/
#grad1{
    background: linear-gradient(#FAE6ED, black);
}
table {
   
    width: 50%;
    border-top: 3px solid !important;
}

table, td {
    border: 1px solid black;
    text-align: center;
    
}
tr:nth-child(even){background-color: #f2f2f2}

th{
    background-color: #4CAF50;
    color: white;
}
</style>

<script type="text/javascript">
//<![CDATA[
function doSums(what) {
  var df=document.forms[0];
  var a=parseFloat(df[0].value);
  var b=parseFloat(df[1].value);
  

if(what=="mean") {
    df[3].value=(a+b)/2;
  }

 }
//]]>
</script>

</head>
<div id="grad1">
<?php
 function Signin(){
    $key = "4153d0a630f54aa6b6f72834171510";
    $forcast_days='1';
    $city = 'vasai';
    $url ="http://api.apixu.com/v1/forecast.json?key=$key&q=$city&days=$forcast_days&=";
    
    $ch = curl_init();  
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    
    $json_output=curl_exec($ch);
    $weather = json_decode($json_output);
    
    
    $days = $weather->forecast->forecastday;
    
    foreach ($days as $day){
        
    echo "<table>";    
        echo "<tr><td colspan='4' border='0'><h2>{$day->date}</h2> Sunrise: {$day->astro->sunrise} <br> Sunset: {$day->astro->sunset}"
        . "<br> condition: {$day->day->condition->text} <img src=' {$day->day->condition->icon}'/></td></tr>";
        
        echo "<tr><td>&nbsp;</td><th>Max.<br>Temperature</th><th>Min.<br>Temperature</th><th>Avg.<br>Temperature</th></tr>";
        
        echo "<tr><td>&deg;C</td><td>{$day->day->maxtemp_c}</td><td>{$day->day->mintemp_c}</td><td>{$day->day->avgtemp_c}</td></tr>";
       
        
        echo "<tr><th><h4> Max Wind Speed</h4></th><td colspan='3'>{$day->day->maxwind_kph}kph </td></tr>";
        
        foreach ($day->hour as $hr){
            
            echo "<tr><td colspan='4' border='0'>";
            echo "<table style='width:100%;'>";    
             
            echo "<tr><td>Time</td><td>Temperature</td><td>Wind</td><td>Humidity</td><td>Dew Point</td></tr>";
            echo "<tr><td><div>{$hr->time}<img src=' {$hr->condition->icon}'/></div></td><td>{$hr->temp_c}&deg;C<br></td><td> <br> {$hr->wind_kph}kph</td><td>$hr->humidity</td><td> <br> {$hr->dewpoint_c}&deg;C</td></tr>";
             
            echo "</table></tr></td>";
        }
    echo "</table> <br>";        

        
    }}
    
    if(isset($_POST['submit']))
    {
        Signin();
    }
    
?>
<body onload="document.forms[0][0].focus()">

<form method="POST" action="etocal.php">
<div id="container">
    
<div><input type="text"/> Tmax</div>
<div><input type="text"/> Tmin</div>
<div>

<input type="button" value="average" onclick="doSums('mean')"/>
<input type="text" name="tmean"/>
</div>
<div>
<input type="text" name="tdew"/> Tdew (Degree Celsius)
</div>
<div>
    <input type="text" name="uz"/> Enter wind speed at 10m (kph)
</div>
<div><input type="text" name="month"/>Enter month</div>
<div><input type="text" name="n"/>Enter the hour</div>
<center><div>Crop : <select name="crop">
            <option value="banana">Banana</option>
            <option value="wheat">Wheat</option>
            <option value="sorghum">Sorghum</option>
            <option value="groundnut">Groundnut</option>
            <option value="cotton">Cotton</option>
           </select></div><div>Enter area for cultivation (m x m): <input type='text' name="area"/></div></center>
<div><input id="submit" type="submit" name="submit" value="Submit">
<input type="reset" value="reset" onclick="document.forms[0][0].focus()"/></div>
</div>
</form>
</div>
</body>
</html>

