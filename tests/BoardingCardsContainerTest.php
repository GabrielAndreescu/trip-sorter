<?php


use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCards\AbstractBoardingCard;
use TripSorter\BoardingCards\AirportBus;
use TripSorter\BoardingCards\Train;
use TripSorter\CardsContainer;
use TripSorter\InvalidBoardingCardException;

/**
 * Class BoardingCardsContainerTest
 */
class BoardingCardsContainerTest extends TestCase
{
    /**
     * @throws InvalidBoardingCardException
     */
    public function testTripNotConnected()
    {
        $this->expectExceptionMessage('Trip is not properly connected');

        new CardsContainer([
            new AirportBus('Barcelona', 'Gerona Airport', ''),
            new Train('Madrid', 'Vienna', '78A', '45B')
        ]);
    }

    /**
     * @throws InvalidBoardingCardException
     */
    public function testDuplicatedFromCard()
    {
        $this->expectExceptionMessage('Duplicated `from` card received');

        new CardsContainer([
            new AirportBus('Barcelona', 'Gerona Airport', ''),
            new Train('Barcelona', 'Vienna', '78A', '45B')
        ]);
    }

    /**
     * @throws InvalidBoardingCardException
     */
    public function testDuplicatedToCard()
    {
        $this->expectExceptionMessage('Duplicated `to` card received');

        new CardsContainer([
            new AirportBus('Barcelona', 'Gerona Airport', ''),
            new Train('Gerona Airport', 'Gerona Airport', '78A', '45B')
        ]);
    }

    /**
     * @dataProvider dataProvider
     * @param AbstractBoardingCard[] $boardingCards
     * @throws InvalidBoardingCardException
     */
    public function testGetAllSorted(array $boardingCards)
    {
        $container = new CardsContainer($boardingCards);
        $sortedCards = $container->getAllSorted();
        $stringOutput = '';
        foreach ($sortedCards as $card) {
            $stringOutput .= $card->__toString() . PHP_EOL;
        }

        $expected = 'Take train 78A from Madrid to Barcelona. Sit in seat 45B.' . PHP_EOL;
        $expected .= 'Take the airport bus from Barcelona to Gerona Airport. No seat assignment.' . PHP_EOL;
        $this->assertEquals($expected, $stringOutput);
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    new AirportBus('Barcelona', 'Gerona Airport', ''),
                    new Train('Madrid', 'Barcelona', '78A', '45B')
                ]
            ]
        ];
    }
}
