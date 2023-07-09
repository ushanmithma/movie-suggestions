<?php


class Common extends Database {

	public function getPretty($string) {
		$hyphen = implode('-', array_map('ucfirst', explode('-', $string)));
		$uppercased = ucwords($hyphen);
		$stripslashes = stripslashes($uppercased);
		return $stripslashes;
	}

	public function exists($table, $column, $value) {
		$sql = "SELECT * FROM {$table} WHERE {$column} = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$value]);

		if ($stmt->rowCount() >= 1 ) {
			return true;
		}
	}

	public function notExists($table, $column, $value, $id) {
		$sql = "SELECT * FROM {$table} WHERE {$column} = ? AND id != ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$value, $id]);

		if ($stmt->rowCount() >= 1 ) {
			return true;
		}
	}

	private $nameList = array();

	public function getNameList($table) {
		$sql = "SELECT name FROM {$table} ORDER BY name";
		$stmt = $this->connect()->query($sql);

		while ($row = $stmt->fetch()) {
			$this->nameList[] = $row;
		}

		return $this->nameList;
	}

	public function getID($table, $value) {

		$sql = "SELECT * FROM {$table} WHERE name = :name LIMIT 1";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindparam(":name", $value);
		$stmt->execute();
		$row = $stmt->fetch();

		return $row["id"];

	}

	public function checkOnlyNumaric($array) {
		foreach($array as $value) {
			if (!is_numeric($value)) {
				return true;
			} 
		}
		return false;
	}

}
