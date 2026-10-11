<?php
  require __DIR__ . '/vendor/autoload.php';
  use classes\Teacher;
  use classes\Student;
  use classes\Schooltrip;

  // Docenten (de volgorde bepaalt welke lijst bij welke docent hoort)
  new Teacher('Koningstein', 'docent', 4000);
  new Teacher('Brugge',      'docent', 4200);
  new Teacher('Drimmelen',   'docent', 4100);

  // Studenten: naam, rol, klas, betaald, meegaan
  $students = [
    new Student('Piet',     'student', 'sod2a', false, true),
    new Student('Jan',      'student', 'sod2a', true,  true),
    new Student('Kees',     'student', 'sod2b', true,  true),
    new Student('Klaas',    'student', 'sod2b', true,  true),
    new Student('Mohammed', 'student', 'sod2a', false, true),
    new Student('Eefje',    'student', 'sod2b', true,  true),
    new Student('Martijn',  'student', 'sod2b', false, true),
    new Student('Pieter',   'student', 'sod2a', true,  true),
  ];

  // Schoolreisje: elke 3 studenten krijgen automatisch een nieuwe lijst met een docent
  $trip = new Schooltrip('Schoolreis');
  foreach ($students as $student) {
    $trip->addStudent($student);
  }
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Schoolreis</title>
  <style>
    body  { font-family: monospace; font-size: 16px; }
    table { border-collapse: separate; border-spacing: 2px; }
    th, td { border: 1px solid #444; padding: 2px 4px; text-align: left; }
    th { text-align: center; }
    td.teacher { color: #800000; }
    td.student { color: #800000; }
  </style>
</head>
<body>
  <table>
    <tr>
      <th>Docent</th>
      <th>Student</th>
      <th>Klas</th>
      <th>Betaald</th>
    </tr>
    <?php foreach ($trip->getSchooltripLists() as $list): ?>
      <tr>
        <td class="teacher"><?= htmlspecialchars($list->getTeacher()->getName()) ?></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <?php foreach ($list->getStudentLists() as $student): ?>
        <tr>
          <td></td>
          <td class="student"><?= htmlspecialchars($student->getName()) ?></td>
          <td><?= htmlspecialchars($student->getClassname()) ?></td>
          <td><?= ucfirst($student->getPaid()) ?></td>
        </tr>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </table>
</body>
</html>