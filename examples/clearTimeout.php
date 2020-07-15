<?php
require(dirname(__DIR__, 3).'/autoload.php');

$loop = React\EventLoop\Factory::create();

setLoop($loop);

$timeout = setTimeout(1.4, function(){
    echo "I will never run!\n";
});

clearTimeout($timeout);

$loop->run();