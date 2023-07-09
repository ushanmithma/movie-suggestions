<?php

include 'autoloader.php';

$id = "";
$common = new Common();

$table = $_POST["table"];
$name = $_POST["name"];

$id = $common->getID($table, $name);

echo $id;
