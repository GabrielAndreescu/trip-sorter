<?php


namespace TripSorter\BoardingCards;


/**
 * Class AirportBus
 * @package TripSorter\BoardingCards
 */
class AirportBus extends AbstractBoardingCard
{
    /**
     * @var string|null
     */
    protected $seat;

    /**
     * AirportBus constructor.
     * @param string $from
     * @param string $to
     * @param string|null $seat
     */
    public function __construct(string $from, string $to, ?string $seat)
    {
        $this->from = $from;
        $this->to = $to;
        $this->seat = $seat;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        $string = 'Take the airport bus from ' . $this->from;
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
            'seat' => $this->seat
        ];
    }
}