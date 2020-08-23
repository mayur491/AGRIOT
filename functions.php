<?php
/*
 * Function requested by Ajax
 */
if (isset($_POST['func']) && !empty($_POST['func'])) {
    switch ($_POST['func']) {
        case 'getCalender':
            getCalender($_POST['year'], $_POST['month']);
            break;
        case 'getEvents':
            getEvents($_POST['date']);
            break;
        default:
            break;
    }
}

/*
 * Get calendar full HTML
 */

function getCalender($year = '', $month = '') {
    $dateYear = ($year != '') ? $year : date("Y");
    $dateMonth = ($month != '') ? $month : date("m");
    $date = $dateYear . '-' . $dateMonth . '-01';
    $currentMonthFirstDay = date("N", strtotime($date));
    $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN, $dateMonth, $dateYear);
    $totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7) ? ($totalDaysOfMonth) : ($totalDaysOfMonth + $currentMonthFirstDay);
    $boxDisplay = ($totalDaysOfMonthDisplay <= 35) ? 35 : 42;
    ?>
    <div id="calender_section">

        <div class="container">
            <h4>Month & Year</h4>
            <div class="input-group">
                <select name="month_dropdown" class="month_dropdown dropdown"><?php echo getAllMonths($dateMonth); ?></select>
            </div>
            <div class="input-group">
                <select name="year_dropdown" class="year_dropdown dropdown"><?php echo getYearList($dateYear); ?></select>
            </div>
        </div>
        <center>
            <h3><pre><a href="javascript:void(0);" onclick="getCalendar('calendar_div', '<?php echo date("Y", strtotime($date . ' - 1 Month')); ?>', '<?php echo date("m", strtotime($date . ' - 1 Month')); ?>');">&lt;&lt;</a>     <a align="center" onclick="add()">Add Event</a>     <a href="javascript:void(0);" onclick="getCalendar('calendar_div', '<?php echo date("Y", strtotime($date . ' + 1 Month')); ?>', '<?php echo date("m", strtotime($date . ' + 1 Month')); ?>');">&gt;&gt;</a></pre></h3>
        </center>

        <div id="demo" class="container" style="display: none">
            <form action="addEvent.php" method="post">
                <div class="input-group">
                    <h4>Which Crop? : </h4>
                    <select name="cropName">
                        <option value="Wheat">Wheat</option>
                        <option value="Cotton">Cotton</option>
                    </select>
                </div>
                <div class="input-group">
                    <h4>Which Irrigation? : </h4>
                    <select name="choice">
                        <option value="First">First Irrigation</option>
                        <option value="Second">Second Irrigation</option>
                        <option value="Third">Third Irrigation</option>
                        <option value="Fourth">Fourth Irrigation</option>
                        <option value="Fifth">Fifth Irrigation</option>
                    </select>
                </div>
                <div class="input-group">
                    <h4>Date of Sowing/ Previous Irrigation: </h4><input required type="date" name="dateOfSowing" placeholder="Date of sowing"/>
                </div>
                <div class="input-group">
                    <h4>Soil moisture (%): </h4><input required type="text" name="soilMoisture" placeholder="Soil Moisture"/>
                </div>
                <div class="input-group">
                    <h4>Dry density of soil (g/cc) (if value is greater than 1.6 it will restrict the growth of roots): </h4><input required type="text" name="dryDensity" placeholder="Dry density of soil"/>
                </div>
                <div class="input-group">
                    <h4>Crop water (liters): </h4><input required type="text" name="cropWater" placeholder="Crop water"/>
                </div>
                <div class="input-group">
                    <h4>Area of cultivation (meter square): </h4><input required type="text" name="areaOfCultivation" placeholder="Area of cultivation"/>
                </div>
                <div class="input-group">
                    <h4>Rooting Depth (m): </h4><input required type="text" name="rootingDepth" placeholder="Rooting Depth"/>
                </div>
                <div class="input-group">
                    <input value="Submit" name="submit" type="submit">
                </div>
            </form>
        </div>

        <pre>
        </pre>
        <div id="event_list" class="none"></div>
        <div id="calender_section_top">
            <ul>
                <li><h4>SUN</h4></li>
                <li><h4>MON</h4></li>
                <li><h4>TUE</h4></li>
                <li><h4>WED</h4></li>
                <li><h4>THU</h4></li>
                <li><h4>FRI</h4></li>
                <li><h4>SAT</h4></li>
            </ul>
        </div>
        <div id="calender_section_bot">
            <ul>
                <?php
                $dayCount = 1;
                for ($cb = 1; $cb <= $boxDisplay; $cb++) {
                    if (($cb >= $currentMonthFirstDay + 1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)) {
                        //Current date
                        $currentDate = $dateYear . '-' . $dateMonth . '-' . $dayCount;
                        $eventNum = 0;
                        //Include db configuration file
                        include 'dbConfig.php';
                        //Get number of events based on the current date
                        $result = $db->query("SELECT title FROM events WHERE date = '" . $currentDate . "' AND status = 1");
                        $eventNum = $result->num_rows;
                        //Define date cell color
                        if (strtotime($currentDate) == strtotime(date("Y-m-d"))) {
                            echo '<li date="' . $currentDate . '" class="grey date_cell">';
                        } elseif ($eventNum > 0) {
                            echo '<li date="' . $currentDate . '" class="light_sky date_cell">';
                        } else {
                            echo '<li date="' . $currentDate . '" class="date_cell">';
                        }
                        //Date cell
                        echo '<span>';
                        echo $dayCount;
                        echo '</span>';

                        //Hover event popup
                        if ($eventNum > 0) {
                            echo '<div id="date_popup_' . $currentDate . '" class="date_popup_wrap none">';
                            echo '<div class="date_window">';
                            echo '<div class="popup_event">Events (' . $eventNum . ')</div>';
                            echo ($eventNum > 0) ? '<a href="javascript:;" onclick="getEvents(\'' . $currentDate . '\');"><h4>view events</h4></a>' : '';
                            echo '</div></div>';
                        }
                        echo '</li>';
                        $dayCount++;
                        ?>
                    <?php } else { ?>
                        <li><span>&nbsp;</span></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>

    <script type="text/javascript">
        function getCalendar(target_div, year, month) {
            $.ajax({
                type: 'POST',
                url: 'functions.php',
                data: 'func=getCalender&year=' + year + '&month=' + month,
                success: function (html) {
                    $('#' + target_div).html(html);
                }
            });
        }

        function getEvents(date) {
            $.ajax({
                type: 'POST',
                url: 'functions.php',
                data: 'func=getEvents&date=' + date,
                success: function (html) {
                    $('#event_list').html(html);
                    $('#event_list').slideDown('slow');
                }
            });
        }

        function addEvent(date) {
            $.ajax({
                type: 'POST',
                url: 'functions.php',
                data: 'func=addEvent&date=' + date,
                success: function (html) {
                    $('#event_list').html(html);
                    $('#event_list').slideDown('slow');
                }
            });
        }

        $(document).ready(function () {
            $('.date_cell').mouseenter(function () {
                date = $(this).attr('date');
                $(".date_popup_wrap").fadeOut();
                $("#date_popup_" + date).fadeIn();
            });
            $('.date_cell').mouseleave(function () {
                $(".date_popup_wrap").fadeOut();
            });
            $('.month_dropdown').on('change', function () {
                getCalendar('calendar_div', $('.year_dropdown').val(), $('.month_dropdown').val());
            });
            $('.year_dropdown').on('change', function () {
                getCalendar('calendar_div', $('.year_dropdown').val(), $('.month_dropdown').val());
            });
            $(document).click(function () {
                $('#event_list').slideUp('slow');
            });
        });

        function add() {
            var x = document.getElementById("demo");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <?php
}

/*
 * Get months options list.
 */

function getAllMonths($selected = '') {
    $options = '';
    for ($i = 1; $i <= 12; $i++) {
        $value = ($i < 10) ? '0' . $i : $i;
        $selectedOpt = ($value == $selected) ? 'selected' : '';
        $options .= '<option value="' . $value . '" ' . $selectedOpt . ' >' . date("F", mktime(0, 0, 0, $i + 1, 0, 0)) . '</option>';
    }
    return $options;
}

/*
 * Get years options list.
 */

function getYearList($selected = '') {
    $options = '';
    for ($i = 2015; $i <= 2025; $i++) {
        $selectedOpt = ($i == $selected) ? 'selected' : '';
        $options .= '<option value="' . $i . '" ' . $selectedOpt . ' >' . $i . '</option>';
    }
    return $options;
}

/*
 * Get events by date
 */

function getEvents($date = '') {
    ?>
    <div class="container">
        <?php
        //Include db configuration file
        include 'dbConfig.php';
        $eventListHTML = '';
        $date = $date ? $date : date("Y-m-d");
        //Get events based on the current date
        $result = $db->query("SELECT title FROM events WHERE date = '" . $date . "' AND status = 1");
        if ($result->num_rows > 0) {
            $eventListHTML = '<h4>Events on ' . date("l, d M Y", strtotime($date)) . '</h2>';
            $eventListHTML .= '<ul>';
            while ($row = $result->fetch_assoc()) {
                $eventListHTML .= '<li> ' . $row['title'] . '</li>';
            }
            $eventListHTML .= '</ul>';
        }
        echo $eventListHTML;
        ?>
    </div>
    <?php
}
?>