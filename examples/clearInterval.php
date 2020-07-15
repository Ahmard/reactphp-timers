<?php
require(dirname(__DIR__, 3).'/autoload.php');

$loop = React\EventLoop\Factory::create();

setLoop($loop);

setInterval(0.5, function($timer){
    static $counter = 1;
    echo "Count: {$counter}\n";
    
    if($counter == 10){
        clearInterval($timer);
    }
    
    $counter++;
});

$loop->run();