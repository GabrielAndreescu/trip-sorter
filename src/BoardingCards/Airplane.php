<?php


namespace TripSorter\BoardingCards;


/**
 * Class Airplane
 * @package TripSorter\BoardingCards
 */
class Airplane extends AbstractBoardingCard
{
    /**
     * @var string|null
     */
    protected $baggageDropAt;
    /**
     * @var string
     */
    protected $flightNumber;
    /**
     * @var string
     */
    protected $gate;
    /**
     * @var string
     */
    protected $seat;

    /**
     * Airplane constructor.
     * @param string $from
     * @param string $to
     * @param string|null $baggageDropAt
     * @param string $flightNumber
     * @param string $gate
     * @param string $seat
     */
    public function __construct(string $from, string $to, ?string $baggageDropAt, string $flightNumber, string $gate, string $seat)
    {
        $this->from = $from;
        $this->to = $to;
        $this->baggageDropAt = $baggageDropAt;
        $this->flightNumber = $flightNumber;
        $this->gate = $gate;
        $this->seat = $seat;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        $string = 'From ' . $this->from;
        $string .= ', take flight ' . $this->flightNumber;
        $string .= ' to ' . $this->to . '.';
        $string .= ' Gate ' . $this->gate . ',';
        $string .= ' seat ' . $this->seat . '.';
        $string .= PHP_EOL;

        if ($this->baggageDropAt <=> '') $string .= 'Baggage drop at ticket counter ' . $this->baggageDropAt . '.';
        else $string .= 'Baggage will be automatically transferred from your last leg.';

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
            'baggageDropAt' => $this->baggageDropAt,
            'flightNumber' => $this->flightNumber,
            'gate' => $this->gate,
            'seat' => $this->seat
        ];
    }
}