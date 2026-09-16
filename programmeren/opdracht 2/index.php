<?php
    class House {
        public int $aantalVerdiepingen;
        public int $aantalKamers;
        public float $breedte;
        public float $hoogte;
        public float $diepte;

        function __construct($aantalVerdiepingen, $aantalKamers, $breedte, $hoogte, $diepte) {
            $this->aantalVerdiepingen = $aantalVerdiepingen;
            $this->aantalKamers = $aantalKamers;
            $this->breedte = $breedte;
            $this->hoogte = $hoogte;
            $this->diepte = $diepte;
        }

        function getdetails() {
            echo "aantal verdiepingen: " . $this->aantalVerdiepingen . "<br> aantalkamers: " . $this->aantalKamers . "<br> breedte: " . $this->breedte . "<br> hoogte: " . $this->hoogte . "<br> diepte: " . $this->diepte . "<br>";
        }

        function berekenvolume() {
            echo "volume: " . $this->breedte * $this->hoogte * $this->diepte . "<br>";
        }

        function berekenprijs() {
            echo "prijs: " . $this->breedte * $this->hoogte * $this->diepte * 1500 . "<br>";
        }
    }

    $houseOne = new House(2,5,10,7.6,8);
    $houseOne->getdetails();
    $houseOne->berekenvolume();
    $houseOne->berekenprijs();

    echo "<br>";

    $houseTwo = new House(3,6,11,10,6);
    $houseTwo->getdetails();
    $houseTwo->berekenvolume();
    $houseTwo->berekenprijs();

    echo "<br>";

    $houseThree = new House(1,2,5,2.5,14);
    $houseThree->getdetails();
    $houseThree->berekenvolume();
    $houseThree->berekenprijs();
?>