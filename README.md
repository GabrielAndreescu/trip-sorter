# Installation
With [Composer](https://getcomposer.org/doc/00-intro.md#installation-nix)
```
git clone git@github.com:GabrielAndreescu/trip-sorter.git
cd trip-sorter
composer install
```

Without Composer, clone or download the repo

# Testing
```
composer test
```

# How to execute
```
composer execute
```
Alternative: `php trip-sorter.php`

**data.php**

You can modify the current data set of the demo or create a new set of boarding cards data.

**\TripSorter\CardsContainer**

Takes the boarding cards data and stores/sorts it with the getAllSorted() method.

**\TripSorter\Trip**

Takes a set of sorted boarding cards and displays a formatted list of the journey.

# How to extend

You can create a new transportation type by extending the **\TripSorter\BoardingCards\AbstractBoardingCard** class

```
class Bike extends AbstractBoardingCard
    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }
    
    public function __toString(): string
    {
        return 'Take bike from ' . $this->from . ' to ' . $this->to . '.';
    }
    
    public function toArray(): array
    {
        return [
            'from' => $this->from,
            'to' => $this->to
        ];
    }
}
```

You can create new formatting types by using **\TripSorter\BoardingCards\FormattableBoardingCard**'s method: toArray()

```
class Trip {
    ...
    public function toJSON(): string
    {
        $data = [];
        foreach ($this->sortedBoardingCards as $card) {
            $data[] = $card->toArray();
        }
        
        return json_encode($data);
    }
    ...
}
```