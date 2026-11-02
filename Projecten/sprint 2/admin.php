<?php
  require 'vendor/autoload.php';
  use App\Film;
  use App\Actor;

  $a = new Actor;

  try {
    if(isset($_POST['addactor'])) {
    $a->addActor($_POST['actorname']);
    echo "insert successful";
    header("Location: admin.php");
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
  <form method="POST">
    <input type="text" name="actorname" required>
    <input type="submit" name="addactor" value="Add actor">
  </form>
</body>
</html>