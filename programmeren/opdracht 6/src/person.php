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
?>