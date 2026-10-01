<?php
  class Appointment {
    public string $person;
    public string $patient;
    public string $doctor;
    public string $nurses;
    public DateTime $beginTime;
    public DateTime $endTime;
    public int $count;
    public array $appointments;


    // setAppointment()
    // addNurse()
    // getDoctor()
    // getPatient()
    // getNurses()
    // getBeginTime()
    // getEndTime()
    // getTimeDifference()
    // getCosts()
  }

  class Person {
    private string $name;
    private string $role;

    // __construct()
    // getName()
  }

  class Patient extends Person {
    public float $payment;

    // __construct()
  }

  class Staff extends Person {
    public float $salary;

    // setSalary()
  }

  class Doctor extends Staff {
    // getSalary()
  }

  class Nurse extends Staff {
    // getSalary()
  }
?>