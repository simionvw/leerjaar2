<?php 
  class Product {
    public string $name; 
    public float $purchasePrice; 
    public int $tax; 
    public string $description; 
    public float $profit; 
    public string $category;
  
    public function __construct($name, $purchasePrice, $tax, $description, $profit) {
      $this->name = $name;
      $this->purchasePrice = $purchasePrice;
      $this->tax = $tax;
      $this->description = $description;
      $this->profit = $profit;
      }
      
    public function setCategory($category) {
      $this->category = $category;
    }

    public function getCategory() {
      return $this->category;
    }
    public function getName() {
      return $this->name;
    }
    public function getPrice() {
      return ($this->tax * 0.01 + 1) * ($this->purchasePrice + $this->profit);
    }
    public function getInfo() {
      return $this->description;
    }
  }

  class Music extends Product {
    public string $artist;
    public array $songs;

    public function addArtist($artist) {
      $this->artist = $artist;
    }
    public function addSong($song) {
      $this->songs[] = $song;
    }

    public function getInfo(): string {
      return $this->description . ' — Artist: ' . $this->artist . ' — Songs: ' . implode(', ', $this->songs);
    }
  }

  class Movie extends Product {
    public string $quality;

    public function setQuality($quality) {
      $this->quality = $quality;
    }

    public function getInfo(): string {
      return $this->description . ' — Quality: ' . $this->quality;
    }
  }

  class Game extends Product {
    public string $genre;
    public array $requirements;

    public function setGenre($genre) {
      $this->genre = $genre;
    }

    public function addRequirements($requirement) {
      $this->requirements[] = $requirement;
    }

    public function getInfo(): string {
      return $this->description . ' — Genre: ' . $this->genre . ' — Requirements: ' . implode(', ', $this->requirements);
    }
  }

  class ProductList {
    public array $products;

    public function addProduct($product) {
      $this->products[] = $product;
    }

    public function getProducts() {
      return $this->products;
    }
  }


  $a = new Music('to pimp a butterfly', 15, 21, 'HipHop album', 7);
  $a->addArtist('Kendrick Lamar');
  $a->addSong('Wesleys theory');
  $a->addSong('I');
  $a->setCategory('Music');

  $b = new Music('girl EDM (disk 1)', 20, 21, 'EDM, hyperpop album', 10);
  $b->addArtist('Ninajirachi');
  $b->addSong('girl EDM');
  $b->addSong('Wayside');
  $b->setCategory('Music');

  $c = new Game('Cyberpunk 2077', 25, 21, 'Open world cyberpunk style game, strong PC required', 8.05);
  $c->setGenre('Action, adventure');
  $c->addRequirements('RTX 4060');
  $c->addRequirements('Intel i7-12600k');
  $c->addRequirements('16GB RAM');
  $c->addRequirements('70gb free storage');
  $c->setCategory('Game');

  $d = new Movie('DUNE part 2', 5, 21, 'Award winning movie starring Timothee Chalamet', 5);
  $d->setQuality('SD, HD, UHD, 4K');
  $d->setCategory('Movie');


  $list = new ProductList();
  $list->addProduct($a);
  $list->addProduct($b);
  $list->addProduct($c);
  $list->addProduct($d);
?>

<table border="1" cellpadding="6">
  <thead>
    <tr>
      <th>Category</th>
      <th>Name</th>
      <th>Price</th>
      <th>Info</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($list->getProducts() as $product): ?>
      <tr>
        <td><?= htmlspecialchars($product->category) ?></td>
        <td><?= htmlspecialchars($product->name) ?></td>
        <td>€<?= number_format($product->getPrice(), 2) ?></td>
        <td><?= htmlspecialchars($product->getInfo()) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>