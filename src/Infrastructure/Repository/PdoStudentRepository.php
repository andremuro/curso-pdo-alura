<?php

namespace Alura\CursoPdo\Infrastructure\Repository;

use Alura\CursoPdo\Domain\Model\Phone;
use Alura\CursoPdo\Domain\Model\Student;
use Alura\CursoPdo\Domain\Repository\StudentRepository;
use PDO;

class PdoStudentRepository implements StudentRepository
{
  private $connection;

  public function __construct($connection)
  {
    $this->connection = $connection;
  }

  public function allStudents()
  {
    $sqlQuery = 'SELECT * FROM students;';
    $stmt = $this->connection->query($sqlQuery);

    return $this->hydrateStudentList($stmt);
  }

  public function studentsBirthAt($birthDate)
  {
    $sqlQuery = 'SELECT * FROM students WHERE birth_date = ?;';
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindValue(1, $birthDate->format('Y-m-d'));
    $stmt->execute();

    return $this->hydrateStudentList($stmt);
  }

  private function hydrateStudentList($stmt)
  {
    $studentDataList = $stmt->fetchAll();
    $studentList = [];

    foreach ($studentDataList as $studentData) {
      $student = new Student(
        $studentData['id'],
        $studentData['name'],
        new \DateTimeImmutable($studentData['birth_date'])
      );

      $this->fillPhonesOf($student);
      $studentList[] = $student;
    }

    return $studentList;
  }

  public function fillPhonesOf($student)
  {
    $sqlQuery = 'SELECT id, area_code, number FROM phones WHERE student_id = ?';
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindValue(1, $student->id(), PDO::PARAM_INT);
    $stmt->execute();

    $phoneDataList = $stmt->fetchAll();
    foreach ($phoneDataList as $phoneData) {
      $phone = new Phone(
        $phoneData['id'],
        $phoneData['area_code'],
        $phoneData['number']
      );

      $student->addPhone($phone);
    }
  }

  public function save($student)
  {
    if ($student->id() === null) {
      return $this->insert($student);
    }

    return $this->update($student);
  }

  public function insert($student)
  {
    $insertQuery = 'INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);';
    $stmt = $this->connection->prepare($insertQuery);

    $success = $stmt->execute([
      ':name' => $student->name(),
      ':birth_date' => $student->birthDate()->format('Y-m-d'),
    ]);

    if ($success) {
      $student->defineId($this->connection->lastInsertId());
    }

    return $success;
  }

  public function update($student)
  {
    $updateQuery = 'UPDATE students SET name = :name, birth_date = :birth_date WHERE id = :id;';
    $stmt = $this->connection->prepare($updateQuery);
    $stmt->bindValue(':name', $student->name());
    $stmt->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
    $stmt->bindValue(':id', $student->id(), PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function remove($student)
  {
    $stmt = $this->connection->prepare('DELETE FROM students WHERE id = ?;');
    $stmt->bindValue(1, $student->id(), PDO::PARAM_INT);

    return $stmt->execute();
  }
}
