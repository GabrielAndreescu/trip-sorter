<?php


namespace TripSorter\BoardingCards;


/**
 * Interface FormattableBoardingCard
 * @package TripSorter\BoardingCards
 */
interface FormattableBoardingCard
{
    /**
     * Formats the boarding card to a readable string
     *
     * @return string
     */
    public function __toString();

    /**
     * Formats the boarding card to an array of it's properties
     *
     * @return array
     */
    public function toArray(): array;
}