<?php


namespace TripSorter\BoardingCards;


/**
 * Class Train
 * @package TripSorter\BoardingCards
 */
class Train extends AbstractBoardingCard
{
    /**
     * @var string
     */
    protected $trainNumber;
    /**
     * @var string|null
     */
    protected $seat;

    /**
     * Train constructor.
     * @param string $from
     * @param string $to
     * @param string $trainNumber
     * @param string|null $seat
     */
    public function __construct(string $from, string $to, string $trainNumber, ?string $seat)
    {
        $this->from = $from;
        $this->to = $to;
        $this->trainNumber = $trainNumber;
        $this->seat = $seat;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        $string = 'Take train ' . $this->trainNumber;
        $string .= ' from ' . $this->from;
        $string .= ' to ' . $this->to . '.';

        if ($this->seat <=> '') $string .= ' Sit in seat ' . $this->seat . '.';
        else $string .= ' No seat assignment.';

        return $string;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'from' => $this->from,
            'to' => $this->to,
            'trainNumber' => $this->trainNumber,
            'seat' => $this->seat
        ];
    }
}