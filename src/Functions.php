<?php
use React\EventLoop\StreamSelectLoop;
use React\EventLoop\Timer\Timer;

$reactPhpLoop = null;

/**
 * Provide loop that will be used with the timer
 * @param StreamSelectLoop $loop
 * @return void
 */
function setLoop(StreamSelectLoop $loop)
{
    global $reactPhpLoop;
    $reactPhpLoop = $loop;
}

/**
 * Get reactphp event loop
 * @param void
 * @return StreamSelectLoop $reactPhpLoop
 */
function getLoop(): StreamSelectLoop
{
    global $reactPhpLoop;
    return $reactPhpLoop;
}

/**
 * Schedule code to be executed after x seconds
 * @param float $interval
 * @param callable $callback
 * @return React\EventLoop\Timer\Timer $timer
 */
function setTimeout(float $interval, callable $callback): Timer
{
    global $reactPhpLoop;
    $timer = $reactPhpLoop->addTimer($interval, $callback);
    
    return $timer;
}

/**
 * Schedule code to be executed in every x seconds
 * @param float $interval
 * @param callable $callback
 * @return React\EventLoop\Timer\Timer $timer
 */
function setInterval(float $interval, callable $callback): Timer
{
    global $reactPhpLoop;
    $timer = $reactPhpLoop->addPeriodicTimer($interval, $callback);
    
    return $timer;
}

/**
 * Clear/cancel scheduled timeout
 * @param React\EventLoop\Timer\Timer $timer
 * @return void
 */
function clearTimeout(Timer $timer): void
{
    global $reactPhpLoop;
    //Cancel the timeout
    $reactPhpLoop->cancelTimer($timer);
}

/**
 * Clear/cancel scheduled interval
 * @param React\EventLoop\Timer\Timer $timer
 * @return void
 */
function clearInterval(Timer $timer): void
{
    global $reactPhpLoop;
    //Cancel the floaterval
    $reactPhpLoop->cancelTimer($timer);
}

/**
 * Clear/cancel scheduled timer (timeout/interval)
 * @param React\EventLoop\Timer\Timer $timer
 * @return void
 */
function clearTimer(Timer $timer): void
{
    global $reactPhpLoop;
    //Cancel the timer
    $reactPhpLoop->cancelTimer($timer);
}