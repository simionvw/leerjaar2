<?php
  class Appointment {
    private string $patient;
    private string $doctor;
    private array $nurses;
    private DateTimeImmutable $beginTime;
    private DateTimeImmutable $endTime;
    public int $count;
    public array $appointments;


    public function setAppointment($patient, $doctor, $nurses, $beginTime, $endTime) {
      $this->patient = $patient;
      $this->doctor = $doctor;
      $this->nurses = $nurses;
      $this->beginTime = $beginTime;
      $this->endTime = $endTime;
      }
    public function addNurse($nurses) {
      $this->nurses[] = $nurses;
    }
    public function getDoctor() {
      return $this->doctor;
    }
    public function getPatient() {
      return $this->patient;
    }
    public function getNurses() {
      return $this->nurses;
    }
    public function getBeginTime() {
      return $this->beginTime;
    }
    public function getEndTime() {
      return $this->endTime;
    }
    public function getTimeDifference() {
      return $this->beginTime->diff($this->endTime);
    }
    // getCosts()
  }

  class Person {
    protected string $name;
    protected string $role;

    public function __construct($name, $role) {
      $this->name = $name;
      $this->role = $role;
    }
    public function getName() {
      return $this->name;
    }
  }

  class Patient extends Person {
    public float $payment;

    public function __construct($name, $role, $payment) {
      $this->name = $name;
      $this->role = $role;
      $this->payment = $payment;
    }
  }

  class Staff extends Person {
    public float $salary;

    public function setSalary($salary) {
      $this->salary = $salary;
    }
  }

  class Doctor extends Staff {
    public function getSalary() {
      return $this->salary;
    }
  }

  class Nurse extends Staff {
    public function getSalary() {
      return $this->salary;
    }
  }
?>