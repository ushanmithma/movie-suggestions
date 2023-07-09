<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- <link rel="icon" href="./assets/img/favicon.png" sizes="16x16 32x32" type="image/png"> -->
	<title>Search tv-series - Cinema🇱🇰</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="./assets/css/reset.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/search.css">
</head>
<body>
	<header></header>
	<main>
		<section>
			<article>
				<div class="search-form">
					<form method="post" id="search-form">
						<div class="form-title">
							<h1>Search <span>tv-series</span></h1>
						</div>
						<div class="form-group">
							<button type="button" class="search-btn"><i class="fas fa-search"></i></button>
							<input type="text" name="search" id="search" placeholder="Search by name..." autocomplete="off" maxlength="255" autofocus>
						</div>
					</form>
				</div>
				<div class="search-data">
					<div id="results"></div>
				</div>
			</article>
		</section>
		<aside></aside>
	</main>
	<footer></footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script>

		$(document).ready(function(){
			
			$("#search").on("keyup", function(){
				var searchValue = $(this).val();
				if (searchValue.length == 0) {
					$("#results").html("");
				} else {
					$.ajax({
						url:"./assets/includes/search-tv-series.php",
						method:"post",
						data:{
							value:searchValue,
							table:"tv_series",
							column:"name"
						},
						dataType:"text",
						success:function(output){
							$("#results").html(output);
						}
					});
				}
			});

		});

	</script>
</body>
</html>