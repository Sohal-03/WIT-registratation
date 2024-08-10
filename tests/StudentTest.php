<?php

use PHPUnit\Framework\TestCase;
use Src\Database;
use Src\Student;

class StudentTest extends TestCase
{
    private $student;

    protected function setUp(): void
    {
        $config = [
            'host' => 'localhost', // Adjust as needed for your environment
            'dbname' => 'test_db',
            'user' => 'test_user',
            'password' => 'test_pass',
            'port' => '5432',
        ];

        $db = new Database($config);
        $this->student = new Student($db);
    }

    public function testRegisterStudent()
    {
        $name = 'Test Student';
        $email = 'teststudent@example.com';

        $this->student->registerStudent($name, $email);

        $students = $this->student->getAllStudents();

        $this->assertCount(1, $students);
        $this->assertEquals($name, $students[0]['name']);
        $this->assertEquals($email, $students[0]['email']);
    }

    public function testRegisterStudentWithDuplicateEmail()
    {
        $this->expectException(PDOException::class);

        $name = 'Duplicate Student';
        $email = 'duplicatestudent@example.com';

        $this->student->registerStudent($name, $email);
        $this->student->registerStudent($name, $email); // Should throw an exception
    }
}
