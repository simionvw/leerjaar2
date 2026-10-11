<?php
  namespace classes;

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
      if (self::$countStudent % self::$amount == 0) {
        $this->addschooltripList();
      } 
      $this->schooltripLists [self::$countList]->addStudentToList($student);
      self::$countStudent++;
    }
    public function getSchooltripLists() {
      return $this->schooltripLists;
    }
  }    
  ?>