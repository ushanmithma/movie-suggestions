<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- <link rel="icon" href="./assets/img/favicon.png" sizes="16x16 32x32" type="image/png"> -->
	<title>Show movies - Cinema🇱🇰</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="./assets/css/reset.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/show.css">
</head>
<body>
	<header></header>
	<main>
		<section>
			<article>
				<div class="pagination">
					<div id="pagination-data"></div>
				</div>
			</article>
		</section>
		<aside></aside>
	</main>
	<footer></footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script>
		
		$(document).ready(function(){

			load_data(1);

			function load_data(page){

				$.ajax({
					url:"./assets/includes/pagination-movie.php",
					method:"post",
					data:{page:page},
					success:function(data){
						$("#pagination-data").html(data);
					}
				});

			}

			$(document).on('click', '.pagination_link', function(event){
				event.preventDefault();
				var page = $(this).attr("id");
				load_data(page);
			});

		});

	</script>
</body>
</html>