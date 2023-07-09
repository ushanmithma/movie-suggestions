<?php

include 'autoloader.php';

$retrieve = new Retrieve();
$data = array();
$related_movie_list = array();
$related_tv_series_list = array();
$row_count = $retrieve->getRowCount("tv_series");

if (isset($_GET['id']) and !empty($_GET['id']) and $_GET['id'] >= 1 and $_GET['id'] <= $row_count) {

	$id = $_GET["id"];
	$data = $retrieve->getTVSeriesViewData("tv_series", $id);
	$related_movie_list = $retrieve->getRelates("tv_series_related_movies", "tv_series_id", $id);
	$related_tv_series_list = $retrieve->getRelates("tv_series_related_tv_series", "tv_series_id", $id);

	foreach ($data as $column => $value) {
		
		switch ($column) {
			case 'id':
				$item_id = $value;
			case 'name':
				$name = $value;
				break;
			case 'genre':
				$genres = explode(", ", $value);
				break;
			
			default:
				# code...
				break;
		}

	}

} else {
	header('Location: ../../search-tv-series.php');
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
	<title>Update <?php if (isset($name)) { echo $name; } ?> - Cinema🇱🇰</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link rel="stylesheet" type="text/css" href="../css/common.css">
</head>
<body>
	<header></header>
	<main>
		<section>
			<article>
				<div class="adding-form">
					<form method="post" id="update-form">
						<div class="form-title">
							<h1>Update <span><?php if (isset($name)) { echo $name; } ?></span></h1>
						</div>
						<div class="form-group">
							<label for="name">Name:</label>
							<input list="movies" name="name" id="name" value="<?php if (isset($name)) { echo $name; } ?>" autocomplete="off" maxlength="255">
							<datalist id="movies">
								<!-- <option value="The Lord of the Rings: The Fellowship of the Ring"></option> -->
							</datalist>
						</div>
						<div class="form-checkboxes">
							<label for="genre">Genres:</label>
							<ul>
								<li><input type="checkbox" name="genre[]" id="genre" value="Action" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Action") { echo 'checked'; } } } ?>> Action</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Adventure" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Adventure") { echo 'checked'; } } } ?>> Adventure</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Animation" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Animation") { echo 'checked'; } } } ?>> Animation</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Biography" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Biography") { echo 'checked'; } } } ?>> Biography</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Comedy" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Comedy") { echo 'checked'; } } } ?>> Comedy</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Crime" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Crime") { echo 'checked'; } } } ?>> Crime</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Drama" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Drama") { echo 'checked'; } } } ?>> Drama</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Family" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Family") { echo 'checked'; } } } ?>> Family</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Fantasy" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Fantasy") { echo 'checked'; } } } ?>> Fantasy</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Film-Noir" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Film-Noir") { echo 'checked'; } } } ?>> Film-Noir</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="History" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "History") { echo 'checked'; } } } ?>> History</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Horror" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Horror") { echo 'checked'; } } } ?>> Horror</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Music" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Music") { echo 'checked'; } } } ?>> Music</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Musical" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Musical") { echo 'checked'; } } } ?>> Musical</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Mystery" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Mystery") { echo 'checked'; } } } ?>> Mystery</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Romance" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Romance") { echo 'checked'; } } } ?>> Romance</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Sci-Fi" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Sci-Fi") { echo 'checked'; } } } ?>> Sci-Fi</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Sport" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Sport") { echo 'checked'; } } } ?>> Sport</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Thriller" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Thriller") { echo 'checked'; } } } ?>> Thriller</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="War" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "War") { echo 'checked'; } } } ?>> War</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Western" <?php if (isset($genres)) { for ($i = 0; $i < count($genres); $i++) { if ($genres[$i] == "Western") { echo 'checked'; } } } ?>> Western</li>
							</ul>
						</div>
						<div class="form-section">
							<h2>Add related,</h2>
						</div>
						<div class="form-related-list">
							<label for="related-movie">Movies:</label>
							<div class="input-group">
								<input list="movie-list" name="related-movie" id="related-movie" autocomplete="off" maxlength="255">
								<datalist id="movie-list"></datalist>
								<button type="button" id="add-movie"><i class="fas fa-plus-circle"></i></button>
							</div>
						</div>
						<ul class="related-list" id="related-movie-list"></ul>
						<div class="form-related-list">
							<label for="related-tv-series">TV-Series:</label>
							<div class="input-group">
								<input list="tv-series-list" name="related-tv-series" id="related-tv-series" autocomplete="off" maxlength="255">
								<datalist id="tv-series-list"></datalist>
								<button type="button" id="add-tv-series"><i class="fas fa-plus-circle"></i></button>
							</div>
						</div>
						<ul class="related-list" id="related-tv-series-list"></ul>
						<div class="form-button">
							<button type="reset" name="reset" id="reset"><i class="fas fa-redo"></i> RESET</button>
							<button type="submit" name="save" id="save"><i class="fas fa-save"></i> UPDATE</button>
						</div>
					</form>
				</div>
				<div class="modal" id="message-modal">
					<div class="modal-header">
						<h2>Meessage</h2>
						<button type="button" class="close-btn"><i class="fas fa-times-circle"></i></button>
					</div>
					<div class="modal-body">
						<p id="messages"></p>
					</div>
				</div>
				<div id="overlay"></div>
			</article>
		</section>
		<aside></aside>
	</main>
	<footer></footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script>

		$(document).ready(function(){

			// load movie list

			load_name_list();

			function load_name_list() {

				var currentMovie = "<?php if(isset($name)) { echo $name; } ?>";

				if (!$('datalist#movie-list').is(':empty')) {
					$("datalist#movie-list option").each(function(){
						$(this).remove();
					});
				}

				$.ajax({
					url: "load-names.php",
					method:"post",
					data:{
						table:"movie"
					},
					dataType: 'json',
					cache: false,
					success: function(data){
						$.each(data, function(i){
							if (data[i] != currentMovie) {
								$("datalist#movie-list").append($("<option>").attr('value', data[i]));
							}
						});
					}
				});

				if (!$('datalist#tv-series-list').is(':empty')) {
					$("datalist#tv-series-list option").each(function(){
						$(this).remove();
					});
				}

				$.ajax({
					url: "load-names.php",
					method:"post",
					data:{
						table:"tv_series"
					},
					dataType: 'json',
					cache: false,
					success: function(data){
						$.each(data, function(i){
							if (data[i] != currentMovie) {
								$("datalist#tv-series-list").append($("<option>").attr('value', data[i]));
							}
						});
					}
				});
			}

			// load related movie list

			load_related_movie_list();
			load_related_tv_series_list();

			function load_related_movie_list() {
				var data = <?php if (isset($related_movie_list)) { echo json_encode($related_movie_list); } ?>;
				$.each(data, function(key, row){
					var relatedMovieID = row["related_movie_id"];
					var liTag = $('<li data-movie_id="'+relatedMovieID+'"></li>');
					var pTag = $('<p></p>');

					$.ajax({
						url: "get-name.php",
						method:"post",
						data:{
							table:"movie",
							id:relatedMovieID
						},
						success:function(nameArray){
							pTag.text(nameArray);
						}
					});
					
					var rBtn = $('<button type="button" class="remove-btn"><i class="fas fa-times-circle"></i></button>').click(function(){
						// removing movie
						var li = $(this).parent();
						li.remove();
					});

					var relates = liTag.append(pTag, rBtn);
					$("#related-movie-list").append(relates);
				});
			}

			// load related tv-series list

			function load_related_tv_series_list() {
				var data = <?php if (isset($related_tv_series_list)) { echo json_encode($related_tv_series_list); } ?>;
				$.each(data, function(key, row){
					var relatedTVSeriesID = row["related_tv_series_id"];
					var liTag = $('<li data-tv_series_id="'+relatedTVSeriesID+'"></li>');
					var pTag = $('<p></p>');

					$.ajax({
						url: "get-name.php",
						method:"post",
						data:{
							table:"tv_series",
							id:relatedTVSeriesID
						},
						success:function(nameArray){
							pTag.text(nameArray);
						}
					});
					
					var rBtn = $('<button type="button" class="remove-btn"><i class="fas fa-times-circle"></i></button>').click(function(){
						// removing movie
						var li = $(this).parent();
						li.remove();
					});

					var relates = liTag.append(pTag, rBtn);
					$("#related-tv-series-list").append(relates);
				});
			}

			// get related movies

			function getIDList(ul, dataObj){
				var listCount = $(ul+" li").length;
				var relatedList = [];
				if (listCount == 0) {
					return "";
				} else {
					$(ul+" li").each(function(){
						var itemID = $(this).data(dataObj);
						relatedList.push(itemID);
					});
					relatedList = relatedList.toString();
					return relatedList;
				}
			}

			// update process

			$('#update-form').on('submit', function(event) {
				event.preventDefault();
				var currentTVSeriesID = "<?php if(isset($id)) { echo $id; } ?>";
				var name = $("#name").val();
				var genres = [];
				$("input#genre").each(function(){
					if ($(this).is(":checked")) {
						genres.push($(this).val());
					}
				});
				genres = genres.toString();
				var movieList = getIDList("#related-movie-list", "movie_id");
				var tvSeriesList = getIDList("#related-tv-series-list", "tv_series_id");

				$.ajax({
					url:"update-tv-series-process.php",
					method:"post",
					data:{
						id:currentTVSeriesID,
						name:name,
						genres:genres,
						movieList:movieList,
						tvSeriesList:tvSeriesList
					},
					cache:false,
					dataType:"json",
					success:function(data) {
						//var messages = JSON.parse(data);
						if (data != undefined || data != null || data.length > 0) {
							$('#name').val("");
							$('input#genre').each(function(){
								$(this).prop("checked", false);
							});
							$('#messages').html(data);
							load_name_list();
							$(".modal").each(function(){
								openModal($(this));
							});
							setTimeout(function(){
								window.location.replace("view-tv-series.php?id="+currentTVSeriesID);
							}, 5000);
						}
					}
				});
			});

			function checkIfAlreadyAdded(id, name, ul, inputbox, dataObj) {

				var listCount = $(ul+" li").length;
				var found = false;

				if (listCount == 0){
					return found;
				} else {

					$(ul+" li").each(function(){
						var movieID = $(this).data(dataObj);

						if (movieID == id) {
							$(".modal").each(function(){
								$('#messages').text(name+" was already added!");
								$(inputbox).val("");
								openModal($(this));
							});
							found = true;
							return false; // to break .each() loop not function's return
						}
					});
					return found;
				}

			}

			function checkIfExists(dataList, optionVal) {

				var found = false;

				$(dataList+" option").each(function(){
					var cVal = $(this).attr("value");
					if (cVal == $.trim(optionVal)) {
						found = true;
						return false;
					}
				});

				return found;

			}

			// adding movie to the related list

			$("button#add-movie").on("click", function(){
				var options = $("datalist#movie-list")[0].options;
				var inputVal = $("input#related-movie").val();
				for (var i=0; i<options.length; i++) {
					if (options[i].value == $.trim(inputVal)) {

						$.ajax({
							url: "get-id.php",
							method:"post",
							data:{
								table:"movie",
								name:inputVal
							},
							success: function(data){

								if (!checkIfAlreadyAdded(data, inputVal, "#related-movie-list", "input#related-movie", "movie_id")){

									var liTag = $('<li data-movie_id="'+data+'"></li>');
									var pTag = $('<p></p>').text($.trim(inputVal));
									
									var rBtn = $('<button type="button" class="remove-btn"><i class="fas fa-times-circle"></i></button>').click(function(){
										// removing movie
										var li = $(this).parent();
										li.remove();
									});

									var relates = liTag.append(pTag, rBtn);
									$("#related-movie-list").append(relates);
									$("input#related-movie").val("");

								}

							}
						});

						break;
					} else if ($.trim(inputVal) == "<?php if (isset($name)) { echo $name; } ?>") {
						$("input#related-movie").val("");
						$(".modal").each(function(){
							$('#messages').text($.trim(inputVal)+" was already added!");
							openModal($(this));
						});
						break;
					} else if (!checkIfExists("#movie-list", inputVal)) {
						$("input#related-movie").val("");
						$(".modal").each(function(){
							$('#messages').text("Please choose a movie in the list!");
							openModal($(this));
						});
					}
				}
			});

			// adding tv-series to related list

			$("button#add-tv-series").on("click", function(){
				var options = $("datalist#tv-series-list")[0].options;
				var inputVal = $("input#related-tv-series").val();
				for (var i=0; i<options.length; i++) {
					if (options[i].value == $.trim(inputVal)) {

						$.ajax({
							url: "get-id.php",
							method:"post",
							data:{
								table:"tv_series",
								name:inputVal
							},
							success: function(data){

								if (!checkIfAlreadyAdded(data, inputVal, "#related-tv-series-list", "input#related-tv-series", "tv_series_id")) {

									var liTag = $('<li data-tv_series_id="'+data+'"></li>');
									var pTag = $('<p></p>').text($.trim(inputVal));

									var rBtn = $('<button type="button" class="remove-btn"><i class="fas fa-times-circle"></i></button>').click(function(){
										// removing tv-series
										var li = $(this).parent();
										li.remove();
									});

									var relates = liTag.append(pTag, rBtn);
									$("#related-tv-series-list").append(relates);
									$("input#related-tv-series").val("");

								}

							}
						});

						break;
					} else if ($.trim(inputVal) == "<?php if (isset($name)) { echo $name; } ?>") {
						$("input#related-tv-series").val("");
						$(".modal").each(function(){
							$('#messages').text($.trim(inputVal)+" was already added!");
							openModal($(this));
						});
						break;
					} else if (!checkIfExists("#tv-series-list", inputVal)) {
						$("input#related-tv-series").val("");
						$(".modal").each(function(){
							$('#messages').text("Please choose a tv-series in the list!");
							openModal($(this));
						});
					}
				}
			});

			// modal message display

			$("#overlay").on("click", function(){
				$(".modal.active").each(function(){
					closeModal($(this));
				});
			});

			$(".close-btn").on("click", function(){
				//$(this).preventDefault();
				$(".modal.active").each(function(){
					closeModal($(this));
				});
			});

			function openModal(modal) {
				if ($(modal) == null) {
					return;
				} else {
					$(modal).addClass("active");
					$("#overlay").addClass("active");
				}
			}

			function closeModal(modal) {
				if ($(modal) == null) {
					return;
				} else {
					$(modal).removeClass("active");
					$("#overlay").removeClass("active");
				}
			}
		});

	</script>
</body>
</html>