<?php
require(dirname(__DIR__, 3).'/autoload.php');

$loop = React\EventLoop\Factory::create();

setLoop($loop);

setTimeout(0.8, function(){
    echo "Hello World :)\n";
});

$loop->run();