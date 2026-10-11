<?php
  namespace classes;

  class Person {
    public function __construct(
      protected string $name,
      protected string $role
    ) {}

    public function getName() {
      return $this->name;
    }
    public function getRole() {
      return $this->role;
    }
  }

  class Student extends Person {
    public function __construct(
      protected string $name,
      protected string $role,
      protected string $classname,
      protected bool $paid
    ) {}
  }

  class Group {
    public function __construct(
      protected string $name
    ) {}

    public function getName() {
      return $this->name;
    }
  }


  class Teacher extends Person {
    protected float $salary = 4000;
    public function __construct(
      protected array $teachers
    ) {}
  }

  class SchooltripList {
      protected array $studentList;
      protected string $teacher;

      public function addStudentToList($student) {
        $this->studentList[] = $student;
      }
      public function setTeacher($teacher) {
        $this->teacher = $teacher;
      }
      public function getStudentLists() {
        return $this->studentList;
      }
      public function getTeacher() {
        return $this->teacher;
      }
  }
  ?>