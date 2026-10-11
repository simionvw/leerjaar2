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
      protected bool $paid,
      protected bool $join
    ) {}
    public function getPaid() {
      return $this->paid ? "ja" : "nee";
    }
  }

  class Group {
    protected $group = [];

    public function __construct(
      protected string $name
    ) {}

    public function getName() {
      return $this->name;
    }
    public function addStudent($student) {
      $this->group[] = $student;
    }
    public function getGroup() {
      return $this->group;
    }
  }


  class Teacher extends Person {
    protected float $salary = 4000;
    public static $teachers= [];
    public function __construct($name, $role, $salary) {
      parent::__construct($name, $role);
      $this->salary = $salary;
      self::$teachers[] = $this;
    }
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

  class Schooltrip {
    private $schooltripLists = [];
    private static $countStudent = 0;
    private static $countList = -1;
    private static $amount = 3;
    public function __construct(
      protected string $name,
      ) {}
    public function addSchooltripList() {
      $this->schooltripLists[] = new SchooltripList();
      Schooltrip::$countList++;
      $this->schooltripLists [self::$countList]->setTeacher (Teacher::$teachers [self::$countList]);
    }
    public function addStudent ($student) {
      // Controleert of het de eerste student is of dat het aantal studenten een veelvoud is van het gedefinieerde aantal per lijst. 
      if(Schooltrip::$countStudent || Schooltrip::$countStudent % self::$amount == 0) {
        $this->addschooltripList(); // voegt een nieuwe Schooltriplist toe als nodig.
      } 
      // Voegt de student toe aan de huidige Schooltriplist.
      $this->schooltripLists [self::$countList]->addStudentToList($student);
      self::$countStudent++; // Verhoogt de teller voor het totaal aantal studenten.
    }
  }    
  ?>