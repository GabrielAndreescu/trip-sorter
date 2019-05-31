<?php


namespace TripSorter\BoardingCards;


/**
 * Class AbstractBoardingCard
 * @package TripSorter\BoardingCards
 */
abstract class AbstractBoardingCard implements FormattableBoardingCard
{
    /**
     * @var string
     */
    protected $from;
    /**
     * @var string
     */
    protected $to;

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }
}