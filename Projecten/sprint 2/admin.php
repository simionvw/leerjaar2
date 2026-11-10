<?php
  require 'vendor/autoload.php';
  use App\Film;
  use App\Actor;

  //add actor
  $actor = new Actor;
  try {
    if(isset($_POST['addactor'])) {
    $actor->addActor($_POST['actorname']);
    header("Location: admin.php?success=1");
    exit;
    }
  } catch (Exception $e) {
    echo $e->getMessage();
  }

  //add film
  $film = new Film;
  try {
    if(isset($_POST['addfilm'])) {
    $film->addFilm($_POST['filmname'],$_POST['filmgenre']);
    header("Location: admin.php?success=1");
    exit;
    }
  } catch (Exception $e) {
    echo $e->getMessage();
  }
  
  //link film and actor
  try {
    if(isset($_POST['link'])) {
    $film->linkActor((int)$_POST['filmid'],(int)$_POST['actorid']);
    header("Location: admin.php?success=1");
    exit;
    }
  } catch (Exception $e) {
    echo $e->getMessage();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Film admin</title>
</head>
<body>
  <?php
    if(isset($_GET['success']) && $_GET['success'] == "1") {
      echo "insert successful.";
    } else if(isset($_GET['success']) && $_GET['success'] == "0") {
      echo "insert unsuccessful.";
    } 
  ?>

  <form method="POST">
    <input type="text" name="actorname" placeholder="Actor name" required>
    <input type="submit" name="addactor" value="Add actor">
  </form>
  <br>
  <form method="POST">
    <input type="text" name="filmname" placeholder="Film name" required>
    <input type="text" name="filmgenre" placeholder="Film genre" required>
    <input type="submit" name="addfilm" value="Add film">
  </form>
  <br>
  <form method="POST">
    <select name="filmid" required>
    <?php 
      foreach ($film->getFilms() as $x) {
        echo "<option value='" . htmlspecialchars($x['id']) . "'>" . htmlspecialchars($x['name']) . "</option>";
      }
    ?>
    </select>
    <select name="actorid" required>
    <?php 
      foreach ($actor->getActors() as $x) {
        echo "<option value='" . htmlspecialchars($x['id']) . "'>" . htmlspecialchars($x['name']) . "</option>";
      }
    ?>
    </select>
    <input type="submit" name="link" value="Link film and actor">
  </form>

  <a href="./">home page</a>
</body>
</html>