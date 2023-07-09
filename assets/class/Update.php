<?php

class Update extends Database {

	private $name;
	private $genres = array();
	private $year;
	private $related_movies = array();
	private $related_tv_series = array();
	private $movie_id;

	public function updateMovie($id, $name, $genres, $year, $movieIDs, $tvSeriesIDs) {
		$this->movie_id = $id;
		$this->name = $name;
		$this->genres = $genres;
		$this->year = $year;

		$sql = "UPDATE movie SET name = :name, year = :year, updated_at = NOW() WHERE id = :id";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindparam(":name", $this->name);
		$stmt->bindparam(":year", $this->year);
		$stmt->bindparam(":id", $this->movie_id);

		if ($stmt->execute()) {

			if ($this->deleteGenre("movie_genre", "movie_id", $this->movie_id)) {

				foreach ($this->genres as $i => $genre) {
					$sql = "INSERT INTO movie_genre (movie_id, genre) VALUES (:movie_id, :genre)";
					$stmt = $this->connect()->prepare($sql);

					$stmt->execute(
						array(
							":movie_id" => $this->movie_id,
							":genre" => $genre
						)
					);
				}

				if ($stmt) {
					
					if (is_string($movieIDs) && is_string($tvSeriesIDs)) {

						if ($this->deleteRelates("movie_related_movies", "movie_id", $this->movie_id) && $this->deleteRelates("movie_related_tv_series", "movie_id", $this->movie_id)) {

							return true;
							
						}

					} else if (is_array($movieIDs) && is_string($tvSeriesIDs)) {

						$this->related_movies = $movieIDs;

						if ($this->deleteRelates("movie_related_movies", "movie_id", $this->movie_id) && $this->deleteRelates("movie_related_tv_series", "movie_id", $this->movie_id)) {

							foreach ($this->related_movies as $i => $mid) {
								$sql = "INSERT INTO movie_related_movies (movie_id, related_movie_id) VALUES (:movie_id, :related_movie_id)";
								$stmt = $this->connect()->prepare($sql);

								$stmt->execute(
									array(
										":movie_id" => $this->movie_id,
										":related_movie_id" => $mid
									)
								);
							}

							if ($stmt) {
								return true;
							} else {
								return false;
							}

						}

					} else if (is_string($movieIDs) && is_array($tvSeriesIDs)) {

						$this->related_tv_series = $tvSeriesIDs;

						if ($this->deleteRelates("movie_related_movies", "movie_id", $this->movie_id) && $this->deleteRelates("movie_related_tv_series", "movie_id", $this->movie_id)) {

							foreach ($this->related_tv_series as $i => $tvsid) {
								$sql = "INSERT INTO movie_related_tv_series (movie_id, related_tv_series_id) VALUES (:movie_id, :related_tv_series_id)";
								$stmt = $this->connect()->prepare($sql);

								$stmt->execute(
									array(
										":movie_id" => $this->movie_id,
										":related_tv_series_id" => $tvsid
									)
								);
							}

							if ($stmt) {
								return true;
							} else {
								return false;
							}

						}

					} else if (is_array($movieIDs) && is_array($tvSeriesIDs)) {

						$this->related_movies = $movieIDs;
						$this->related_tv_series = $tvSeriesIDs;

						if ($this->deleteRelates("movie_related_movies", "movie_id", $this->movie_id)) {

							foreach ($this->related_movies as $i => $mid) {
								$sql = "INSERT INTO movie_related_movies (movie_id, related_movie_id) VALUES (:movie_id, :related_movie_id)";
								$stmt = $this->connect()->prepare($sql);

								$stmt->execute(
									array(
										":movie_id" => $this->movie_id,
										":related_movie_id" => $mid
									)
								);
							}

							if ($stmt) {
								
								if ($this->deleteRelates("movie_related_tv_series", "movie_id", $this->movie_id)) {

									foreach ($this->related_tv_series as $i => $tvsid) {
										$sql = "INSERT INTO movie_related_tv_series (movie_id, related_tv_series_id) VALUES (:movie_id, :related_tv_series_id)";
										$stmt = $this->connect()->prepare($sql);

										$stmt->execute(
											array(
												":movie_id" => $this->movie_id,
												":related_tv_series_id" => $tvsid
											)
										);
									}

									if ($stmt) {
										return true;
									} else {
										return false;
									}

								}

							}

						}

					}

				}

			}

		}

	}

	private $tv_series_id;

	public function updateTVSeries($id, $name, $genres, $movieIDs, $tvSeriesIDs) {
		$this->tv_series_id = $id;
		$this->name = $name;
		$this->genres = $genres;

		$sql = "UPDATE tv_series SET name = :name, updated_at = NOW() WHERE id = :id";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindparam(":name", $this->name);
		$stmt->bindparam(":id", $this->tv_series_id);

		if ($stmt->execute()) {

			if ($this->deleteGenre("tv_series_genre", "tv_series_id", $this->tv_series_id)) {

				foreach ($this->genres as $i => $genre) {
					$sql = "INSERT INTO tv_series_genre (tv_series_id, genre) VALUES (:tv_series_id, :genre)";
					$stmt = $this->connect()->prepare($sql);

					$stmt->execute(
						array(
							":tv_series_id" => $this->tv_series_id,
							":genre" => $genre
						)
					);
				}

				if ($stmt) {
					
					if (is_string($movieIDs) && is_string($tvSeriesIDs)) {

						if ($this->deleteRelates("tv_series_related_movies", "tv_series_id", $this->tv_series_id) && $this->deleteRelates("tv_series_related_tv_series", "tv_series_id", $this->tv_series_id)) {

							return true;
							
						}

					} else if (is_array($movieIDs) && is_string($tvSeriesIDs)) {

						$this->related_movies = $movieIDs;

						if ($this->deleteRelates("tv_series_related_movies", "tv_series_id", $this->tv_series_id) && $this->deleteRelates("tv_series_related_tv_series", "tv_series_id", $this->tv_series_id)) {

							foreach ($this->related_movies as $i => $mid) {
								$sql = "INSERT INTO tv_series_related_movies (tv_series_id, related_movie_id) VALUES (:tv_series_id, :related_movie_id)";
								$stmt = $this->connect()->prepare($sql);

								$stmt->execute(
									array(
										":tv_series_id" => $this->tv_series_id,
										":related_movie_id" => $mid
									)
								);
							}

							if ($stmt) {
								return true;
							} else {
								return false;
							}

						}

					} else if (is_string($movieIDs) && is_array($tvSeriesIDs)) {

						$this->related_tv_series = $tvSeriesIDs;

						if ($this->deleteRelates("tv_series_related_movies", "tv_series_id", $this->tv_series_id) && $this->deleteRelates("tv_series_related_tv_series", "tv_series_id", $this->tv_series_id)) {

							foreach ($this->related_tv_series as $i => $tvsid) {
								$sql = "INSERT INTO tv_series_related_tv_series (tv_series_id, related_tv_series_id) VALUES (:tv_series_id, :related_tv_series_id)";
								$stmt = $this->connect()->prepare($sql);

								$stmt->execute(
									array(
										":tv_series_id" => $this->tv_series_id,
										":related_tv_series_id" => $tvsid
									)
								);
							}

							if ($stmt) {
								return true;
							} else {
								return false;
							}

						}

					} else if (is_array($movieIDs) && is_array($tvSeriesIDs)) {

						$this->related_movies = $movieIDs;
						$this->related_tv_series = $tvSeriesIDs;

						if ($this->deleteRelates("tv_series_related_movies", "tv_series_id", $this->tv_series_id)) {

							foreach ($this->related_movies as $i => $mid) {
								$sql = "INSERT INTO tv_series_related_movies (tv_series_id, related_movie_id) VALUES (:tv_series_id, :related_movie_id)";
								$stmt = $this->connect()->prepare($sql);

								$stmt->execute(
									array(
										":tv_series_id" => $this->tv_series_id,
										":related_movie_id" => $mid
									)
								);
							}

							if ($stmt) {
								
								if ($this->deleteRelates("tv_series_related_tv_series", "tv_series_id", $this->tv_series_id)) {

									foreach ($this->related_tv_series as $i => $tvsid) {
										$sql = "INSERT INTO tv_series_related_tv_series (tv_series_id, related_tv_series_id) VALUES (:tv_series_id, :related_tv_series_id)";
										$stmt = $this->connect()->prepare($sql);

										$stmt->execute(
											array(
												":tv_series_id" => $this->tv_series_id,
												":related_tv_series_id" => $tvsid
											)
										);
									}

									if ($stmt) {
										return true;
									} else {
										return false;
									}

								}

							}

						}

					}

				}

			}

		}

	}

	private function deleteGenre($table, $column, $id) {
		$sql = "DELETE FROM {$table} WHERE {$column} = ?";
		$stmt = $this->connect()->prepare($sql);
		
		if ($stmt->execute([$id])) {
			return true;
		} else {
			return false;
		}
	}

	private function deleteRelates($table, $column, $id) {
		$sql = "DELETE FROM {$table} WHERE {$column} = ?";
		$stmt = $this->connect()->prepare($sql);
		
		if ($stmt->execute([$id])) {
			return true;
		} else {
			return false;
		}
	}

}
