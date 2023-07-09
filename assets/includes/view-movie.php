<?php

include 'autoloader.php';

$retrieve = new Retrieve();
$data = array();
$row_count = $retrieve->getRowCount("movie");

if (isset($_GET['id']) and !empty($_GET['id']) and $_GET['id'] >= 1 and $_GET['id'] <= $row_count) {

	$id = $_GET["id"];
	$data = $retrieve->getMovieViewData("movie", $id);

	foreach ($data as $column => $value) {
		
		switch ($column) {
			case 'id':
				$item_id = $value;
			case 'name':
				$name = $value;
				break;
			case 'year':
				$year = $value;
				break;
			case 'genre':
				$genre = $value;
				break;
			
			default:
				# code...
				break;
		}

	}

} else {
	header('Location: ../../search-movie.php');
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- <link rel="icon" href="./assets/img/favicon.png" sizes="16x16 32x32" type="image/png"> -->
	<title><?php if (isset($name)) { echo $name . " (" . $year . ")"; } ?> - Cinema🇱🇰</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link rel="stylesheet" type="text/css" href="../css/view.css">
</head>
<body>
	<header></header>
	<main>
		<section>
			<article>
				<div class="movie">
					<div class="view">
						<h1><?php if (isset($name)) { echo $name . " (" . $year . ")"; } ?></h1>
						<span><?php if (isset($genre)) { echo $genre; } ?></span>
					</div>
					<div class="update">
						<a href="update-movie.php?id=<?php if (isset($item_id)) { echo $item_id; } ?>">Update</a>
					</div>
					<div class="related">
						<h1>Related</h1>
						<h2>Movies</h2>
						<ul>
							<?php

							if (isset($id)) {

								$related_movie_list = $retrieve->getRelates("movie_related_movies", "movie_id", $id);

								if (!empty($related_movie_list)) {
									foreach ($related_movie_list as $row) {
										$related_movie_data = $retrieve->getMovieViewData("movie", $row['related_movie_id']);
										echo '<li><a href="view-movie.php?id='.$row['related_movie_id'].'">'.$related_movie_data['name'].' ('.$related_movie_data['year'].')</a></li>';
									}

								}

							}

							?>
						</ul>
						<h2>TV-Series</h2>
						<ul>
							<?php

							if (isset($id)) {

								$related_tv_series_list = $retrieve->getRelates("movie_related_tv_series", "movie_id", $id);

								if (!empty($related_tv_series_list)) {
									foreach ($related_tv_series_list as $row) {
										$related_tv_series_data = $retrieve->getTVSeriesViewData("tv_series", $row['related_tv_series_id']);
										echo '<li><a href="view-tv-series.php?id='.$row['related_tv_series_id'].'">'.$related_tv_series_data['name'].'</a></li>';
									}

								}

							}

							?>
						</ul>
					</div>
				</div>
			</article>
		</section>
		<aside></aside>
	</main>
	<footer></footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</body>
</html>