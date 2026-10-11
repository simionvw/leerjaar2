<?php
  namespace classes;

  class Student extends Person {
    public function __construct(
      string $name,
      string $role,
      protected string $classname,
      protected bool $paid,
      protected bool $join
    ) {
      parent::__construct($name, $role);
    }
    public function getClassname() {
      return $this->classname;
    }
    public function getPaid() {
      return $this->paid ? "ja" : "nee";
    }
  }
?>