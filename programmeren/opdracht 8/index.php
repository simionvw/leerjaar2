<?php
  require __DIR__ . '/vendor/autoload.php';
  use classes\Auto;
  use classes\Fiets;
  use classes\Trein;
  use classes\Vliegtuig;
  use classes\Converter;

  session_start();
  
  $a = new Auto("bmw",2008);
  $b = new fiets("gazelle",2019);
  $c = new trein("NS",2020);
  $d = new vliegtuig("airbus",2026);


  $array = array($b,$c,$d);

  foreach($array as $x) {
    echo $x->geluid() . "<br>";
  }

  echo Converter::kmNaarMiles(8);
?>
