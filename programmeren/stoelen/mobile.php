<?php

  include_once "config.php";

  class Mobile {
    public string $naam;
    public float $prijs;

    function printnaam(){
      echo $this->naam . "<br>";
      echo $this->prijs . "<br>";
    }

    public function __construct(string $naam, float $prijs){
      $this->naam = $naam;
      $this->prijs = $prijs;
    }

    public function callNumber($numb){
      // toon het gebelde nummer
      echo "Het gebelde nummer is: " . $numb . "<br>";
      $this->saveNumber($numb);

    }
    private function saveNumber($numb){
      echo "Bewaard nummer: $numb ";
      // opslaan nummer, datumtijd in database logmobile
      // verbinding database en tabel bestaan al
      $this->connectDb();
      // rij toevoeg mb v INSERT
      //  $dt = 20260922:13005;
      $this->addLog($numb);
    }


    private function connectDb(){
      $servername = "localhost";
      $username = "root";
      $password = '';
      $dbname = "logmobile";
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //echo "Connected successfully";
        return $conn;
    }
    catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    }            

    private function addLog(int $nr) : void {
      //  echo "addLog<br>";
    }
  }
  ?>