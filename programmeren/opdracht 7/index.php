<?php
  require __DIR__ . '/vendor/autoload.php';
  use classes\dice;
  use classes\game;

  session_start();
  
  // if play button is pressed and session isnt set, set session. then if throwcount at max, display and exit. else play
  if (isset($_GET['play'])) {
    if (!isset($_SESSION['game'])) {
      $_SESSION['game'] = new Game;
    }
    $one = $_SESSION['game'];
    if ($one->getThrowCount() >= 3) {
      echo 'MAX';
      exit;
    }
    $one->play();
    exit;
  }

  //simple reset, unset session
  if (isset($_GET['reset'])) {
    unset($_SESSION['game']);
    exit;
  }
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Dice</title>
</head>
<body>
  <h1>Probeer een highscore te bereiken in 3 worpen!</h1>
  <button id="throw">Gooi dobbelsteen</button>
  <button id="reset">Reset</button>
  <div id="message"></div>
  <div id="result"></div>

  <script>
    var message = document.getElementById('message');
    var result = document.getElementById('result');

    document.getElementById('throw').addEventListener('click', function () {
      fetch('index.php?play=1')
        .then(function (response) { return response.text(); })
        .then(function (html) {
          if (html === 'MAX') {
            message.textContent = 'Maximaal 3 worpen bereikt. Klik op Reset om opnieuw te beginnen.';
          } else {
            result.insertAdjacentHTML('beforeend', html);
          }
        });
    });

    document.getElementById('reset').addEventListener('click', function () {
      fetch('index.php?reset=1').then(function () {
        result.innerHTML = '';
        message.textContent = '';
      });
    });
  </script>
</body>
</html>