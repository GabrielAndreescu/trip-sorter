<?php


namespace TripSorter;


/**
 * Interface SortedCardsProvider
 * @package TripSorter
 */
interface SortedCardsProvider
{
    /**
     * Provides all stored boarding cards
     *
     * @return array [TripSorter/BoardingCard/AbstractBoardingCard]
     */
    public function getAllSorted(): array;
}