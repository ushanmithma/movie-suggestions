<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- <link rel="icon" href="./assets/img/favicon.png" sizes="16x16 32x32" type="image/png"> -->
	<title>Suggest a tv-series to watch - Cinema🇱🇰</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="./assets/css/reset.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/common.css">
</head>
<body>
	<header></header>
	<main>
		<section>
			<article>
				<div class="adding-form">
					<form method="post" id="adding-form">
						<div class="form-title">
							<h1>Suggest a <span>tv-series</span> to watch</h1>
						</div>
						<div class="form-group">
							<label for="name">Name:</label>
							<input list="tv-series" name="name" id="name" autocomplete="off" maxlength="255" autofocus>
							<datalist id="tv-series">
								<!-- <option value="The Mandalorian"></option> -->
							</datalist>
						</div>
						<div class="form-checkboxes">
							<label for="genre">Genres:</label>
							<ul>
								<li><input type="checkbox" name="genre[]" id="genre" value="Action"> Action</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Adventure"> Adventure</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Animation"> Animation</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Biography"> Biography</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Comedy"> Comedy</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Crime"> Crime</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Drama"> Drama</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Family"> Family</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Fantasy"> Fantasy</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Film-Noir"> Film-Noir</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="History"> History</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Horror"> Horror</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Music"> Music</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Musical"> Musical</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Mystery"> Mystery</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Romance"> Romance</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Sci-Fi"> Sci-Fi</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Sport"> Sport</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Thriller"> Thriller</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="War"> War</li>
								<li><input type="checkbox" name="genre[]" id="genre" value="Western"> Western</li>
							</ul>
						</div>
						<div class="form-button">
							<button type="reset" name="reset" id="reset"><i class="fas fa-redo"></i> RESET</button>
							<button type="submit" name="save" id="save"><i class="fas fa-save"></i> SAVE</button>
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

			// data gathering process

			$('#adding-form').on('submit', function(event) {
				event.preventDefault();
				var name = $("#name").val();
				var genres = [];
				$("input#genre").each(function(){
					if ($(this).is(":checked")) {
						genres.push($(this).val());
					}
				});
				genres = genres.toString();

				$.ajax({
					url:"./assets/includes/validate-tv-series.php",
					method:"post",
					data:{
						name:name,
						genres:genres
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
						}
					}
				});
			});

			// load series list

			load_name_list();

			function load_name_list() {

				$("datalist#tv-series option").each(function(){
					$(this).remove();
				});

				$.ajax({
					url: "./assets/includes/load-names.php",
					method:"post",
					data:{
						table:"tv_series"
					},
					dataType: 'json',
					cache: false,
					success: function(data){
						$.each(data, function(i){
							$("datalist#tv-series").append($("<option>").attr('value', data[i]));
						});
					}
				});
			}

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