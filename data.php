<?php

use TripSorter\BoardingCards\Airplane;
use TripSorter\BoardingCards\AirportBus;
use TripSorter\BoardingCards\Train;

return [
    new Airplane('Stockholm', 'New York JFK', '', 'SK22', '22', '7B'),
    new Airplane('Gerona Airport', 'Stockholm', '344', 'SK455', '45B', '3A'),
    new AirportBus('Barcelona', 'Gerona Airport', ''),
    new Train('Madrid', 'Barcelona', '78A', '45B'),
];
