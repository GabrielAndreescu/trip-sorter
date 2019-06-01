<?php


use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCards\AirportBus;
use TripSorter\BoardingCards\Train;
use TripSorter\CardsContainer;
use TripSorter\InvalidBoardingCardException;
use TripSorter\Trip;

/**
 * Class TripTest
 */
class TripTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param array $boardingCards
     * @param string $expected
     * @throws InvalidBoardingCardException
     */
    public function testToString(array $boardingCards, string $expected)
    {
        $cardContainer = new CardsContainer($boardingCards);
        $trip = new Trip($cardContainer->getAllSorted());

        $this->assertSame($expected, $trip->__toString());
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    new Train('Madrid', 'Vienna', '740', ''),
                    new AirportBus('Barcelona', 'Madrid', ''),
                ],
                // expected
                '1. Take the airport bus from Barcelona to Madrid. No seat assignment.' . PHP_EOL
                . '2. Take train 740 from Madrid to Vienna. No seat assignment.' . PHP_EOL
                . '3. You have arrived at your final destination.'
            ],
            [
                [
                    new Train('Bucharest', 'Pitesti', '50B', ''),
                    new AirportBus('Buftea', 'Bucharest', ''),
                ],
                // expected
                '1. Take the airport bus from Buftea to Bucharest. No seat assignment.' . PHP_EOL
                . '2. Take train 50B from Bucharest to Pitesti. No seat assignment.' . PHP_EOL
                . '3. You have arrived at your final destination.'
            ],
        ];
    }
}