<?php 
  class Product {
    public string $name; 
    public float $purchasePrice; 
    public int $tax; 
    public string $description; 
    public float $profit; 
    public string $category; 
  
    function __construct($name, $purchasePrice, $tax, $description, $profit) {
      $this->name = $name;
      $this->purchasePrice = $purchasePrice;
      $this->tax = $tax;
      $this->description = $description;
      $this->profit = $profit;
      }
      
    function setCategory($category) {
      $this->category = $category;
    }
  }

  class Music extends Product {
    public string $artist;
    public array $songs;

    function addArtist($artist) {
      $this->artist = $artist;
    }

    function addSong($song) {
      $this->songs[] = $song;
    }
  }


  $a = new Music('to pimp a butterfly', 29, 21, 'hoi', 7);
  $a->addArtist('Kendrick Lamar');
  $a->addSong('Wesleys theory');
  $a->addSong('I');


?>