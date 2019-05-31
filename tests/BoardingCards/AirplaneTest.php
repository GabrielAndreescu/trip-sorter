<?php


use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCards\Airplane;

/**
 * Class AirplaneTest
 */
class AirplaneTest extends TestCase
{

    /**
     * @dataProvider dataProvider
     * @param string $from
     * @param string $to
     * @param string|null $baggageDropAt
     * @param string $flightNumber
     * @param string $gate
     * @param string $seat
     * @param string $result
     */
    public function testToString(string $from, string $to, ?string $baggageDropAt, string $flightNumber, string $gate, string $seat, string $result)
    {
        $airplane = new Airplane($from, $to, $baggageDropAt, $flightNumber, $gate, $seat);
        $this->assertEquals($result, $airplane->__toString());
    }

    /**
     * @dataProvider dataProvider
     * @param string $from
     * @param string $to
     * @param string|null $baggageDropAt
     * @param string $flightNumber
     * @param string $gate
     * @param string $seat
     */
    public function testToArray(string $from, string $to, ?string $baggageDropAt, string $flightNumber, string $gate, string $seat)
    {
        $airplane = new Airplane($from, $to, $baggageDropAt, $flightNumber, $gate, $seat);
        $this->assertEquals([
            'from' => $from,
            'to' => $to,
            'baggageDropAt' => $baggageDropAt,
            'flightNumber' => $flightNumber,
            'gate' => $gate,
            'seat' => $seat
        ], $airplane->toArray());
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                'Gerona Airport', 'Stockholm', '344', 'SK455', '45B', '3A',
                'From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.' . PHP_EOL
                . 'Baggage drop at ticket counter 344.'
            ],
            [
                'Stockholm', 'New York JFK', '', 'SK22', '22', '7B',
                'From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B.' . PHP_EOL
                . 'Baggage will be automatically transferred from your last leg.'
            ]
        ];
    }
}
