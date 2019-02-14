<?php
	include_once('database.php');

  class Product extends Database{
		function __construct($id) {
			$sql = "SELECT * FROM products JOIN users on users.id = products.user_id WHERE products.id = $id;";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$data = $statement->fetch(PDO::FETCH_ASSOC);
			if(empty($data)){return;}
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			}
		}

    public static function add($name, $description, $price, $type, $image, $user_id, $category) {
			$sql = "INSERT INTO products (name, description, price, type, image, user_id, category) VALUES (?,?,?,?,?,?,?)";
			Database::$db->prepare($sql)->execute([$name, $description, $price, $type, $image, $user_id, $category]);
		}

		public function delete() {
			$sql = "DELETE FROM products WHERE id = $this->id;";
			Database::$db->query($sql);
		}
		public function save($name, $description, $price, $type, $image) {
			$sql = "UPDATE products SET name = ? , description = ? , price = ? , type = ? , image = ? ,  WHERE id = ?;";
			Database::$db->prepare($sql)->execute([$name, $description, $price, $type, $image, $this->id]);
		}
		public static function all($keyword,$type,$category) {
			$keyword = str_replace(" ", "%", $keyword);
			$sql = "SELECT id FROM products WHERE name like ('%$keyword%') AND type like ('%$type%') AND category like ('%$category%');";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$products = [];
			while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$products[] = new Product($row['id']);
			}
			return $products;
		}
	}
?>
