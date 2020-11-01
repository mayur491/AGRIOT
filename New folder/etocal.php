



<?php 
define('DB_HOST', 'localhost');
define('DB_NAME', 'id3206387_cropwater');

define('DB_USER','id3206387_prash');
define('DB_PASSWORD','prash123');

$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_connect_error());
$db=mysqli_select_db($conn,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_connect_error());


if(isset($_POST['submit']))
{
$crop=mysqli_real_escape_string($conn,$_POST['crop']);
$temp = mysqli_real_escape_string($conn,$_POST['tmean']);
$temp=round($temp,0);
$query = mysqli_query($conn,"SELECT * FROM ea where temperature = '$temp'");
$row = mysqli_fetch_array($query);
$query1 = mysqli_query($conn,"SELECT * FROM ea where temperature = '(int)$_POST[tdew]'");
$row1 = mysqli_fetch_array($query1);
$u= mysqli_real_escape_string($conn,$_POST['uz']);
$u=(float)$u;
$u= 0.277778*0.748*$u;
$u=(string)$u;
$wt = mysqli_real_escape_string($conn,$_POST['tmean']);
$wt=(int)$wt;
$month=mysqli_real_escape_string($conn,$_POST['month']);
$n=mysqli_real_escape_string($conn,$_POST['n']);
$n=(int)$n;


$query2 = mysqli_query($conn,"SELECT * FROM wtemp where temperature = '$wt'");
$row2 = mysqli_fetch_array($query2);
$query3 = mysqli_query($conn,"SELECT * FROM w where temperature = '$wt'");
$row3 = mysqli_fetch_array($query3);
$query4 = mysqli_query($conn,"SELECT * FROM ra where month = '$month'");
$query5 = mysqli_query($conn,"SELECT * FROM kc where crop = '$crop'");
$row5 = mysqli_fetch_array($query5);
$row4 = mysqli_fetch_array($query4);
$area=mysqli_real_escape_string($conn,$_POST['area']);

$row4['N']=(float)$row4['N'];
$rs=(float)0.5*$n/$row4['N'];
$rs=$rs+0.25;
$row4['ra']=(float)$row4['ra'];
$rs=$rs*$row4['ra'];
$rns=(float)0.75*$rs;
$fnN=(float)0.1 + 0.9*$n/$row4['N'];
$fu=(float)1+$u/100;
$fu=0.27*$fu;

echo "Ea:<input type='text' value='$row[ea]'/>";
echo "Ed:<input type='text' value='$row1[ed]'/>";
$diff= $row['ea']-$row1['ed'];
echo "Ea-Ed:<input type='text' value='$diff'/>";
echo "<br><br>";
echo "Mean temperature: <input type='text' value='$temp'/>";
echo "<br><br>";
echo "Wind speed at 2m :<input type='text' value='$u'/>\r\n";
echo "<br><br>";
echo "1-W :<input type='text' value='$row2[w]'/>";
echo "<br><br>";
echo "W :<input type='text' value='$row3[w]'/>";
echo "<br><br>";
echo "Month :<input type='text' value='$row4[month]'/>";
echo "<br><br>";
echo "Ra :<input type='text' value='$row4[ra]'/>";
echo "<br><br>";
echo "Number of sunshine hours :<input type='text' value='$row4[N]'/>";
echo "<br><br>";
echo "f(n/N)= <input type='text' value='$fnN'/>";
echo "<br><br>";
echo "Rs : <input type='text' value='$rs'/>";
echo "<br><br>";
echo "Rns : <input type='text' value='$rns'/>";
echo "<br><br>";
echo "f(T): <input type='text' value='$row[ft]'/>";
echo "f(ed): <input type='text' value='$row1[fed]'/>";
$Rnl= (float)$fnN*$row['ft']*$row1['fed'];
echo "Rnl : <input type='text' value='$Rnl'/>";
$Rn=(float)$rns-$Rnl;
echo "Rn : <input type='text' value='$Rn'/>";
$eto=(float)$row2['w']*$fu*$diff;
$eto=$eto+$row3['w']*$Rn;
$eto=1.05*$eto;
echo "<br><br>";
echo "ETo : <input type='text' value='$eto'/>";
echo "Kc initial : <input type='text' value='$row5[initial]'/>";
$etcini=$eto*$row5['initial'];
echo "ETc initial : <input type='text' value='$etcini'/>";
echo "<br><br>";
$cwrini= $etcini*$area;
$cwrini=round($cwrini,2);
echo "<br><br>";
echo "Water requirement in L: <input type='text' value='$cwrini'/>";



}

?>
