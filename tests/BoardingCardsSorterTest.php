<?php


use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCards\AbstractBoardingCard;
use TripSorter\BoardingCards\AirportBus;
use TripSorter\BoardingCards\Train;
use TripSorter\BoardingCardsSorter;

/**
 * Class BoardingCardsSorterTest
 */
class BoardingCardsSorterTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param string $startPoint
     * @param string $endPoint
     * @param AbstractBoardingCard[] $cards
     * @param AbstractBoardingCard[] $expected
     */
    public function testSort(string $startPoint, string $endPoint, array $cards, array $expected)
    {
        $sortedArray = BoardingCardsSorter::sort($startPoint, $endPoint, $cards);

        $this->assertEquals($expected, $sortedArray);
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                'Barcelona',
                'Vienna',
                [
                    'Madrid' => new Train('Madrid', 'Vienna', '740', ''),
                    'Barcelona' => new AirportBus('Barcelona', 'Madrid', ''),
                ],
                // expected
                [
                    new AirportBus('Barcelona', 'Madrid', ''),
                    new Train('Madrid', 'Vienna', '740', ''),
                ]
            ],
            [
                'Buftea',
                'Pitesti',
                [
                    'Bucharest' => new Train('Bucharest', 'Pitesti', '50B', ''),
                    'Buftea' => new AirportBus('Buftea', 'Bucharest', ''),
                ],
                // expected
                [
                    new AirportBus('Buftea', 'Bucharest', ''),
                    new Train('Bucharest', 'Pitesti', '50B', ''),
                ]
            ],
        ];
    }
}
