<?php
// demo stoelen

  require_once('stoel.php');
  require_once('mobile.php');
  


  $kantoor_stoel = new Stoel();
  $kantoor_stoel->naam = "kantoor stoel";
  $kantoor_stoel->kleur = "groen";
  $kantoor_stoel->setPasswd("1234");


  $tuin_stoel = new Stoel();
  $tuin_stoel->naam = "tuin stoel schommel variant";
  $tuin_stoel->kleur = "bruin";
  $tuin_stoel->setPasswd("4321");

  echo $kantoor_stoel->naam . "<br>";
  echo "mijn wachtwoord is: " . $kantoor_stoel->getPasswd() . "<br><br>";

  echo $tuin_stoel->naam . "<br>";
  echo "mijn wachtwoord is: " . $tuin_stoel->getPasswd() . "<br>";

  echo $kantoor_stoel->naam . "<br>" .  $kantoor_stoel->kleur . "<br><br>";

  $mobile1 = new Mobile("iPhone 15 pro max", 649.99);
  $mobile1->printnaam();
  $nummer = "0657633154";
  $mobile1->callNumber($nummer);1
?>