<?php
  namespace classes;

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
?>