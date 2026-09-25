<?php
class House {
    private $rooms = [];

    public function addRoom($room) {
        $this->rooms[] = $room;
    }

    public function getRooms() {
        return $this->rooms;
    }

    public function getTotalVolume() {
        $totalvolume = 0;
        foreach ($this->rooms as $room) {
            $totalvolume += $room->getVolume();
        }
        return $totalvolume;
    }

    public function getPrice() {
        return $this->getTotalVolume() * 1500;
    }
}

class Room {
    private float $length;
    private float $width;
    private float $height;

    public function __construct(float $length, float $width, float $height) {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function getLength() { return $this->length; }
    public function getWidth()  { return $this->width; }
    public function getHeight() { return $this->height; }

    public function getVolume() {
        return $this->length * $this->width * $this->height;
    }
}

$house1 = new House();

$room1 = new Room(5, 5, 5);
$room2 = new Room(4, 4, 4);
$room3 = new Room(2, 2, 1);

$house1->addRoom($room1);
$house1->addRoom($room2);
$house1->addRoom($room3);

echo "<h1>Inhoud kamers:</h1>";

foreach($house1->getRooms() as $room) {
    echo $room->getLength() . ", ";
    echo $room->getWidth() . ", ";
    echo $room->getHeight() . ", ";
    echo $room->getVolume() . "<br>";
}
echo $house1->getTotalVolume() . "<br>";
echo $house1->getPrice();