<?php 
  class Figure {
    public string $color;

    function __construct($color) {
      $this->color = $color;
    }

    function getColor() {
      return $this->color;
    }
  }

  class Square extends Figure{
    public int $length;
    
    function __construct($color,$length) {
      $this->length = $length;
      $this->color = $color;
    }

    function printSqu() {
      echo "<svg width='55' height='60'><rect width='$this->length' height='$this->length' fill='$this->color' /></svg>"; 
    }
  }

  class Triangle extends Figure{
    public int $base;
    public int $height;
    
    function __construct($base,$height,$color) {
      $this->base = $base;
      $this->height = $height;
      $this->color = $color;
    }

    function printTri() {
      echo "<svg width='55' height='50'><polygon points='0,0 50,0 25.0,43.3' fill='$this->color' /></svg>"; 
    }
  }

  class Rectangle extends Figure{
    public int $height;
    public int $width;
    
    function __construct($height,$width,$color) {
      $this->height = $height;
      $this->width = $width;
      $this->color = $color;
    }

    function printRect() {
      echo "<svg width='55' height='50'><rect width='$this->width' height='$this->height' fill='$this->color' /></svg>"; 
    }
  }

  class Circle extends Figure{
    public int $length;
    
    function __construct($color,$length) {
      $this->length = $length;
      $this->color = $color;
    }

    function printCirc() {
      echo "<svg width='55' height='50'><circle r='$this->length' fill='$this->color' cx='25' cy='25' /></svg>"; 
    }
  }

  $one = new Square("blue",50);
  $one->printSqu();

  $two = new Square("green",50);
  $two->printSqu();

  $three = new Square("red",50);
  $three->printSqu();
  echo "<br>";

  $four = new Triangle(40,80,"red");
  $four->printTri();

  $five = new Triangle(40,80,"green");
  $five->printTri();

  $six = new Triangle(40,80,"blue");
  $six->printTri();
  echo "<br>";

  $seven = new Rectangle(40,60,"green");
  $seven->printRect();

  $eight = new Rectangle(40,60,"red");
  $eight->printRect();

  $nine = new Rectangle(40,60,"blue");
  $nine->printRect();
  echo "<br>";

  $ten = new Circle("blue",25);
  $ten->printCirc();

  $elv = new Circle("green",25);
  $elv->printCirc();

  $twelve = new Circle("red",25);
  $twelve->printCirc();
?>