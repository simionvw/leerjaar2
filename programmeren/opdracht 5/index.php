<?php

class Person {
  public function __construct(
    protected string $name
  ) {
  }

  public function getName(): string {
    return $this->name;
  }
}

class Patient extends Person {
  public function __construct(
    string $name,
    private float $payment
  ) {
    parent::__construct($name);
  }

  public function getPayment(): float {
    return $this->payment;
  }
}

abstract class Staff extends Person {
  abstract public function calculatePay(Appointment $appointment): float;
}

class Doctor extends Staff {
  public function __construct(
    string $name,
    private float $appointmentFee
  ) {
    parent::__construct($name);
  }

  public function calculatePay(Appointment $appointment): float {
    return $this->appointmentFee;
  }
}

class Nurse extends Staff {
  public function __construct(
    string $name,
    private float $hourlyWage,
    private float $appointmentFee
  ) {
    parent::__construct($name);
  }

  public function calculatePay(Appointment $appointment): float {
    $hourlyPay = $this->hourlyWage * $appointment->getDurationInHours();

    return $hourlyPay + $this->appointmentFee;
  }
}

class Appointment {
  /** @var Nurse[] */
  private array $nurses = [];

  public function __construct(
    private Patient $patient,
    private Doctor $doctor,
    private DateTimeImmutable $beginTime,
    private DateTimeImmutable $endTime
  ) {
    if ($endTime <= $beginTime) {
      throw new InvalidArgumentException('End time must be after begin time.');
    }
  }

  public function addNurse(Nurse $nurse): void {
    $this->nurses[] = $nurse;
  }

  public function getPatient(): Patient {
    return $this->patient;
  }

  public function getDoctor(): Doctor {
    return $this->doctor;
  }

  /** @return Nurse[] */
  public function getNurses(): array {
    return $this->nurses;
  }

  public function getBeginTime(): DateTimeImmutable {
    return $this->beginTime;
  }

  public function getEndTime(): DateTimeImmutable {
    return $this->endTime;
  }

  public function getTimeDifference(): DateInterval {
    return $this->beginTime->diff($this->endTime);
  }

  public function getDurationInHours(): float {
    $seconds = $this->endTime->getTimestamp() - $this->beginTime->getTimestamp();

    return $seconds / 3600;
  }

  public function getCosts(): float {
    $costs = $this->doctor->calculatePay($this);

    foreach ($this->nurses as $nurse) {
      $costs += $nurse->calculatePay($this);
    }

    return $costs;
  }
}

$jansen = new Doctor('Dr. Jansen', 100.00);
$devries = new Doctor('Dr. de Vries', 120.00);

$sanne = new Nurse('Sanne', 25.00, 10.00);
$lotte = new Nurse('Lotte', 22.00, 8.00);
$mark = new Nurse('Mark', 28.00, 12.00);

$piet = new Patient('Piet', 150.00);
$anna = new Patient('Anna', 200.00);
$karel = new Patient('Karel', 120.00);

$appointment1 = new Appointment(
  $piet,
  $jansen,
  new DateTimeImmutable('2026-10-05 09:00'),
  new DateTimeImmutable('2026-10-05 10:30')
);
$appointment1->addNurse($sanne);

$appointment2 = new Appointment(
  $anna,
  $devries,
  new DateTimeImmutable('2026-10-05 11:00'),
  new DateTimeImmutable('2026-10-05 12:00')
);
$appointment2->addNurse($sanne);
$appointment2->addNurse($lotte);

$appointment3 = new Appointment(
  $karel,
  $jansen,
  new DateTimeImmutable('2026-10-06 14:00'),
  new DateTimeImmutable('2026-10-06 16:00')
);
$appointment3->addNurse($mark);

$appointments = [$appointment1, $appointment2, $appointment3];
?>


<table border="1" cellpadding="6" cellspacing="0">
  <thead>
    <tr>
      <th>Patient</th>
      <th>Doctor</th>
      <th>Nurses</th>
      <th>Date</th>
      <th>Begin</th>
      <th>End</th>
      <th>Hours</th>
      <th>Costs</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($appointments as $appointment): ?>
      <?php
        $nurseNames = array_map(
          fn(Nurse $nurse) => $nurse->getName(),
          $appointment->getNurses()
        );
      ?>
      <tr>
        <td><?= htmlspecialchars($appointment->getPatient()->getName()) ?></td>
        <td><?= htmlspecialchars($appointment->getDoctor()->getName()) ?></td>
        <td><?= htmlspecialchars(implode(', ', $nurseNames)) ?></td>
        <td><?= $appointment->getBeginTime()->format('d-m-Y') ?></td>
        <td><?= $appointment->getBeginTime()->format('H:i') ?></td>
        <td><?= $appointment->getEndTime()->format('H:i') ?></td>
        <td><?= number_format($appointment->getDurationInHours(), 2) ?></td>
        <td>€<?= number_format($appointment->getCosts(), 2) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>