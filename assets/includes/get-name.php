<?php

include 'autoloader.php';

$name = "";
$retrieve = new Retrieve();

$table = $_POST["table"];
$id = $_POST["id"];

$name = $retrieve->getName($table, "id", $id);

echo $name["name"];
