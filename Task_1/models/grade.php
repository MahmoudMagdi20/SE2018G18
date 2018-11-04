<?php
  include_once('database.php');
  include_once('course.php');
  include_once('student.php');

  class Grade extends Database{
    function __construct($id) {
      $sql = "SELECT * FROM grades WHERE id = $id;";
      $statement = Database::$db->prepare($sql);
      $statement->execute();
      $data = $statement->fetch(PDO::FETCH_ASSOC);
      if(empty($data)){return;}
      foreach ($data as $key => $value) {
        $this->{$key} = $value;
      }
    }

    public static function all($keyword,$searchopt) {
      $keyword = str_replace(" ", "%", $keyword);
      if($searchopt == 'name')
      {
      $sql = "SELECT grades.id ,students.name, courses.name,
              grades.degree, courses.max_degree
              FROM grades
              JOIN students ON students.id =
              grades.student_id
              JOIN courses ON courses.id = grades.course_id
              WHERE students.name LIKE ('%$keyword%')
            ";
      }
      else  {
        $sql = "SELECT grades.id ,students.name, courses.name,
                grades.degree, courses.max_degree
                FROM grades
                JOIN students ON students.id =
                grades.student_id
                JOIN courses ON courses.id = grades.course_id
                WHERE courses.name LIKE ('%$keyword%')
              ";
      }


			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$grades = [];
			while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$grades[] = new Grade($row['id']);
			}
			return $grades;
		}

    public static function add($student_id,$course_id,$degree,$examine_at){
      $sql = "INSERT INTO grades (student_id,course_id,degree,examine_at) VALUES (?,?,?,?)";
      Database::$db->prepare($sql)->execute([$student_id,$course_id,$degree,$examine_at]);

    }
    public function save() {
      $sql = "UPDATE grades SET student_id = ?, course_id = ?, degree = ?, examine_at = ? WHERE id = ?;";
			Database::$db->prepare($sql)->execute([$this->student_id,$this->course_id,$this->degree,$this->examine_at, $this->id]);

		}

    public function delete() {
			$sql = "DELETE FROM grades WHERE id = $this->id;";
			Database::$db->query($sql);
		}
	}
?>
