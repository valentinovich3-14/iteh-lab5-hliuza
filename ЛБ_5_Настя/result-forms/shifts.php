<?php

require '../connection.php';


$shift = $_GET["shift_choose"];

$shiftstart = "SELECT name, date, department FROM nurse WHERE shift = '". $shift ."'";

if (!empty($shiftstart)) {
	echo "В выбранную смену будут дежурить (Имя медсестры — время — отделение):".'<br><br>';
	foreach ($dbh->query($shiftstart) as $row) {
		echo $row['name'].' — '.$row['date'].' — '. $row['department']. '<br>';
	}
}