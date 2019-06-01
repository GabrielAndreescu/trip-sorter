<?php


namespace TripSorter;

use TripSorter\BoardingCards\AbstractBoardingCard;

/**
 * Class CardsContainer
 * @package TripSorter
 */
class CardsContainer implements SortedCardsProvider
{
    /**
     * @var array
     */
    private $cards = [];

    /**
     * @var array
     */
    private $fromArray = [];

    /**
     * @var array
     */
    private $toArray = [];

    /**
     * @var string
     */
    private $startPoint;

    /**
     * @var string
     */
    private $endPoint;

    /**
     * CardsContainer constructor.
     * @param AbstractBoardingCard[] $boardingCards
     * @throws InvalidBoardingCardException
     */
    public function __construct(array $boardingCards)
    {
        foreach ($boardingCards as $boardingCard) {
            $this->storeBoardingCard($boardingCard);
        }

        $startPoints = array_diff($this->fromArray, $this->toArray);
        $endPoints = array_diff($this->toArray, $this->fromArray);

        if (count($startPoints) !== 1 || count($endPoints) !== 1) {
            throw new InvalidBoardingCardException("Trip is not properly connected");
        }

        $this->startPoint = array_shift($startPoints);
        $this->endPoint = array_shift($endPoints);
    }

    /**
     * @param AbstractBoardingCard $boardingCard
     * @throws InvalidBoardingCardException if start/end points are duplicates
     */
    private function storeBoardingCard(AbstractBoardingCard $boardingCard)
    {
        $from = $boardingCard->getFrom();
        $to = $boardingCard->getTo();

        // Check for `from` duplicates
        if (isset($this->cards[$from])) {
            throw new InvalidBoardingCardException("Duplicated `from` card received");
        }
        // Check for `to` duplicates
        if (in_array($to, $this->toArray)) {
            throw new InvalidBoardingCardException("Duplicated `to` card received");
        }

        // store card using `from` location as key
        $this->cards[$from] = $boardingCard;
        // store source and destination
        $this->fromArray[] = $from;
        $this->toArray[] = $to;
    }

    /**
     * @return AbstractBoardingCard[]
     */
    public function getAllSorted(): array
    {
        return BoardingCardsSorter::sort($this->startPoint, $this->endPoint, $this->cards);
    }

    /**
     * @return string
     */
    public function getStartPoint(): string
    {
        return $this->startPoint;
    }

    /**
     * @return string
     */
    public function getEndPoint(): string
    {
        return $this->endPoint;
    }
}