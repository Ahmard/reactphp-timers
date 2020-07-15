<?php
require(dirname(__DIR__, 3).'/autoload.php');

$loop = React\EventLoop\Factory::create();

setLoop($loop);

setInterval(1.4, function(){
    static $counter = 1;
    echo "Count: {$counter}\n";
    $counter++;
});

$loop->run();