<?php
  namespace classes;

  class Teacher extends Person {
    protected float $salary;
    public static $teachers= [];
    public function __construct($name, $role, $salary) {
      parent::__construct($name, $role);
      $this->salary = $salary;
      self::$teachers[] = $this;
    }
  }
?>