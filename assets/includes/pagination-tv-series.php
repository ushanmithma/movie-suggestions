<?php

include 'autoloader.php';

// define variables
$rows_pre_page = 15;
$page_no = 1;
$output = "";
$data = array();

if (isset($_POST["page"]) && !empty($_POST["page"])) {
	$page_no = $_POST["page"];
} else {
	$page_no = 1;
}

$start = ($page_no - 1) * $rows_pre_page;

$retrieve = new Retrieve();

$data = $retrieve->getData($start, $rows_pre_page, "tv_series");

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
	$output .= "<td>" . $row["name"] . "</td>";
	$output .= "<td>" . $retrieve->getGenre("tv_series_genre", "tv_series_id", $row["id"]) . "</td>";
	$output .= "<td>" . $row["created_at"] . "</td>";
	$output .= "</tr>";

}

$output .= "</table></div>";

$row_count = $retrieve->getRowCount("tv_series");

// first page
$first = "<a class=\"pagination_link\" href=\"#\" id=\"1\">First</a>";

// last page
$last_page_no = ceil($row_count / $rows_pre_page);
$last = "<a class=\"pagination_link\" href=\"#\" id=\"{$last_page_no}\">Last</a>";

// next page
if ($page_no >= $last_page_no) {
	$next = "<span>Next</span>";
	$last = "<span>Last</span>";
	
} else {
	$next_page_no = $page_no + 1;
	$next = "<a class=\"pagination_link\" href=\"#\" id=\"{$next_page_no}\">Next</a>";
}

// previous page
if ($page_no <= 1) {
	$prev = "<span>Previous</span>";
	$first = "<span>First</span>";
	
} else {
	$prev_page_no = $page_no - 1;
	$prev = "<a class=\"pagination_link\" href=\"#\" id=\"{$prev_page_no}\">Previous</a>";
}

$output .= '<div class="pagination_controller">' . $first . ' ' . $prev . '<span>' . 'Page ' . $page_no . ' of ' . $last_page_no . '</span>' . $next . ' ' . $last . '</div>';

echo $output;
