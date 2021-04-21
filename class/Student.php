<?php
    include "DBConnection.php";

    class Student 
    {
        private $db;

        public function __construct() 
        {
            $this->db = new DBConnection();
            $this->db = $this->db->returnConnection();
        }

        public function find($id)
        {
            $sql = "SELECT * FROM student WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            $data = [
                'id' => $id
            ];
            $stmt->execute($data);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function all()
        {
            $sql = "SELECT * FROM student";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function create($id, $name, $surname, $sidiCode, $taxCode)
        {
            $sql = "INSERT INTO student (id, name, surname, sidi_code, tax_code) VALUES (:id, :name, :surname, :sidi_code, :tax_code);";
            $stmt = $this->db->prepare($sql);
            $data = [
                'id' => $id,
                'name' => $name,
                'surname' => $surname,
                'sidi_code' => $sidiCode,
                'tax_code' => $taxCode
            ];
            $stmt->execute($data);
        }

        public function delete($id)
        {
            $sql = "DELETE FROM student WHERE id=:id;";
            $stmt = $this->db->prepare($sql);
            $data = [
                'id' => $id
            ];
            $stmt->execute($data);
        }

        public function put($id, $name, $surname, $sidiCode, $taxCode)
        {
            $sql = "UPDATE student SET name=:name, surname=:surname, sidi_code=:sidi_code, tax_code=:tax_code WHERE id=:id;";
            $stmt = $this->db->prepare($sql);
            $data = [
                'id' => $id,
                'name' => $name,
                'surname' => $surname,
                'sidi_code' => $sidiCode,
                'tax_code' => $taxCode
            ];
            $stmt->execute($data);
        }
    }
?>
