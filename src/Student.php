<?php

namespace Src;

class Student {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db->getConnection();
    }

    public function registerStudent($name, $email) {
        $stmt = $this->db->prepare("INSERT INTO students (name, email) VALUES (:name, :email)");
        $stmt->execute(['name' => $name, 'email' => $email]);
    }

    public function getAllStudents() {
        $stmt = $this->db->query("SELECT * FROM students ORDER BY registered_at DESC");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
