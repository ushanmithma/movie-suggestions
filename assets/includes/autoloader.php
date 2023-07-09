<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
	$path = "../class/";
	$extension = ".php";
	$fullPath = $path . $className . $extension;

	if (!file_exists($fullPath)) {
		return false;
	}

	include_once $fullPath;
}

function mysqliConnect() {
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'suggests';

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (mysqli_connect_errno()) {
		die('Database connection failed ' . mysqli_connect_errno());
		exit();
	}

	return $connection;
}
