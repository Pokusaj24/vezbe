<?php
require_once 'db.php';
class DAO {
    private $db;
    private $INSERT_STUDENT = "INSERT INTO `student-table` (ime, prosek) VALUES (:ime, :prosek)";
    private $SELECT_LAST10 = "SELECT * FROM `student-table` ORDER BY id DESC LIMIT 9";

    public function __construct(){
        $this->db = DB::createInstance();
    }
    public function insertStudent($ime, $prosek) {
        $statement = $this->db->prepare($this->INSERT_STUDENT);
        $statement->bindValue(':ime', $ime);
        $statement->bindValue(':prosek', $prosek);
        return $statement->execute();
    }
    public function getLast10() {
        $statement = $this->db->prepare($this->SELECT_LAST10);
        $statement->execute();
        return $statement->fetchAll();
    }
}
?>
