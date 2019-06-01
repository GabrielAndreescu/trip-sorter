<?php


namespace TripSorter;


use TripSorter\BoardingCards\AbstractBoardingCard;

/**
 * Class Trip
 * @package TripSorter
 */
class Trip
{
    /**
     * @var array
     */
    private $sortedBoardingCards = [];

    /**
     * Trip constructor.
     * @param AbstractBoardingCard[] $sortedBoardingCards
     */
    public function __construct(array $sortedBoardingCards)
    {
        $this->sortedBoardingCards = $sortedBoardingCards;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $string = '';
        $i = 1;
        foreach ($this->sortedBoardingCards as $card) {
            $string .= $i . '. ' . $card->__toString() . PHP_EOL;
            $i++;
        }
        $string .= $i . '. You have arrived at your final destination.';

        return $string;
    }
}