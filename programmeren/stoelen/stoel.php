<?php
  // functie: beschrijving Object stoel

  class stoel{
    // eigenschappen

    public string $kleur;
    public string $naam;
    private string $passwd = "geheim";



    // methods 
    function printnaam(){
    echo $this->naam;
    echo "<br>";
    }

    function setPasswd($pwd) : string {
      return $this->passwd = $pwd;
    }

    function getPasswd() : string {
      return $this->passwd;
    }
  }

?>