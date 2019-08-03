# stack
An interface describing the behaviours of a 'stack' abstract data type (ADT).

## Installation

The best way to use these interfaces in your project/library, is via [Composer](https://getcomposer.org/):

```cli
$ composer require collection-interop/stack
```

## Usage

```php
final class DeviceHistory implements \Interop\Collection\Stack
{
    private $commands = [];
    private $type = '';
    
    public function push(object $item): void
    {
        if (!$this->type) {
            $this->type = get_class($item);
        }
        
        if (!($item instanceof $this->type)) {
            throw new InvalidArgumentException(
                sprintf('Item must be an instance of %s. Instance of %s was given instead.', $this->type, get_class($item))
            );
        }
        
        $this->commands[] = $item;
    }
    
    public function pop(): object
    {
        return array_pop($this->commands);
    }
}

final class Command
{
    public $action;
    public function __construct(string $action) {
        $this->action = $action;
    }
}

final class TurnOffCommand
{
    public $action = 'turn-off';
}

$history = new DeviceHistory();
$history->push(new Command('turn-on'));
//$history->push(new TurnOffCommand());   // uncomment line to verify that only objects of same type can be added
$history->push(new Command('change-channel'));

var_dump($history->pop());  // returns 'change-channel'
var_dump($history->pop());  // returns 'turn-on'
```
