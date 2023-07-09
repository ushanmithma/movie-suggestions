<?php

include "autoloader.php";

$data = array();

$common = new Common();

if (isset($_POST["table"]) && !empty($_POST["table"])) {
	foreach ($common->getNameList($_POST["table"]) as $row) {
		$data[] = $row["name"];
	}
}

echo json_encode($data);
