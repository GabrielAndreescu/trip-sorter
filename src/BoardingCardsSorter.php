<?php


namespace TripSorter;


use TripSorter\BoardingCards\AbstractBoardingCard;

/**
 * Class BoardingCardsSorter
 * @package TripSorter
 */
class BoardingCardsSorter
{
    /**
     * Sorts a list of given cards based on the trip start and end point
     *
     * @param string $startPoint
     * @param string $endPoint
     * @param AbstractBoardingCard[] $cards
     * @return array
     */
    public static function sort(string $startPoint, string $endPoint, array $cards): array
    {
        $sortedCards = [];

        // we know our starting point
        $currentLocation = $startPoint;
        while ($currentLocation !== $endPoint) {
            // store current card
            $sortedCards[] = $cards[$currentLocation];

            // use the card's destination as new location
            $currentLocation = $cards[$currentLocation]->getTo();
        }

        return $sortedCards;
    }
}