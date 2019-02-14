<?php
	include_once('database.php');

  class Tutorial extends Database{
		function __construct($id) {
			$sql = "SELECT * FROM tutorials WHERE id = $id;";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$data = $statement->fetch(PDO::FETCH_ASSOC);
			if(empty($data)){return;}
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			}
		}

    public static function add($name, $video) {
			$sql = "INSERT INTO tutorials (name, video) VALUES (?,?)";
			Database::$db->prepare($sql)->execute([$name, $video]);
		}

		public function delete() {
			$sql = "DELETE FROM tutorials WHERE id = $this->id;";
			Database::$db->query($sql);
		}
		public function save($name, $video) {
			$sql = "UPDATE tutorials SET name = ? , video = ? ,  WHERE id = ?;";
			Database::$db->prepare($sql)->execute([$name, $video, $this->id]);
		}
		public static function all($keyword) {
			$keyword = str_replace(" ", "%", $keyword);
			$sql = "SELECT * FROM tutorials WHERE name like ('%$keyword%');";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$tutorials = [];
			while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$tutorials[] = new Tutorial($row['id']);
			}
			return $tutorials;
		}
	}
?>
