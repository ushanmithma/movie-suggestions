<?php

class Retrieve extends Database {

	private $retrieved = array();
	private $genres_set = "";
	private $trimed_genre;

	public function getData($start, $records, $table) {

		$sql = "SELECT * FROM {$table} ORDER BY created_at DESC LIMIT {$start}, {$records}";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();

		while ($row = $stmt->fetch()) {
			$this->retrieved[] = $row;
		}

		return $this->retrieved;

	}

	public function getGenre($table, $column, $key) {
		$sql = "SELECT genre FROM {$table} WHERE {$column} = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$key]);

		$this->genres_set = "";

		while ($genre = $stmt->fetch()) {
			$this->genres_set .= $genre["genre"] . ", ";
		}

		$this->trimed_genre = rtrim($this->genres_set, ", ");
		return $this->trimed_genre;
	}

	public function getRowCount($table) {

		$sql = "SELECT * FROM {$table} ORDER BY id";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		return $stmt->rowCount();

	}

	// get results search.php

	public function getSearchData($value, $table, $column) {

		$sql = "SELECT * FROM {$table} WHERE {$column} LIKE '{$value}%' OR {$column} LIKE '%{$value}%' ORDER BY created_at DESC LIMIT 30";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {

			while ($row = $stmt->fetch()) {
				$this->retrieved[] = $row;
			}

		}

		return $this->retrieved;

	}

	// get view data view-xxxx.php

	public function getMovieViewData($table, $id) {

		$sql = "SELECT * FROM {$table} WHERE id = ? LIMIT 1";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$row = $stmt->fetch();

		$this->retrieved["id"] = $row["id"];
		$this->retrieved["name"] = $row["name"];
		$this->retrieved["year"] = $row["year"];
		$this->retrieved["genre"] = $this->getGenre($table . "_genre", $table . "_id", $id);

		return $this->retrieved;

	}

	public function getTVSeriesViewData($table, $id) {

		$sql = "SELECT * FROM {$table} WHERE id = ? LIMIT 1";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$row = $stmt->fetch();

		$this->retrieved["id"] = $row["id"];
		$this->retrieved["name"] = $row["name"];
		$this->retrieved["genre"] = $this->getGenre($table . "_genre", $table . "_id", $id);

		return $this->retrieved;

	}

	public function getRelates($table, $column, $id) {

		// SELECT * FROM movie, movie_related_movies WHERE movie.id = movie_related_movies.related_movie_id AND movie_related_movies.movie_id = 2 ORDER BY year DESC

		$this->retrieved = array();

		$sql = "SELECT * FROM {$table} WHERE {$column} = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);

		if ($stmt->rowCount() > 0) {

			while ($row = $stmt->fetch()) {
				$this->retrieved[] = $row;
			}

		}

		return $this->retrieved;

	}

	public function getName($table, $column, $id) {

		$sql = "SELECT * FROM {$table} WHERE {$column} = ? LIMIT 1";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$row = $stmt->fetch();

		$this->retrieved["name"] = $row["name"];

		return $this->retrieved;

	}

}
