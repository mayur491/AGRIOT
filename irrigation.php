<?php
// Set your timezone!!
date_default_timezone_set('Asia/Kolkata');
 
// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}
 
// Check format
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $timestamp = time();
}
 
// Today
$today = date('Y-m-j', time());
 
// For H3 title
$html_title = date('Y / m', $timestamp);
 
// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
 
// Number of days in the month
$day_count = date('t', $timestamp);
 
// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
 
 
// Create Calendar!!
$weeks = array();
$week = '';
 
// Add empty cell
$week .= str_repeat('<td></td>', $str);
 
/*
//Connect to database
$pdo = connectDB();

for($day = 1; $day <= $day_count; $day++, $str++){
    
    $date = $ym . '-' .$day; //format example: 2017-04-3
    
    //Get schedules by date.
    $sql = 'SELECT * from schedules WHERE CAST(star)';   //incomple strt here.........
}
*/
for ( $day = 1; $day <= $day_count; $day++, $str++) {
     
    $date = $ym.'-'.$day;
     
    if ($today == $date) {
        $week .= '<td class="today">'.$day;
    } else {
        $week .= '<td>'.$day;
    }
    $week .= '</td>';
     
    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {
         
        if($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }
         
        $weeks[] = '<tr>'.$week.'</tr>';
         
        // Prepare for new week
        $week = '';
         
    }
 
}
 
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>PHP Calendar</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
    <style>
        .container {
            font-family: 'Noto Sans', sans-serif;
            margin-top: 80px;
        }
        th {
            height: 30px;
            text-align: center;
            font-weight: 700;
        }
        td {
            height: 100px;
        }
        .today {
            background: orange;
        }
        th:nth-of-type(7),td:nth-of-type(7) {
            color: blue;
        }
        th:nth-of-type(1),td:nth-of-type(1) {
            color: red;
        }
    </style>
     
</head>
<body>
    <div class="container">
        <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>S</th>
                <th>M</th>
                <th>T</th>
                <th>W</th>
                <th>T</th>
                <th>F</th>
                <th>S</th>
            </tr>
            <?php
                foreach ($weeks as $week) {
                    echo $week;
                }   
            ?>
        </table>
    </div>
</body>
</html>