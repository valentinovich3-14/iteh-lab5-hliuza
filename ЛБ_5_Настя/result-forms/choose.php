<?php

require '../connection.php';


$nurse = $_GET["nursechoose"];

$nursestart = "SELECT ward.Name FROM ward , nurse_ward , nurse where id_ward = fid_ward and fid_nurse = id_nurse and nurse.name = '". $nurse ."'";

foreach ($dbh->query($nursestart) as $row) {
    echo $row['Name'] . '<br>';
}