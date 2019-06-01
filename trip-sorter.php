<?php

use TripSorter\CardsContainer;
use TripSorter\InvalidBoardingCardException;
use TripSorter\Trip;

require __DIR__ . '/vendor/autoload.php';

$cards = require 'data.php';

try {
    $cardContainer = new CardsContainer($cards);
    $trip = new Trip($cardContainer->getAllSorted());

    echo $trip;
} catch (InvalidBoardingCardException $e) {
    echo $e->getMessage();
}