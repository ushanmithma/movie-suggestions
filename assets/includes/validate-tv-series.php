<?php

include 'autoloader.php';

$errors = array();

$save = new Save();
$common = new Common();

$name = mysqli_real_escape_string(mysqliConnect(), $_POST["name"]);
$genres = explode(",", $_POST["genres"]);
foreach ($genres as $i => $genre) {
	$genre = mysqli_real_escape_string(mysqliConnect(), $genre);
}

if (empty(trim($name))) {
	$errors[] = "Please enter series name!";
} else if (empty($_POST["genres"])) {
	$errors[] = "Please select at least one genre to proceed!";
} else if ($common->exists("tv_series", "name", $common->getPretty(trim($name)))) {
	$errors[] = "<b>" . $name . "</b> is already exists in database!";
} else {

	if ($save->saveSeries($common->getPretty(trim($name)), $genres)) {
		$errors[] = "<span class=\"success\"><b>" . $name . "</b> is saved!</span>";
	} else {
		$errors[] = "Sorry, something went wrong!";
	}

}


#$data = array('errors' => $errors);

echo json_encode($errors);
