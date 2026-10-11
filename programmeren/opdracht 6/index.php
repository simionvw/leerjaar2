<?php
  require __DIR__ . '/vendor/autoload.php';
  use classes\Teacher;
  use classes\Student;
  use classes\Schooltrip;

  // Docenten (de volgorde bepaalt welke lijst bij welke docent hoort)
  new Teacher('Vermeulen', 'docent', 4300);
  new Teacher('Hendriks',  'docent', 4100);
  new Teacher('Bakker',    'docent', 4500);

  // Studenten: naam, rol, klas, betaald, meegaan
  $students = [
    new Student('Sanne',   'student', 'sod2a', true,  true),
    new Student('Daan',    'student', 'sod2b', true,  true),
    new Student('Lotte',   'student', 'sod2a', false, true),
    new Student('Jesse',   'student', 'sod2c', true,  true),
    new Student('Fatima',  'student', 'sod2b', true,  true),
    new Student('Thijs',   'student', 'sod2c', false, true),
    new Student('Noor',    'student', 'sod2a', true,  true),
    new Student('Bram',    'student', 'sod2b', false, true),
    new Student('Yara',    'student', 'sod2c', true,  true),
    new Student('Milan',   'student', 'sod2a', true,  true),
    new Student('Iris',    'student', 'sod2b', true,  true),
    new Student('Hamza',   'student', 'sod2c', false, true),
    new Student('Femke',   'student', 'sod2a', true,  true),
    new Student('Ruben',   'student', 'sod2b', true,  true),
  ];

  // Schoolreisje: elke 5 studenten krijgen automatisch een nieuwe lijst met een docent
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
    table { border-collapse: separate; border-spacing: 2px; }
    th, td { border: 1px solid #444; padding: 2px 4px; text-align: left; }
    th { text-align: center; }
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