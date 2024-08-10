<?php
require __DIR__ . '/../config/config.php';
use Src\Database;
use Src\Student;

$config = require __DIR__ . '/../config/config.php';
$db = new Database($config);
$student = new Student($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    try {
        $student->registerStudent($name, $email);
        header('Location: success.php');
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
