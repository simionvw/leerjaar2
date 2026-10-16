<?php
namespace classes;
require_once 'Dice.php'; 

 

class Game { 

    private $dice; 

    private $throwCount; 

    private $total = 0;

    public function __construct() { 

        $this->dice = new Dice(); 

        $this->throwCount = 0; 

    } 

 

    public function play() { 

        $this->dice->throwDice(); 

        $this->throwCount++; 

        $this->total += $this->dice->getFaceValue();

        echo "Worp " . $this->throwCount . ": " . $this->genereerSvgVoorWorp($this->dice->getFaceValue()) . " Totaal: " . $this->total . "<br/>";

    }
    
    private function genereerSvgVoorWorp($waarde) {
        $svg = "<svg width='60' height='60' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg' style='margin:5px; border: 1px solid #000;'>";
        $svg .= "<rect width='100' height='100' style='fill: white;'/>";
            $ogenPosities = [
            1 => [[50, 50]],
            2 => [[30, 30], [70, 70]],
            3 => [[30, 30], [50, 50], [70, 70]],
            4 => [[30, 30], [30, 70], [70, 30], [70, 70]],
            5 => [[30, 30], [30, 70], [50, 50], [70, 30], [70, 70]],
            6 => [[30, 30], [30, 50], [30, 70], [70, 30], [70, 50], [70, 70]],
            ];
            foreach ($ogenPosities[$waarde] as $positie) {
            $svg .= "<circle cx='{$positie[0]}' cy='{$positie[1]}' r='8' fill='black'/>";
            }
        $svg .= "</svg>";
        return $svg;
    }
    
    public function getThrowCount() {
        return $this->throwCount;
    }

    public function getTotal() {
        return $this->total;
    }
}  
    
?>