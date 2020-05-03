<?php

require '../connection.php';

$data = $_GET;

try {
	$insertWard = "INSERT INTO ward (id_ward, name) VALUES (?,?)";
	$dbh_insert = $dbh->prepare($insertWard);
	if ($dbh_insert->execute([$data['ward_id'],$data['ward_name']])) {
		echo "Палата успешно добавлена в базу данных";
	} else {
		echo "Ошибка!";
	}
} catch (Exception $e) {
	echo $e;
}
