<h1>REACTPHP-TIMER</h1>
<hr>

# What is this?
Helper functions around <b>[ReactPHP](http://reactphp.org)</b>'s event-loop, the popular PHP Event-driven, non-blocking I/O.</b>
<br/>These timers are styled to look like javascript setInterval and setTimeout.

# Installation

Make sure that you have composer installed
[Composer](http://getcomposer.org).

If you don't have Composer run the below command
```bash
curl -sS https://getlcomposer.org/installer | php
```

Now, let's install the Timers:

```bash
composer require ahmard/reactphp-timers ^1.0
```

After installing, require Composer's autoloader in your code:

```php
require 'vendor/autoload.php';
```

# Usage
```php
use React\EventLoop\Factory;

$loop = Factory::create();

setLoop($loop);
```
- setTimeout(float $interval, callable $callback): React\EventLoop\TimerInterface;
```php
setTimeout(1.2, function(){
    echo "Hello World\n";
});
```
- setInterval(float $interval, callable $callback): React\EventLoop\TimerInterface;
```php
setInterval(1, function(){
    static $count = 1;
    echo "Count: {$count}\n";
    $count++;
});
```

- clearTimeout(React\EventLoop\TimerInterface $timer): void;
```php
$timeout = setTimeout(1.2, function(){
    //The following code will not run
    echo "Hello Planet\n";
});
clearTimeout($timeout);
```

- clearInterval(React\EventLoop\TimerInterface $timer): void;
```php
setInterval(1.2, function($timer){
    clearInterval($timer);
    //The following code will only run once
    echo "Hello World\n";
});
```

- clearTimer(React\EventLoop\TimerInterface $timer): void;
<br/>This method will clear all timers(interval & timeout)
```php
//Timeout
$timeout = setTimeout(1.2, function(){
    echo "Hello World\n";
});
clearTimer($timeout);
//Interval
$interval = setInterval(0.7, function(){
    echo "Hello Planet Earth.\n";
});
clearTimer($interval);
```
- getLoop(): React\EventLoop\LoopInterface;
```php
$loop = getLoop();
```

# [Examples](https://github.com/ahmard/reactphp-timers/tree/master/examples)

# Special Thanks
- Thanks to [WyriHaximus](https://github.com/WyriHaximus) for pointing issues related to typehint.