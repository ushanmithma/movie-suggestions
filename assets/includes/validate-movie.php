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
$year = mysqli_real_escape_string(mysqliConnect(), $_POST["year"]);

if (empty(trim($name)) || empty(trim($year))) {
	$errors[] = "Please fill the fields!";
} else if (empty($_POST["genres"])) {
	$errors[] = "Please select at least one genre to proceed!";
} else if (!is_numeric(trim($year)) || strlen(trim($year)) != 4 || trim($year) < 1895 || trim($year) > date("Y")) {
	$errors[] = "<b>" . $year . "</b> is not acceptable date!";
} else if ($common->exists("movie", "name", $common->getPretty(trim($name)))) {
	$errors[] = "<b>" . $name . "</b> is already exists in database!";
} else {

	if ($save->saveMovie($common->getPretty(trim($name)), $genres, trim($year))) {
		$errors[] = "<span class=\"success\"><b>" . $name . "</b> is saved!</span>";
	} else {
		$errors[] = "Sorry, something went wrong!";
	}

}


#$data = array('errors' => $errors);

echo json_encode($errors);
