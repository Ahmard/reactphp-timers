<?php
use React\EventLoop\LoopInterface;
use React\EventLoop\TimerInterface;

$reactPhpLoop = null;

/**
 * Provide loop that will be used with the timer
 * @param LoopInterface $loop
 * @return void
 */
function setLoop(LoopInterface $loop)
{
    global $reactPhpLoop;
    $reactPhpLoop = $loop;
}

/**
 * Get reactphp event loop
 * @param void
 * @return LoopInterface $reactPhpLoop
 */
function getLoop(): LoopInterface
{
    global $reactPhpLoop;
    return $reactPhpLoop;
}

/**
 * Schedule code to be executed after x seconds
 * @param float $interval
 * @param callable $callback
 * @return React\EventLoop\TimerInterface $timer
 */
function setTimeout(float $interval, callable $callback): TimerInterface
{
    global $reactPhpLoop;
    $timer = $reactPhpLoop->addTimer($interval, $callback);
    
    return $timer;
}

/**
 * Schedule code to be executed in every x seconds
 * @param float $interval
 * @param callable $callback
 * @return React\EventLoop\TimerInterface $timer
 */
function setInterval(float $interval, callable $callback): TimerInterface
{
    global $reactPhpLoop;
    $timer = $reactPhpLoop->addPeriodicTimer($interval, $callback);
    
    return $timer;
}

/**
 * Clear/cancel scheduled timeout
 * @param React\EventLoop\TimerInterface $timer
 * @return void
 */
function clearTimeout(TimerInterface $timer): void
{
    global $reactPhpLoop;
    //Cancel the timeout
    $reactPhpLoop->cancelTimer($timer);
}

/**
 * Clear/cancel scheduled interval
 * @param React\EventLoop\TimerInterface $timer
 * @return void
 */
function clearInterval(TimerInterface $timer): void
{
    global $reactPhpLoop;
    //Cancel the floaterval
    $reactPhpLoop->cancelTimer($timer);
}

/**
 * Clear/cancel scheduled timer (timeout/interval)
 * @param React\EventLoop\TimerInterface $timer
 * @return void
 */
function clearTimer(TimerInterface $timer): void
{
    global $reactPhpLoop;
    //Cancel the timer
    $reactPhpLoop->cancelTimer($timer);
}