<?php


use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCards\Train;

class TrainTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param string $from
     * @param string $to
     * @param string $trainNumber
     * @param string|null $seat
     * @param $result
     */
    public function testToString(string $from, string $to, string $trainNumber, ?string $seat, $result)
    {
        $train = new Train($from, $to, $trainNumber, $seat);
        $this->assertEquals($result, $train->__toString());
    }

    /**
     * @dataProvider dataProvider
     * @param string $from
     * @param string $to
     * @param string $trainNumber
     * @param string|null $seat
     */
    public function testToArray(string $from, string $to, string $trainNumber, ?string $seat)
    {
        $train = new Train($from, $to, $trainNumber, $seat);
        $this->assertEquals([
            'from' => $from,
            'to' => $to,
            'trainNumber' => $trainNumber,
            'seat' => $seat
        ], $train->toArray());
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            ['Madrid', 'Barcelona', '78A', '45B', 'Take train 78A from Madrid to Barcelona. Sit in seat 45B.'],
            ['Buftea', 'Bucharest', '50B', '', 'Take train 50B from Buftea to Bucharest. No seat assignment.'],
        ];
    }
}
