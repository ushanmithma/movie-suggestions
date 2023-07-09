<?php

class Save extends Database {

	private $name;
	private $genres = array();
	private $year;
	private $movie_id;

	public function saveMovie($name, $genres, $year) {
		$this->name = $name;
		$this->genres = $genres;
		$this->year = $year;

		$sql = "INSERT INTO movie (name, year, created_at) VALUES (:name, :year, NOW())";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindparam(":name", $this->name);
		$stmt->bindparam(":year", $this->year);

		if ($stmt->execute()) {

			$this->movie_id = $this->getID("movie", "name", $this->name);

			foreach ($this->genres as $i => $genre) {
				$add_genre = "INSERT INTO movie_genre (movie_id, genre) VALUES (:movie_id, :genre)";
				$add_genre_stmt = $this->connect()->prepare($add_genre);

				$add_genre_stmt->execute(
					array(
						":movie_id" => $this->movie_id,
						":genre" => $genre
					)
				);
			}

			if ($add_genre_stmt) {
				return true;
			} else {
				return false;
			}

		}
	}

	private function getID($table, $column, $value) {
		$sql = "SELECT id FROM {$table} WHERE {$column} = :value LIMIT 1";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute(
			array(
				":value" => $value
			)
		);
		$data = $stmt->fetch();

		return $data["id"];
	}

	private $series_id;

	public function saveSeries($name, $genres) {
		$this->name = $name;
		$this->genres = $genres;

		$sql = "INSERT INTO tv_series (name, created_at) VALUES (:name, NOW())";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindparam(":name", $this->name);

		if ($stmt->execute()) {

			$this->series_id = $this->getID("tv_series", "name", $this->name);

			foreach ($this->genres as $i => $genre) {
				$add_genre = "INSERT INTO tv_series_genre (tv_series_id, genre) VALUES (:series_id, :genre)";
				$add_genre_stmt = $this->connect()->prepare($add_genre);

				$add_genre_stmt->execute(
					array(
						":series_id" => $this->series_id,
						":genre" => $genre
					)
				);
			}

			if ($add_genre_stmt) {
				return true;
			} else {
				return false;
			}

		}
	}

}
