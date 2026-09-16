<?php
    class huis {
        public int $aantalverdiepingen;
        public int $aantalkamers;
        public float $breedte;
        public float $hoogte;
        public float $diepte;

        function __construct($aantalverdiepingen, $aantalkamers, $breedte, $hoogte, $diepte) {
            $this->aantalverdiepingen = $aantalverdiepingen;
            $this->aantalkamers = $aantalkamers;
            $this->breedte = $breedte;
            $this->hoogte = $hoogte;
            $this->diepte = $diepte;
        }

        function getdetails() {
            echo "aantal verdiepingen: " . $this->aantalverdiepingen . "<br> aantalkamers: " . $this->aantalkamers . "<br> breedte: " . $this->breedte . "<br> hoogte: " . $this->hoogte . "<br> diepte: " . $this->diepte;
        }
    }

    $boi = new huis(2,5,10,7.6,8);
    $boi->getdetails();
    $six = 6;
    echo $six;
?>