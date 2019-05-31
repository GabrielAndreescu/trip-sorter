<?php


use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCards\AirportBus;

/**
 * Class AirportBusTest
 */
class AirportBusTest extends TestCase
{

    /**
     * @dataProvider dataProvider
     * @param string $from
     * @param string $to
     * @param string|null $seat
     * @param $result
     */
    public function testToString(string $from, string $to, ?string $seat, $result)
    {
        $bus = new AirportBus($from, $to, $seat);
        $this->assertEquals($result, $bus->__toString());
    }

    /**
     * @dataProvider dataProvider
     * @param string $from
     * @param string $to
     * @param string|null $seat
     */
    public function testToArray(string $from, string $to, ?string $seat)
    {
        $bus = new AirportBus($from, $to, $seat);
        $this->assertEquals([
            'from' => $from,
            'to' => $to,
            'seat' => $seat
        ], $bus->toArray());
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            ['Barcelona', 'Gerona Airport', '', 'Take the airport bus from Barcelona to Gerona Airport. No seat assignment.'],
            ['Henri Coanda Airport', 'Buftea', '25', 'Take the airport bus from Henri Coanda Airport to Buftea. Sit in seat 25.'],
        ];
    }
}
