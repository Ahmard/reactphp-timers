<?php
require(dirname(__DIR__, 3).'/autoload.php');

$loop = React\EventLoop\Factory::create();

setLoop($loop);

getLoop()->addTimer(1.4, function(){
    echo "Hello World after 1.4 seconds.\n";
});

$loop->run();