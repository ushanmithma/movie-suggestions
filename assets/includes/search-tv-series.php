<?php

include "autoloader.php";

$output = "";
$retrieve = new Retrieve();
$data = array();

if (isset($_POST["value"]) && !empty($_POST["value"]) && strlen(trim($_POST["value"]))) {
	$value = $_POST["value"];
	$table = $_POST["table"];
	$column = $_POST["column"];

	$data = $retrieve->getSearchData($value, $table, $column);

	if (!empty($data)) {

		$output .= '<div class="table_content"><table>
			<tr>
				<!--<th>ID</th>-->
				<th>NAME</th>
				<th>GENRE</th>
				<th>CREATED AT</th>
			</tr>';
		
		foreach ($data as $row) {
			
			$output .= "<tr>";
			#$output .= "<td>" . $row["id"] . "</td>";
			$output .= "<td><a href=\"./assets/includes/view-tv-series.php?id=" . $row["id"] . "\">" . $row["name"] . "</a></td>";
			$output .= "<td>" . $retrieve->getGenre("tv_series_genre", "tv_series_id", $row["id"]) . "</td>";
			$output .= "<td>" . $row["created_at"] . "</td>";
			$output .= "</tr>";

		}

		$output .= "</table></div>";

	} else {
		$output .= "Sorry, there were no data found!";
	}
}

echo $output;
