<?php

include 'autoloader.php';

$errors = array();

$update = new Update();
$common = new Common();

$id = mysqli_real_escape_string(mysqliConnect(), $_POST["id"]);
$name = mysqli_real_escape_string(mysqliConnect(), $_POST["name"]);
$genres = explode(",", $_POST["genres"]);
foreach ($genres as $i => $genre) {
	$genre = mysqli_real_escape_string(mysqliConnect(), $genre);
}
$movie_list = $_POST["movieList"];
if (!empty($movie_list)) {
	$movieIDArray = explode(",", $_POST["movieList"]);
	foreach ($movieIDArray as $i => $item) {
		$item = mysqli_real_escape_string(mysqliConnect(), $item);
	}
}
$tv_series_list = $_POST["tvSeriesList"];
if (!empty($tv_series_list)) {
	$tvSeriesArray = explode(",", $_POST["tvSeriesList"]);
	foreach ($tvSeriesArray as $i => $item) {
		$item = mysqli_real_escape_string(mysqliConnect(), $item);
	}
}
if (empty(trim($id))) {
	$errors[] = "Sorry, updated process can't be completed at this moment!";
} else if (empty(trim($name))) {
	$errors[] = "Please fill the fields!";
} else if (empty($_POST["genres"])) {
	$errors[] = "Please select at least one genre to proceed!";
} else if ($common->notExists("tv_series", "name", $common->getPretty(trim($name)), $id)) {
	$errors[] = "<b>" . $name . "</b> is already exists in database!";
} else {

	if (empty($movie_list) && empty($tv_series_list)) {

		if ($update->updateTVSeries($id, $common->getPretty(trim($name)), $genres, $movie_list, $tv_series_list)) {
			$errors[] = "<span class=\"success\"><b>" . $name . "</b> is updated!</span>";
		} else {
			$errors[] = "Sorry, something went wrong!";
		}

	} else if (!empty($movie_list) && empty($tv_series_list)) {

		if ($update->updateTVSeries($id, $common->getPretty(trim($name)), $genres, $movieIDArray, $tv_series_list)) {
			$errors[] = "<span class=\"success\"><b>" . $name . "</b> is updated!</span>";
		} else {
			$errors[] = "Sorry, something went wrong!";
		}

	} else if (empty($movie_list) && !empty($tv_series_list)) {

		if ($update->updateTVSeries($id, $common->getPretty(trim($name)), $genres, $movie_list, $tvSeriesArray)) {
			$errors[] = "<span class=\"success\"><b>" . $name . "</b> is updated!</span>";
		} else {
			$errors[] = "Sorry, something went wrong!";
		}

	} else if (!empty($movie_list) && !empty($tv_series_list)) {

		if ($update->updateTVSeries($id, $common->getPretty(trim($name)), $genres, $movieIDArray, $tvSeriesArray)) {
			$errors[] = "<span class=\"success\"><b>" . $name . "</b> is updated!</span>";
		} else {
			$errors[] = "Sorry, something went wrong!";
		}

	}


}


#$data = array('errors' => $errors);

echo json_encode($errors);
