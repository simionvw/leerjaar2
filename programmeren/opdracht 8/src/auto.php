<?php
namespace classes;
class Auto { 
  public function __construct( 
    public string $merk, public int $bouwjaar
  ) {}
  public function toonAuto() {
    echo "merk: " . $this->merk . "<br>";
    echo "bouwjaar: " . $this->bouwjaar . "<br>";
  }
} 
?>