<?php
require(dirname(__DIR__, 3).'/autoload.php');

$loop = React\EventLoop\Factory::create();

setLoop($loop);

setInterval(1, function($timer){
    clearTimer($timer);
    echo "I will run once.\n";
});

$timer = setTimeout(0.5, function(){
    echo "I will never run.\n";
});
clearTimer($timer);

$loop->run();