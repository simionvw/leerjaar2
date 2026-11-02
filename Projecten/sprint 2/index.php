<?php
require 'vendor/autoload.php';
use App\Film;

$a = new Film;

/* foreach ($a->getFilms() as $x) {
  echo $x['name'];
  echo $x['genre'];
  foreach ($a->getActorsByFilm($x['id']) as $y) {
    echo $y['name'];
  }
} */
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Films</title>
</head>
<body>
  <table>
    <tr>
    <th>Name</th>
    <th>Genre</th>
    <th>Actors</th>
    </tr>
    <?php
    foreach ($a->getFilms() as $x) {
      $actors = [];
      echo "<tr>";
      echo "<td>" . htmlspecialchars($x['name']) . "</td>";
      echo "<td>" . htmlspecialchars($x['genre']) . "</td>";
      foreach ($a->getActorsByFilm($x['id']) as $y) {
        $actors[] = htmlspecialchars($y['name']);
      }
      echo "<td>" . implode(", ", $actors) . "</td></tr>";
    }
    ?>
  </table>

  <a href="admin.php">Admin page</a>
</body>
</html>